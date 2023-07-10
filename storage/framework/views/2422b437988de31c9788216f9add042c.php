
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Nuevo Empleado</h5>
</div>
<div class="container col-md-6" >
    <h2 class="mt-4">Agregar Nuevo Empleado</h2>
    <form action="/empleados" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombres</label>
            <input id="nombre" name="nombre" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellidos</label>
             <input id="apellido" name="apellido" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input id="correo" name="correo" type="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input id="telefono" name="telefono" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input id="direccion" name="direccion" type="text" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_depto" class="form-label">Departamento</label>
            <select id="id_depto" name="id_depto" class="form-select" required>
                <option value="">Seleccione su departamento</option>
                <?php $__currentLoopData = $departamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($departamento->id); ?>"><?php echo e($departamento->valor); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3" id="municipio-container" style="display: none;">
            <label for="id_municipio" class="form-label">Municipio</label>
            <select id="id_municipio" name="id_municipio" class="form-select municipio-select" required>
                <option value="">Seleccione su municipio</option>
                <?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($municipio->id); ?>" data-depto="<?php echo e($municipio->id_padre); ?>" class="municipio-option"><?php echo e($municipio->valor); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="/empleados" class="btn btn-secondary me-md-2">Cancelar</a>
            <button type="submit" class="btn btn-primary" onclick="return confirm('¿Estás seguro de agregar el nuevo Empleado?')">Guardar</button>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\prueba-oscar-saenz\resources\views/empleados/modal/create.blade.php ENDPATH**/ ?>