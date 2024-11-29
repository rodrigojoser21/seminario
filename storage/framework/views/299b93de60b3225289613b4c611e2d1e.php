<!-- resources/views/items/productos.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Agregar Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h1>Registrar Productos</h1>

    <!-- Alert for Success Messages -->
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php echo e($error); ?>

            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <form action="<?php echo e(route('productos.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Producto</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo e(old('nombre')); ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" value="<?php echo e(old('descripcion')); ?>" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="decimal" name="precio" class="form-control" id="precio" value="<?php echo e(old('precio')); ?>" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" id="stock" value="<?php echo e(old('stock')); ?>" required>
        </div>
        <div class="mb-3">
            <label for="idCategoria" class="form-label">Categoría</label>
            <select name="idCategoria" class="form-control" id="idCategoria" required>
                <option value="">Seleccionar categoría</option>
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($categoria->id); ?>" <?php echo e(old('idCategoria')==$categoria->id ? 'selected' : ''); ?>>
                    <?php echo e($categoria->nombreCategoria); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-secondary">Regresar</a>
    </form>
</body>

</html><?php /**PATH C:\xampp\htdocs\PruebaSemana3\resources\views/productos/create.blade.php ENDPATH**/ ?>