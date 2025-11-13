@extends('template.base')

@section('content')
<h2>Lista de CVs - Alumnos</h2>
    
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($alumnos as $alumno)
    <div class="col">
        <div class="card shadow-sm" style="min-height: 500px;">
            <div class="card-img-top bg-light" style="height: 200px; overflow: hidden;">
                <img src="{{ $alumno->foto_url }}" 
                    style="width: 100%; height: 100%; object-fit: cover;"
                    alt="Foto de {{ $alumno->nombre }} {{ $alumno->apellidos }}">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $alumno->nombre }} {{ $alumno->apellidos }}</h5>
                <p class="card-text">
                    <strong>Correo:</strong> {{ $alumno->correo }}<br>
                    <strong>Nota Media:</strong> {{ $alumno->nota_media }}<br>
                    <strong>Experiencia:</strong> 
                    @if($alumno->experiencia)
                        {{ Str::limit($alumno->experiencia, 80) }}
                    @else
                        <span class="text-muted">No especificada</span>
                    @endif
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('alumno.show', $alumno->id) }}" class="btn btn-sm btn-outline-primary">Ver CV</a>
                        <a href="{{ route('alumno.edit', $alumno->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                    </div>
                    <small class="text-body-secondary">{{ $alumno->getEdad() }} años</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    @if(count($alumnos) === 0)
    <div class="col-12">
        <div class="alert alert-info text-center">
            <h4>No hay alumnos registrados</h4>
            <p>Comienza añadiendo el primer alumno y su CV.</p>
            <a href="{{ route('alumno.create') }}" class="btn btn-primary">Añadir Primer CV</a>
        </div>
    </div>
    @endif
</div>

<div class="mt-4">
    <a href="{{ route('alumno.create') }}" class="btn btn-success">Añadir Nuevo CV</a>
    <a href="{{ route('alumno.index') }}" class="btn btn-outline-secondary">Ver Lista Completa</a>
</div>
@endsection