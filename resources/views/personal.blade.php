@extends('layouts.main')

@section('content')
    <section class="py-4 container">

        {{-- Encabezado --}}
        <div class="text-center mb-3">
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

        {{-- 🔎 Filtro rápido (nuevo) --}}
        <div class="row g-2 align-items-center mb-3">
            <div class="col-12 col-sm-6">
                <input id="filtro-nombre" type="search" class="form-control form-control-sm"
                    placeholder="Buscar por nombre o sección…">
            </div>
            <div class="col-6 col-sm-3">
                <select id="filtro-cargo" class="form-select form-select-sm">
                    <option value="">Todos los cargos</option>
                    @foreach ($orden as $k => $t)
                        <option value="{{ $k }}">{{ $t }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-sm-3 text-sm-end">
                <small class="text-muted">Última actualización: {{ now()->format('d/m/Y') }}</small>
            </div>
        </div>

        {{-- RESUMEN INFORMATIVO (ahora con anclas) --}}
        <div class="row g-3 mb-4">
            @foreach ($orden as $claveCargo => $tituloCargo)
                <div class="col-6 col-md-3">
                    <a href="#sec-{{ Str::slug($claveCargo) }}" class="resumen-link d-block text-decoration-none">
                        <div class="w-100 border rounded-3 p-3 bg-white text-center shadow-sm resumen-box">
                            <p class="mb-1 text-muted small">{{ $tituloCargo }}</p>
                            <p class="fs-4 fw-bold mb-0">
                                {{ $grupos->has($claveCargo) ? $grupos[$claveCargo]->count() : '0' }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- LISTADO POR CATEGORÍA --}}
        @foreach ($orden as $claveCargo => $tituloCargo)
            @if ($grupos->has($claveCargo))
                <div class="mb-4" id="sec-{{ Str::slug($claveCargo) }}">
                    {{-- si es Directivo centramos el título --}}
                    <h2 class="h5 fw-bold mb-3 {{ $claveCargo === 'Directivo' ? 'text-center' : '' }}">
                        {{ $tituloCargo }}
                    </h2>

                    @if ($claveCargo === 'Directivo')
                        <div class="row g-3 justify-content-center">
                        @else
                            <div class="row g-3">
                    @endif

                    @foreach ($grupos[$claveCargo] as $key => $persona)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 border-0 shadow-sm persona-card" data-cargo="{{ $claveCargo }}"
                                data-nombre="{{ Str::lower(($persona['nombres'] ?? 'Nombre no disponible') . ' ' . ($persona['seccion'] ?? 'Sección no disponible')) }}">
                                <img src="{{ asset($persona['foto'] ?? 'recursos/placeholder/persona.png') }}" style="height: 250px;"
                                    alt="{{ $persona['nombres'] ?? 'Nombre no disponible' }}" loading="lazy"
                                    onerror="this.src='{{ asset('recursos/placeholder/persona.png') }}'">
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-1">{{ $persona['nombres'] ?? 'Nombre no disponible' }}</h5>
                                    <p class="text-muted small mb-1">{{ $persona['telefono'] ?? 'Teléfono no disponible' }}</p>
                                    <p class="mb-2">{{ $persona['seccion'] ?? 'Sección no disponible' }}</p>
                                    <span class="badge bg-primary">{{ $tituloCargo }}</span>
                                    <div class="d-block">
                                        <button class="btn btn-info btn-sm py-0 px-4 mt-2" type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $key }}">
                                            Ver mas
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- MODAL DOCENTE -->
                        <div class="modal fade" id="exampleModal-{{ $key }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">

                                    <!-- CABECERA -->
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="modalCarlaLabel">
                                            {{ $persona['nombres'] ?? 'Nombre no disponible' }}
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Cerrar"></button>
                                    </div>

                                    <!-- CUERPO -->
                                    <div class="modal-body">
                                        <div class="row">

                                            <!-- COLUMNA IZQUIERDA: FOTO + RESUMEN -->
                                            <div class="col-md-4 text-center border-end mb-3 mb-md-0">
                                                <img src="img/docentes/carla.jpg" class="img-fluid rounded-circle mb-3"
                                                    alt="Foto de Carla Rodríguez">
                                                <p class="mb-0 fw-bold">Docente de Educación Inicial</p>
                                                <small class="text-muted d-block">Experiencia: 5 años</small>
                                            </div>

                                            <!-- COLUMNA DERECHA: INFORMACIÓN DETALLADA -->
                                            <div class="col-md-8">
                                                <!-- Información personal -->
                                                <h6 class="text-uppercase text-muted mb-2">Información personal</h6>
                                                <ul class="list-unstyled small mb-3">
                                                    <li><span class="fw-semibold">DNI:</span> 12345678</li>
                                                    <li><span class="fw-semibold">Teléfono:</span> 987 654 321</li>
                                                    <li><span class="fw-semibold">Correo institucional:</span>
                                                        carla.rodriguez@iei020.edu.pe</li>
                                                </ul>

                                                <!-- Perfil profesional -->
                                                <h6 class="text-uppercase text-muted mb-2">Perfil profesional</h6>
                                                <ul class="list-unstyled small mb-3">
                                                    <li><span class="fw-semibold">Grado académico:</span> Licenciada en
                                                        Educación Inicial</li>
                                                    <li><span class="fw-semibold">Especialidad:</span> Desarrollo
                                                        socioemocional y psicomotricidad</li>
                                                    <li><span class="fw-semibold">Años de servicio en la
                                                            institución:</span> 5 años</li>
                                                    <li><span class="fw-semibold">Cursos / áreas que atiende:</span>
                                                        Comunicación, Personal Social</li>
                                                    <li><span class="fw-semibold">Líneas de trabajo:</span> Proyectos de
                                                        lectura temprana, trabajo con familias.</li>
                                                </ul>

                                                <!-- Algo distintivo -->
                                                <h6 class="text-uppercase text-muted mb-2">Frase pedagógica</h6>
                                                <p class="small fst-italic mb-0">
                                                    “Educar desde el juego y la emoción es sembrar confianza para toda la
                                                    vida”.
                                                </p>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- PIE -->
                                    <div class="modal-footer justify-content-between">
                                        <small class="text-muted">Ficha actualizada: agosto 2025</small>
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
            @endif
        @endforeach
    </section>
@endsection

@push('styles')
    <style>
        .card img {
            object-fit: cover;
            height: 200px;
            background: #f3f6f9;
        }

        .resumen-box {
            border: 1px solid rgba(0, 0, 0, .03);
            transition: .15s ease;
        }

        .resumen-link:hover .resumen-box {
            transform: translateY(-2px);
            box-shadow: 0 .8rem 1.4rem rgba(0, 0, 0, .06);
        }

        .persona-card {
            transition: .15s ease
        }

        .persona-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 1rem 1.8rem rgba(0, 0, 0, .08)
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const qInput = document.getElementById('filtro-nombre');
            const cargoSel = document.getElementById('filtro-cargo');
            const cards = [...document.querySelectorAll('.persona-card')];

            function filtrar() {
                const q = (qInput.value || '').toLowerCase().trim();
                const cargo = cargoSel.value;
                cards.forEach(c => {
                    const coincideTexto = c.dataset.nombre.includes(q);
                    const coincideCargo = !cargo || c.dataset.cargo === cargo;
                    c.parentElement.classList.toggle('d-none', !(coincideTexto && coincideCargo));
                });
            }

            qInput.addEventListener('input', filtrar);
            cargoSel.addEventListener('change', filtrar);
        });
    </script>
@endpush
