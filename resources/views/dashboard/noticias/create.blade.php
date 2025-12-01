@extends('layouts.dashboard.main')
@section('main')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Crear Nueva Noticia</h5>
                    <a href="{{ route('dashboard.noticias.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left me-2"></i>Volver
                    </a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('dashboard.noticias.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" 
                                   id="titulo" name="titulo" value="{{ old('titulo') }}" required>
                            @error('titulo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('fecha') is-invalid @enderror" 
                                   id="fecha" name="fecha" value="{{ old('fecha', date('Y-m-d')) }}" required>
                            @error('fecha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                      id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="url_imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control @error('url_imagen') is-invalid @enderror" 
                                   id="url_imagen" name="url_imagen" accept="image/*">
                            @error('url_imagen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB</div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('dashboard.noticias.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Guardar Noticia
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Preview de imagen
    document.getElementById('url_imagen').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Aquí puedes agregar código para mostrar una vista previa de la imagen si lo deseas
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
