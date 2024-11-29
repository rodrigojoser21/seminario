
<!DOCTYPE html>
<html>
<head>
    <title>Productos Detalle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Productos Detalle</h1>
    <p><strong>ID:</strong> <?php echo e($producto->id); ?></p>
    <p><strong>Nombre:</strong> <?php echo e($producto->nombre); ?></p>
    <p><strong>Descripcion:</strong> <?php echo e($producto->descripcion); ?></p>
    <p><strong>Precio:</strong> $<?php echo e(number_format($producto->precio, 2)); ?></p>
    <p><strong>Stock:</strong> <?php echo e($producto->stock); ?></p>
    <p><strong>Nombre de Categorias:</strong> <?php echo e($producto->categoria->nombreCategoria ?? 'Sin categoría'); ?></p>
    
    <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-secondary">Regresar</a>
    <a href="<?php echo e(route('productos.edit', $producto->id)); ?>" class="btn btn-warning">Edit</a>
</body>
</html><?php /**PATH C:\xampp\htdocs\ProyectoGrupo\resources\views/productos/show.blade.php ENDPATH**/ ?>