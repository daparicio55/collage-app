@extends('layouts.dashboard.main')
@section('main')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Lista de Noticias</h1>
        <a href="{{ route('dashboard.noticias.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Nueva Noticia
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
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($noticias as $noticia)
                            <tr>
                                <td>{{ $noticia->titulo }}</td>
                                <td>{{ Str::limit($noticia->descripcion, 100) }}</td>
                                <td>{{ $noticia->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('dashboard.noticias.edit', $noticia) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('dashboard.noticias.destroy', $noticia) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ms-2" 
                                                    onclick="return confirm('¿Estás seguro que deseas eliminar esta noticia?')">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    No hay noticias registradas
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

{{--     <div class="mt-3">
        {{ $noticias->links() }}
    </div> --}}
</div>
@endsection
