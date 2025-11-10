@extends('template.base')

@section('content')
<h2>Lista de CVs - Alumnos</h2>
    
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($alumnos as $alumno)
    <div class="col">
        <div class="card shadow-sm" style="min-height: 500px;">
            <div class="card-img-top bg-light" style="height: 200px; background-image: url('{{ $alumno->newPath }}'); 
                       background-size: cover; background-position: center center; display: flex; align-items: center; justify-content: center;">
                @if(!$alumno->fotografia)
                <div class="text-center text-muted">
                    <svg width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    <div class="mt-2">Sin foto</div>
                </div>
                @endif
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