@extends('template.base')

@section('content')
<h2>Crear Nuevo Alumno</h2>

<form action="{{ route('alumno.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input class="form-control" required id="nombre" minlength="2" maxlength="50" type="text" name="nombre" placeholder="Nombre del alumno" value="{{ old('nombre') }}">
    </div>
    <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos:</label>
        <input class="form-control" required id="apellidos" minlength="2" maxlength="100" type="text" name="apellidos" placeholder="Apellidos del alumno" value="{{ old('apellidos') }}">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono:</label>
        <input class="form-control" required id="telefono" minlength="9" maxlength="15" type="text" name="telefono" placeholder="Teléfono del alumno" value="{{ old('telefono') }}">
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo:</label>
        <input class="form-control" required id="correo" type="email" name="correo" placeholder="Correo electrónico" value="{{ old('correo') }}">
    </div>
    <div class="mb-3">
        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
        <input class="form-control" required id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
    </div>
    <div class="mb-3">
        <label for="nota_media" class="form-label">Nota Media:</label>
        <input class="form-control" required id="nota_media" type="number" step="0.01" min="0" max="10" name="nota_media" placeholder="Nota media (0-10)" value="{{ old('nota_media') }}">
    </div>
    <div class="mb-3">
        <label for="experiencia" class="form-label">Experiencia:</label>
        <textarea class="form-control" id="experiencia" name="experiencia" placeholder="Experiencia laboral" rows="4">{{ old('experiencia') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="formacion" class="form-label">Formación:</label>
        <textarea class="form-control" id="formacion" name="formacion" placeholder="Formación académica" rows="4">{{ old('formacion') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="habilidades" class="form-label">Habilidades:</label>
        <textarea class="form-control" id="habilidades" name="habilidades" placeholder="Habilidades técnicas y personales" rows="3">{{ old('habilidades') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="fotografia" class="form-label">Fotografía:</label>
        <input class="form-control" id="fotografia" type="file" name="fotografia" accept="image/*">
    </div>
    <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Crear alumno">
        <a href="{{ route('alumno.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
@endsection