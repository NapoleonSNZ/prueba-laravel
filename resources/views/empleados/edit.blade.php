@extends('layouts.plantilla')
@section('micontenido')

<div class="container col-md-6" >
    <h2 class="mt-4 bg-primary text-white text-center">ACTUALIZACION EMPLEADOS</h2>
    <form action="/empleados/{{ $empleado->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombres</label>
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{$empleado->nombre}}" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellidos</label>
             <input id="apellido" name="apellido" type="text" class="form-control" value="{{$empleado->apellido}}" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input id="correo" name="correo" type="email" class="form-control" value="{{$empleado->correo}}" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input id="telefono" name="telefono" type="text" class="form-control" value="{{$empleado->telefono}}" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input id="direccion" name="direccion" type="text" class="form-control" value="{{$empleado->direccion}}" required>
        </div>
        <div class="mb-3">
            <label for="id_depto" class="form-label">Departamento</label>
            <select id="id_depto" name="id_depto" class="form-select" required>
                <option value="">Seleccione su departamento</option>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" {{ $departamento->id == $empleado->id_depto ? 'selected' : '' }}>
                        {{ $departamento->valor }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3" id="municipio-container" style="display: none">
            <label for="id_municipio" class="form-label">Municipio</label>
            <select id="id_municipio" name="id_municipio" class="form-select municipio-select" required>
                <option value="">Seleccione su municipio</option>
                @foreach ($municipios as $municipio)
                    <option value="{{ $municipio->id }}" {{ $municipio->id == $empleado->id_municipio ? 'selected' : '' }} data-depto="{{ $municipio->id_padre }}" class="municipio-option">
                        {{ $municipio->valor }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="/empleados" class="btn btn-secondary me-md-2">Cancelar</a>
            <button type="submit" class="btn btn-primary" onclick="return confirm('¿Estás seguro de Actualizar a empleado?')">Guardar</button>
        </div>
    </form>
</div>
<script>
     const departamentoSelect = document.getElementById('id_depto');
    const municipioContainer = document.getElementById('municipio-container');
    const municipioSelect = document.getElementById('id_municipio');
    const municipioOptions = municipioSelect.getElementsByClassName('municipio-option');

    departamentoSelect.addEventListener('change', function() {
        const selectedDepto = departamentoSelect.value;

        municipioContainer.style.display = selectedDepto ? 'block' : 'none';

        for (const option of municipioOptions) {
            const deptoValue = option.getAttribute('data-depto');
            if (deptoValue === selectedDepto) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        }
    });
</script>
@endsection
