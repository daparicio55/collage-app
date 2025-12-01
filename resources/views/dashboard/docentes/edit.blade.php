@extends('layouts.dashboard.main')

@section('main')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5>Editar Miembro</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('docentes.', $miembro->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $miembro->nombre }}" required>
                </div>
                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo</label>
                    <input type="text" name="cargo" id="cargo" class="form-control" value="{{ $miembro->cargo }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $miembro->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $miembro->telefono }}">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen de Perfil</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection