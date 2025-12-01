@extends('layouts.dashboard.main')

@section('main')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5>Agregar Miembro</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('equipo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo</label>
                    <input type="text" name="cargo" id="cargo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen de Perfil</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection