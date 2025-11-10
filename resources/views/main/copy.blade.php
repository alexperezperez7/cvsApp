@extends('template.base')

@section('content')
<div class="col-lg-8 px-0">
    <h1>Página de Ejemplo</h1>
    <p class="lead">Esta es una página de ejemplo con navegación dinámica.</p>
    
    <h2>Navegación</h2>
    <ul class="nav nav-pills mb-4">
        @foreach($navItems as $item)
        <li class="nav-item">
            <a class="nav-link" href="{{ $item['url'] }}">{{ $item['name'] }}</a>
        </li>
        @endforeach
    </ul>
    
    <h2>Información del Sistema</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Gestor de CVs - Alumnos</h5>
            <p class="card-text">
                Esta aplicación permite gestionar los currículums de los alumnos, 
                incluyendo su información personal, experiencia, formación y habilidades.
            </p>
            <a href="{{ route('alumno.create') }}" class="btn btn-primary">Comenzar</a>
        </div>
    </div>
</div>
@endsection