<!-- resources/views/alumnos/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Categoria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Editar Categorias</h1>

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
    
    <form action="<?php echo e(route('categorias.update', $categoria->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Categoria</label>
            <input type="text" name="nombreCategoria" class="form-control" id="nombreCategoria" value="<?php echo e($categoria->nombreCategoria); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?php echo e(route('categorias.index')); ?>" class="btn btn-secondary">Ir a la Lista Principal</a>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\PruebaSemana3\resources\views/categorias/edit.blade.php ENDPATH**/ ?>