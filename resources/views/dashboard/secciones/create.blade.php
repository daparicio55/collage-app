@extends('layouts.dashboard.main')
@section('main')
<div class="container py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Crear Sección</h5>
            <a href="{{ route('dashboard.secciones.index') }}" class="btn btn-secondary btn-sm">Volver</a>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('dashboard.secciones.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="grado" class="form-label">Grado</label>
                    <select name="grado" id="grado" class="form-select" required>
                        <option value="3 años">3 años</option>
                        <option value="4 años">4 años</option>
                        <option value="5 años">5 años</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="seccion" class="form-label">Sección</label>
                    <input name="seccion" id="seccion" class="form-control" value="{{ old('seccion') }}" required />
                </div>
                <div class="mb-3">
                    <label for="vacantes" class="form-label">Vacantes</label>
                    <input name="vacantes" id="vacantes" type="number" class="form-control" value="{{ old('vacantes', 0) }}" required />
                </div>
                <div class="mb-3">
                    <label for="docente" class="form-label">Docente</label>
                    <select name="docente_id" id="docente" class="form-select" required>
                        <option value="">Seleccionar docente</option>
                        @foreach($docentes as $docente)
                            <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('dashboard.secciones.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Crear Sección</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
