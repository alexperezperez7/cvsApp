@extends('template.base')

@section('content')
<h2>Lista de CVs</h2>

<!-- Modal de confirmación -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Confirmar eliminación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Seguro que quieres eliminar el CV del alumno <span id="modal-student-name"></span>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button form="form-delete" type="submit" class="btn btn-danger">Eliminar CV</button>
      </div>
    </div>
  </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Nota Media</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->id }}</td>
            <td>{{ $alumno->nombre }}</td>
            <td>{{ $alumno->apellidos }}</td>
            <td>{{ $alumno->correo }}</td>
            <td>{{ $alumno->nota_media }}</td>
            <td>
                <a href="{{ route('alumno.show', $alumno->id) }}" class="btn btn-success btn-sm">Ver</a>
                <a href="{{ route('alumno.edit', $alumno->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <button type="button" data-name="{{ $alumno->nombre }} {{ $alumno->apellidos }}" 
                        data-href="{{ route('alumno.destroy', $alumno->id) }}" 
                        class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    Eliminar
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="5">Total de CVs:</th>
            <th>{{ count($alumnos) }}</th>
        </tr>
    </tfoot>
</table>

<form id="form-delete" action="" method="post">
    @csrf
    @method('delete')
</form>

<a href="{{ route('alumno.create') }}" class="btn btn-primary">Añadir Nuevo CV</a>
@endsection

@section('scripts')
<script>
const formDelete = document.getElementById('form-delete');
const deleteModal = document.getElementById('deleteModal');
const spanModalStudentName = document.getElementById('modal-student-name');

deleteModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const name = button.getAttribute('data-name');
    const href = button.getAttribute('data-href');
    formDelete.action = href;
    spanModalStudentName.textContent = name;
});
</script>
@endsection