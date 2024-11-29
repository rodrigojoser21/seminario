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
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre Categoria</label>
            <input type="text" name="nombreCategoria" class="form-control" id="nombreCategoria" value="{{old('nombreCategoria')}}" value="{{old(('nombreCategoria'))}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
</body>
</html>