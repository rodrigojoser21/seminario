<!-- resources/views/productos/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #343a40;
            text-align: center;
            margin-bottom: 40px;
        }
        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .alert {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="container mt-5">
    <h1>Lista de Productos</h1>

    <!-- Alert for Success Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Button to Add New Item -->
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('productos.create') }}" class="btn btn-custom">Agregar Nuevo Producto</a>
        <a href="{{ route('categorias.index') }}" class="btn btn-custom">Agregar Nueva Categoria</a>
    </div>
    
<div class="table-container">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Nombre de la Categoria</th>
                <th>Fecha de Registro</th>
                <th>Fecha de Actualizacion</th>
                <th>Fecha de Eliminacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->categoria->nombreCategoria ?? 'Sin categoría' }}</td>
                <td>{{ $producto->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $producto->updated_at->format('d/m/Y H:i') }}</td>
                <td>{{ $producto->deleted_at}}</td>
                <td>
                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
</body>
</html>