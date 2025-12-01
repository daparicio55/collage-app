@extends('layouts.dashboard.main')
@section('main')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Editar Noticia</h5>
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

                    <form action="{{ route('dashboard.noticias.update', $noticia) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" 
                                   id="titulo" name="titulo" value="{{ old('titulo', $noticia->titulo) }}" required>
                            @error('titulo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('fecha') is-invalid @enderror" 
                                   id="fecha" name="fecha" value="{{ old('fecha', $noticia->fecha) }}" required>
                            @error('fecha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                      id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion', $noticia->descripcion) }}</textarea>
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
                            
                            @if($noticia->url_imagen)
                                <div class="mt-2">
                                    <label class="form-label">Imagen Actual:</label>
                                    <div class="position-relative d-inline-block">
                                        <img src="{{ asset($noticia->url_imagen) }}" alt="Imagen actual" 
                                             class="img-thumbnail" style="max-height: 150px">
                                        <div class="form-check mt-2">
                                            <input type="checkbox" class="form-check-input" id="eliminar_imagen" name="eliminar_imagen">
                                            <label class="form-check-label" for="eliminar_imagen">
                                                Eliminar imagen actual
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('dashboard.noticias.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Actualizar Noticia
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
    // Preview de imagen nueva
    document.getElementById('url_imagen').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.className = 'img-thumbnail mt-2';
                preview.style.maxHeight = '150px';
                
                // Eliminar preview anterior si existe
                const oldPreview = document.querySelector('.preview-nueva-imagen');
                if (oldPreview) oldPreview.remove();
                
                // Agregar nuevo preview
                const previewContainer = document.createElement('div');
                previewContainer.className = 'preview-nueva-imagen';
                previewContainer.appendChild(preview);
                
                const inputContainer = document.getElementById('url_imagen').parentElement;
                inputContainer.appendChild(previewContainer);
            };
            reader.readAsDataURL(file);
        }
    });

    // Manejar checkbox de eliminar imagen
    document.getElementById('eliminar_imagen')?.addEventListener('change', function(e) {
        const fileInput = document.getElementById('url_imagen');
        if (this.checked) {
            fileInput.disabled = true;
        } else {
            fileInput.disabled = false;
        }
    });
</script>
@endsection
