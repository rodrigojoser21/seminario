<!-- resources/views/items/alumnos.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Categoria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Registrar Categorias</h1>

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
    
    <form action="<?php echo e(route('categorias.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre Categoria</label>
            <input type="text" name="nombreCategoria" class="form-control" id="nombreCategoria" value="<?php echo e(old('nombreCategoria')); ?>" value="<?php echo e(old(('nombreCategoria'))); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="<?php echo e(route('categorias.index')); ?>" class="btn btn-secondary">Regresar</a>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\PruebaSemana3\resources\views/categorias/create.blade.php ENDPATH**/ ?>