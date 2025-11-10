@extends('template.base')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>CV de {{ $alumno->getNombreCompleto() }}</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ route('image.view', $alumno->id) }}?v={{ time() }}" 
                     class="img-fluid rounded mb-3" 
                     style="max-height: 300px; object-fit: cover;"
                     alt="Foto de {{ $alumno->getNombreCompleto() }}"
                     onerror="this.src='{{ url('assets/img/noimage.png') }}'">
                <h4>{{ $alumno->getNombreCompleto() }}</h4>
                <p class="text-muted">{{ $alumno->correo }}</p>
                <p class="text-muted">{{ $alumno->telefono }}</p>
                
                @if(!$alumno->fotografia)
                <div class="alert alert-info mt-2">
                    <small><i class="fas fa-info-circle"></i> Sin fotografía</small>
                </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="mb-4">
                    <h5>Información Personal</h5>
                    <p><strong>Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento->format('d/m/Y') }} ({{ $alumno->getEdad() }} años)</p>
                    <p><strong>Nota Media:</strong> {{ $alumno->nota_media }}</p>
                </div>

                <div class="mb-4">
                    <h5>Experiencia</h5>
                    <p>{{ $alumno->experiencia ?: 'Sin experiencia registrada' }}</p>
                </div>

                <div class="mb-4">
                    <h5>Formación</h5>
                    <p>{{ $alumno->formacion ?: 'Sin formación registrada' }}</p>
                </div>

                <div class="mb-4">
                    <h5>Habilidades</h5>
                    <p>{{ $alumno->habilidades ?: 'Sin habilidades registradas' }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('alumno.edit', $alumno->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('alumno.index') }}" class="btn btn-secondary">Volver a la lista</a>
        <a href="{{ route('main.index') }}" class="btn btn-primary">Inicio</a>
    </div>
</div>

@if(session('general'))
<div class="alert alert-success mt-3">
    {{ session('general') }}
</div>
@endif
@endsection

@section('scripts')

<style>
.card img {
    border: 3px solid #dee2e6;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
</style>
@endsection