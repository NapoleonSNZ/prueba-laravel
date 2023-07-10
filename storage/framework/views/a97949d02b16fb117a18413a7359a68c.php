<?php $__env->startSection('micontenido'); ?>

<?php $__env->startSection('css'); ?>
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php $__env->stopSection(); ?>
    <header>
        <div class="container">
            <h3 class="bg-primary text-white text-center">FILTRO BUSQUEDA</h3>
        </div>
    </header>
    <div class="d-md-flex justify-content-md-start">
        <form action="<?php echo e(route('empleados.index')); ?>" method="GET">
            <div class="row">
                <div class="col-md-2">
                    <input class="form-control" type="text" placeholder="por Nombre" name="busquedaNombre">
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" placeholder="por Apellido" name="busquedaApellido">
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" placeholder="por Correo" name="busquedaCorreo">
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" placeholder="por Telefono" name="busquedaTelefono">
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" placeholder="por Departamento" name="busquedaDepartamento">
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" placeholder="por Municipio" name="busquedaMunicipio">
                </div>
            </div><br>
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
    </div>
    <br>
    <a href="empleados/create" class="btn btn-primary">NUEVO</a><br><br>
    <?php if(session('warning')): ?>
        <div class="alert alert-warning">
            <?php echo e(session('warning')); ?>

        </div>
    <?php endif; ?>
    <table id="tabla-empleados" class="table table-striped shadow-lg mt-4">
        <thead class="bg-primary">
            <tr>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
                <th scope="col">Departamento</th>
                <th scope="col">Municipio</th>
                <th scope="col">Acciones </th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($empleado ->nombre); ?></td>
                <td><?php echo e($empleado ->apellido); ?></td>
                <td><?php echo e($empleado ->correo); ?></td>
                <td><?php echo e($empleado ->telefono); ?></td>
                <td><?php echo e($empleado ->direccion); ?></td>
                <td><?php echo e($empleado ->departamento); ?></td>
                <td><?php echo e($empleado ->municipio); ?></td>
                <td>
                    <a href="/empleados/<?php echo e($empleado->id); ?>/edit" class="btn btn-info">-Editar-</a>
                    <form action="<?php echo e(route('empleados.destroy', ['empleado' => $empleado->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de ELIMINAR al empleado?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php $__env->startSection('js'); ?>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tabla-empleados').DataTable({
                    "lengthMenu": [[5,10,20, -1], [5,10,20, "All"]],
                    "searching": false
                });
            });
        </script>
    <?php if(Session::has('message')): ?>
        <script>
            swal("Eliminado!!","<?php echo e(Session::get('message')); ?>",'success',{
                button:true,
                button:"OK",
                timer:3000,
                dangerMode:true,
            });
        </script>
    <?php elseif(Session::has('messagecreado')): ?>
        <script>
            swal("Guardado!!","<?php echo e(Session::get('messagecreado')); ?>",'success',{
                button:true,
                button:"OK",
                timer:3000,
                dangerMode:true,
            });
        </script>
    <?php elseif(Session::has('messagemod')): ?>
        <script>
            swal("Modificado!!","<?php echo e(Session::get('messagemod')); ?>",'success',{
                button:true,
                button:"OK",
                timer:3000,
                dangerMode:true,
            });
        </script>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prueba-oscar-saenz\resources\views/empleados/index.blade.php ENDPATH**/ ?>