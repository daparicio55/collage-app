@extends('layouts.main')

@section('content')
<section class="py-4">
  <div class="container">
    <h1 class="text-center fw-bold mb-4">Nuestras Secciones Disponibles</h1>

    @php
      // Si viene como array lo convertimos en Collection,
      // así siempre funciona el groupBy del foreach.
      $coleccion = $secciones instanceof \Illuminate\Support\Collection
                  ? $secciones
                  : collect($secciones);
    @endphp

    @forelse ($coleccion->groupBy('grado') as $grado => $seccionesPorGrado)
      <div class="card shadow-sm mb-4 border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center gap-3">
            <span class="fs-5 fw-semibold">
              {{-- Muestra “3 años”, “4 años”, etc. si es numérico; si no, deja el texto tal cual --}}
              {{ is_numeric($grado) ? $grado.' años' : $grado }}
            </span>
            <span class="badge bg-light text-dark">{{ $seccionesPorGrado->count() }} secciones</span>
          </div>
          <small class="opacity-75">Año escolar 2025</small>
        </div>

        <div class="card-body">
          <div class="row g-3">
            @foreach ($seccionesPorGrado as $seccionGrupo)
              @foreach ($seccionGrupo['secciones'] as $seccion)
                <div class="col-md-6">
                  <div class="section-card h-100 p-3 rounded-3 border position-relative">
                    <div class="d-flex justify-content-between align-items-start">
                      <h5 class="mb-1">{{ $seccion['nombre'] ?? 'Sección no disponible' }}</h5>
                      <span class="badge bg-accent">
                        {{ $seccion['vacantes'] ?? '0' }} Vacantes
                      </span>
                    </div>

                    <div class="small text-muted mb-2">
                      Sección para niños de {{ is_numeric($grado) ? $grado.' años' : $grado }}.
                    </div>

                    <div class="d-flex gap-2">
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                        data-bs-toggle="modal"
                        data-bs-target="#modal-{{ Str::slug($grado,'-') }}-{{ $seccion['nombre'] ?? Str::random(5) }}"
                      >
                        Ver más
                      </button>

                      {{-- Si tu partial requiere $seccion, pásalo explícitamente --}}
                      @include('modal-secciones', [
                          'seccion' => $seccion,
                          'grado' => $grado,
                          'key_nivel' => Str::slug($grado, '-'),
                          'key_seccion' => $seccion['nombre'] ?? Str::random(5)
                      ])
                    </div>
                  </div>
                </div>
              @endforeach
            @endforeach
          </div>
        </div>
      </div>
    @empty
      <div class="alert alert-light border">
        Aún no hay secciones registradas.
      </div>
    @endforelse

  </div>
</section>
@endsection

@push('styles')
<style>
  .section-card{transition:all .15s ease;border-color:#e8ecef;background:#fff}
  .section-card:hover{box-shadow:0 10px 24px rgba(0,0,0,.08);transform:translateY(-1px)}
  .bg-accent{background:#6f42c1!important}
</style>
@endpush
