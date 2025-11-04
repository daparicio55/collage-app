@extends('layouts.main')

@section('content')
<section class="py-4">
  <div class="container">
    <h1 class="text-center fw-bold mb-4">Nuestras Secciones Disponibles</h1>
    @foreach ($secciones as $key_nivel => $seccion )
      <div class="card shadow-sm mb-4 border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center gap-3">
            <span class="fs-5 fw-semibold">{{ $seccion['nivel'] }}</span>
            <span class="badge bg-light text-dark">{{ count($seccion['secciones']) }} secciones</span>
          </div>
          <small class="opacity-75">Año escolar 2025</small>
        </div>
        <div class="card-body">
          <div class="row g-3">

            @foreach ($seccion['secciones'] as $key_seccion => $sec )
              <div class="col-md-6">
                <div class="section-card h-100 p-3 rounded-3 border position-relative">
                  <div class="d-flex justify-content-between align-items-start">
                    <h5 class="mb-1">{{ $sec['nombre'] }}</h5>
                    <span class="badge bg-success">
                      {{ $sec['cupos'] }} Vacantes
                    </span>
                  </div>

                  <div class="small text-muted mb-2">
                    {{ $sec['descripcion'] }}
                  </div>

                  
                  <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-{{ $key_nivel }}-{{ $key_seccion }}">
                      Ver más
                    </button>

                    @include('modal-secciones')

                  </div>
                </div>
              </div>
            @endforeach

            </div>
        </div>
        
      </div>
    @endforeach
  </div>
</section>
@endsection

@push('styles')
<style>
  .section-card{transition:all .15s ease;border-color:#e8ecef;background:#fff}
  .section-card:hover{box-shadow:0 10px 24px rgba(0,0,0,.08);transform:translateY(-1px)}
</style>
@endpush
