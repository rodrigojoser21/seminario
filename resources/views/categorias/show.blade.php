<!DOCTYPE html>
<html>
<head>
    <title>Categoria Detalle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Categoria Detalle</h1>
    <p><strong>ID:</strong> {{ $categoria->id }}</p>
    <p><strong>Nombre de Categorias:</strong> {{ $categoria->nombreCategoria }}</p>
    
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Regresar</a>
    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Edit</a>
</body>
</html>