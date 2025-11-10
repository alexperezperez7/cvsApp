@extends('template.base')

@section('content')
<h2>Página de Pruebas</h2>

<div class="card">
    <div class="card-header">
        <h5>Prueba de Subida de Imágenes</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('main.postprueba') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="fotografia" class="form-label">Seleccionar imagen de prueba:</label>
                <input class="form-control" type="file" name="fotografia" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Subir Imagen de Prueba</button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5>Enlaces de Prueba</h5>
    </div>
    <div class="card-body">
        <div class="d-grid gap-2">
            <a href="{{ route('alumno.index') }}" class="btn btn-outline-primary">Lista de CVs</a>
            <a href="{{ route('alumno.create') }}" class="btn btn-outline-success">Crear CV</a>
            <a href="{{ route('main.index') }}" class="btn btn-outline-secondary">Página Principal</a>
        </div>
    </div>
</div>
@endsection