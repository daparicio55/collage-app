@extends('layouts.main')

@section('content')
<section class="py-4 container">
  {{-- Encabezado --}}
  <div class="text-center mb-4">
    <h1 class="fw-bold">Programas y Competencias</h1>
    <p class="text-muted mb-0">Conjunto de competencias del Nivel Inicial presentadas en tarjetas informativas.</p>
  </div>

  {{-- Filtros simples por área (opcional, no rompe nada si no los usas) --}}
  @php
    $areas = collect($competencias)->pluck('area')->unique()->values();
  @endphp
  <div class="d-flex flex-wrap gap-2 justify-content-center mb-3">
    <button class="btn btn-sm btn-outline-secondary filtro-area active" data-area="Todos">Todos</button>
    @foreach($areas as $a)
      <button class="btn btn-sm btn-outline-secondary filtro-area" data-area="{{ $a }}">{{ $a }}</button>
    @endforeach
  </div>

  {{-- Grid de tarjetas --}}
  <div class="row g-3" id="grid-competencias">
    @foreach ($competencias as $c)
      <div class="col-12 col-sm-6 col-lg-4 comp-item" data-area="{{ $c['area'] }}">
        <div class="card h-100 shadow-sm border-0 comp-card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <span class="fs-4">{{ $c['icon'] }}</span>
              <span class="badge bg-light text-dark">{{ $c['area'] }}</span>
            </div>
            <h5 class="card-title mb-2">{{ $c['titulo'] }}</h5>
            <p class="card-text small mb-0" style="text-align: justify;">
              {{ $c['desc'] }}
            </p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>
@endsection

@push('styles')
<style>
  .comp-card{ transition: .15s ease; border:1px solid rgba(0,0,0,.04) }
  .comp-card:hover{ transform: translateY(-2px); box-shadow:0 .75rem 1.25rem rgba(0,0,0,.08) }
  .filtro-area.active{ background:#0d6efd; color:#fff; border-color:#0d6efd }
</style>
@endpush

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const btns = document.querySelectorAll('.filtro-area');
    const items = document.querySelectorAll('.comp-item');

    btns.forEach(b => b.addEventListener('click', () => {
      btns.forEach(x => x.classList.remove('active'));
      b.classList.add('active');

      const area = b.dataset.area;
      items.forEach(it => {
        if (area === 'Todos' || it.dataset.area === area) {
          it.classList.remove('d-none');
        } else {
          it.classList.add('d-none');
        }
      });
    }));
  });
</script>
@endpush
