@extends('template.base')

@section('content')
<h2>Detalles del Alumno (Vista Simple)</h2>

<table class="table table-bordered">
    <tr>
        <td><strong>ID</strong></td>
        <td>{{ $alumno->id }}</td>
    </tr>
    <tr>
        <td><strong>Nombre</strong></td>
        <td>{{ $alumno->nombre }}</td>
    </tr>
    <tr>
        <td><strong>Apellidos</strong></td>
        <td>{{ $alumno->apellidos }}</td>
    </tr>
    <tr>
        <td><strong>Teléfono</strong></td>
        <td>{{ $alumno->telefono }}</td>
    </tr>
    <tr>
        <td><strong>Correo</strong></td>
        <td>{{ $alumno->correo }}</td>
    </tr>
    <tr>
        <td><strong>Fecha Nacimiento</strong></td>
        <td>{{ $alumno->fecha_nacimiento->format('d/m/Y') }}</td>
    </tr>
    <tr>
        <td><strong>Nota Media</strong></td>
        <td>{{ $alumno->nota_media }}</td>
    </tr>
    <tr>
        <td><strong>Experiencia</strong></td>
        <td>{{ $alumno->experiencia ?: 'No especificado' }}</td>
    </tr>
    <tr>
        <td><strong>Formación</strong></td>
        <td>{{ $alumno->formacion ?: 'No especificado' }}</td>
    </tr>
    <tr>
        <td><strong>Habilidades</strong></td>
        <td>{{ $alumno->habilidades ?: 'No especificado' }}</td>
    </tr>
</table>

<a href="{{ route('alumno.index') }}" class="btn btn-secondary">Volver</a>
@endsection