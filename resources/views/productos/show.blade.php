
<!DOCTYPE html>
<html>
<head>
    <title>Productos Detalle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Productos Detalle</h1>
    <p><strong>ID:</strong> {{ $producto->id }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Descripcion:</strong> {{ $producto->descripcion }}</p>
    <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
    <p><strong>Nombre de Categorias:</strong> {{ $producto->categoria->nombreCategoria ?? 'Sin categoría' }}</p>
    
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Regresar</a>
    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Edit</a>
</body>
</html>