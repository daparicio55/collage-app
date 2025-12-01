@extends('layouts.dashboard.main')
@section('main')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Secciones</h1>
        <a href="{{ route('dashboard.secciones.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Nueva Sección
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Grado</th>
                            <th>Sección</th>
                            <th>Vacantes</th>
                            <th>Docente</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($secciones as $sec)
                            <tr>
                                <td>{{ $sec->grado }}</td>
                                <td>{{ $sec->seccion }}</td>
                                <td>{{ $sec->vacantes }}</td>
                                <td>{{ $sec->docente->nombre }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('dashboard.secciones.edit', $sec) }}" class="btn btn-sm btn-primary">Editar</a>
                                        <form action="{{ route('dashboard.secciones.destroy', $sec) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ms-2" onclick="return confirm('¿Eliminar esta sección?')">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay secciones registradas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">{{ $secciones->links() }}</div>
</div>
@endsection
