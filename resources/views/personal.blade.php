@extends('layouts.main')

@section('content')
<section class="py-4 container">

    {{-- Encabezado --}}
    <div class="text-center mb-4">
        <h1 class="fw-bold">Equipo institucional</h1>
        <p class="text-muted mb-0">Equipo humano de la I.E.I 020 organizado por funciones.</p>
    </div>

    @php
        // agrupamos por cargo
        $grupos = collect($personal)->groupBy('cargo');

        // orden jerárquico
        $orden = [
            'Directivo' => 'Directivos',
            'Docente' => 'Docentes',
            'Auxiliar de educación' => 'Auxiliares de educación',
            'Administrativo' => 'Administrativos',
        ];
    @endphp

    {{-- RESUMEN INFORMATIVO (ya no botones) --}}
    <div class="row g-3 mb-4">
        @foreach ($orden as $claveCargo => $tituloCargo)
            <div class="col-6 col-md-3">
                <div class="w-100 border rounded-3 p-3 bg-white text-center shadow-sm resumen-box">
                    <p class="mb-1 text-muted small">{{ $tituloCargo }}</p>
                    <p class="fs-4 fw-bold mb-0">
                        {{ $grupos->has($claveCargo) ? $grupos[$claveCargo]->count() : '0' }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

@foreach ($orden as $claveCargo => $tituloCargo)
    @if ($grupos->has($claveCargo))
        <div class="mb-4">
            {{-- si es Directivo centramos el título --}}
            <h2 class="h5 fw-bold mb-3 {{ $claveCargo === 'Directivo' ? 'text-center' : '' }}">
                {{ $tituloCargo }}
            </h2>

            @if ($claveCargo === 'Directivo')
                <div class="row g-3 justify-content-center">
                    @foreach ($grupos[$claveCargo] as $persona)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="{{ asset($persona['foto']) }}" class="card-img-top" alt="{{ $persona['nombres'] }}">
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-1">{{ $persona['nombres'] }}</h5>
                                    <p class="text-muted small mb-1">{{ $persona['telefono'] }}</p>
                                    <p class="mb-2">{{ $persona['seccion'] }}</p>
                                    <span class="badge bg-primary">{{ $tituloCargo }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row g-3">
                    @foreach ($grupos[$claveCargo] as $persona)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="{{ asset($persona['foto']) }}" class="card-img-top" alt="{{ $persona['nombres'] }}">
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-1">{{ $persona['nombres'] }}</h5>
                                    <p class="text-muted small mb-1">{{ $persona['telefono'] }}</p>
                                    <p class="mb-2">{{ $persona['seccion'] }}</p>
                                    <span class="badge bg-primary">{{ $tituloCargo }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endif
@endforeach
</section>
@endsection

@push('styles')
<style>
    .card img {
        object-fit: cover;
        height: 210px;
        background: #f3f6f9;
    }
    .resumen-box {
        border: 1px solid rgba(0,0,0,.03);
    }
</style>
@endpush
