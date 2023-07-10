<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Catalogo;

class EmpleadoController extends Controller
{

    public function index(Request $request)
    {
        $busquedaNombre = $request->busquedaNombre;
        $busquedaApellido = $request->busquedaApellido;
        $busquedaCorreo = $request->busquedaCorreo;
        $busquedaTelefono = $request->busquedaTelefono;
        $busquedaDepartamento = $request->busquedaDepartamento;
        $busquedaMunicipio = $request->busquedaMunicipio;

        $query = Empleado::where('activo', true)
            ->where('nombre', 'like', '%'.$busquedaNombre.'%')
            ->where('apellido', 'like', '%'.$busquedaApellido.'%')
            ->where('correo', 'like', '%'.$busquedaCorreo.'%')
            ->where('telefono', 'like', '%'.$busquedaTelefono.'%')
            ->join('catalogos as depto', 'empleados.id_depto', '=', 'depto.id')
            ->join('catalogos as municipio', 'empleados.id_municipio', '=', 'municipio.id')
            ->select('empleados.*', 'depto.valor as departamento', 'municipio.valor as municipio');
        if ($busquedaDepartamento) {
            $query->whereHas('departamento', function ($q) use ($busquedaDepartamento) {
                $q->where('valor', 'like', '%'.$busquedaDepartamento.'%');
            });
        }
        if ($busquedaMunicipio) {
            $query->whereHas('municipio', function ($q) use ($busquedaMunicipio) {
                $q->where('valor', 'like', '%'.$busquedaMunicipio.'%');
            });
        }
        $empleados = $query->get();
        $departamentos = Catalogo::where('grupo', 'departamento')->get();
        $municipios = Catalogo::where('grupo', 'municipio')->get();

        return view('empleados.index', compact('empleados', 'departamentos', 'municipios'));
    }

    public function create()
    {
        $departamentos = Catalogo::where('grupo', 'Departamentos')->get();
        $municipios = Catalogo::where('grupo', 'Municipios')->get();

        return view('empleados.create', compact('departamentos', 'municipios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'id_depto' => 'required',
            'id_municipio' => 'required',
        ]);

        $empleado = new Empleado;
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->correo = $request->input('correo');
        $empleado->telefono = $request->input('telefono');
        $empleado->direccion = $request->input('direccion');
        $empleado->id_depto = $request->input('id_depto');
        $empleado->id_municipio = $request->input('id_municipio');
        $empleado->save();

        return redirect()->route('empleados.index')->with('messagecreado', 'Empleado creado exitosamente.');
    }

    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $departamentos = Catalogo::where('grupo', 'Departamentos')->get();
        $municipios = Catalogo::where('grupo', 'Municipios')->get();
        return view('empleados.edit', compact('empleado', 'departamentos', 'municipios'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'id_depto' => 'required',
            'id_municipio' => 'required',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->correo = $request->input('correo');
        $empleado->telefono = $request->input('telefono');
        $empleado->direccion = $request->input('direccion');
        $empleado->id_depto = $request->input('id_depto');
        $empleado->id_municipio = $request->input('id_municipio');
        $empleado->save();

        return redirect()->route('empleados.index')->with('messagemod', 'Empleado actualizado exitosamente.');
    }

    public function destroy($id)
    {

        $empleado = Empleado::findOrFail($id);
        $empleado->update(['activo' => false]);

        return redirect('/empleados')->with('message', 'Empleado eliminado exitosamente.');
    }

}
