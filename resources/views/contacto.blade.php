@extends('layouts.main')

@section('content')
<div class="container py-4">

  {{-- Encabezado --}}
  <div class="text-center mb-4">
    <h1 class="fw-bold">Contáctenos</h1>
    <p class="text-muted mb-0">Estamos para ayudarte con matrículas, trámites y consultas.</p>
  </div>

  {{-- Notas rápidas / Avisos --}}
  <div class="alert alert-primary d-flex align-items-start gap-2 mb-4">
    <div class="fs-4">📌</div>
    <div>
      <strong>Atención presencial:</strong> Lun–Vie, 08:00–13:00. Secretaría en Jr. Amazonas – Chachapoyas.
      <br>Para matrículas, revisa la sección <a href="{{ route('home.matriculas') }}">Matrículas</a>.
    </div>
  </div>

  <div class="row g-4">
    {{-- Columna izquierda: tarjetas de contacto institucional --}}
    <div class="col-lg-5">
      <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
          <h5 class="fw-bold mb-2">Sede y atención</h5>
          <ul class="list-unstyled mb-0">
            <li class="mb-2">📍 <strong>Dirección:</strong> Jr. Amazonas, Chachapoyas – Amazonas</li>
            <li class="mb-2">☎️ <strong>Teléfono:</strong> (041) 000000</li>
            <li class="mb-2">✉️ <strong>Correo:</strong> <a href="mailto:iei020@educacion.gob.pe">iei020@educacion.gob.pe</a></li>
            <li class="mb-2">🕘 <strong>Horario:</strong> Lun–Vie, 08:00–13:00</li>
          </ul>
        </div>
      </div>

      <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
          <h6 class="text-muted text-uppercase mb-2">Canales directos</h6>
          <div class="d-grid gap-2">
            <a class="btn btn-primary" target="_blank" rel="noopener"
               href="https://wa.me/51999999999?text=Hola%2C%20quisiera%20informaci%C3%B3n%20sobre%20matr%C3%ADculas.">
              WhatsApp Secretaría
            </a>
            <a class="btn btn-outline-primary" href="tel:+5141000000">Llamar a la IE</a>
            <a class="btn btn-outline-secondary" href="mailto:iei020@educacion.gob.pe">Escribir por correo</a>
          </div>
        </div>
      </div>

      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="text-muted text-uppercase mb-2">Preguntas frecuentes</h6>
          <div class="accordion" id="faq">
            <div class="accordion-item">
              <h2 class="accordion-header" id="f1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#c1">
                  ¿Cuáles son los requisitos de matrícula?
                </button>
              </h2>
              <div id="c1" class="accordion-collapse collapse show" data-bs-parent="#faq">
                <div class="accordion-body small">
                  DNI del estudiante y padres/apoderado, carné de vacunación, fotos tamaño carné y ficha de matrícula (se entrega en la IE).
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="f2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c2">
                  ¿Desde qué edad se atiende?
                </button>
              </h2>
              <div id="c2" class="accordion-collapse collapse" data-bs-parent="#faq">
                <div class="accordion-body small">
                  Educación inicial 3, 4 y 5 años (edades consideradas al 31 de marzo del año de ingreso).
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="f3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c3">
                  ¿Tienen atención por la tarde?
                </button>
              </h2>
              <div id="c3" class="accordion-collapse collapse" data-bs-parent="#faq">
                <div class="accordion-body small">
                  La atención en Secretaría es de 08:00 a 13:00. Para otros horarios, coordinar por WhatsApp.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Columna derecha: mapa + formulario --}}
    <div class="col-lg-7">
      <div class="card border-0 shadow-sm mb-3">
        <div class="ratio ratio-16x9">
          <iframe
            src="https://www.google.com/maps?q=-6.23196,-77.86938&ll=-6.23196,-77.86938&z=15&output=embed"
            style="border:0" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Mapa — I.E.I 020">
          </iframe>
        </div>
      </div>


    </div>
  </div>

  {{-- Pie legal pequeño --}}
  <p class="text-muted small mt-4 mb-0">
    * La IEI resguarda tus datos conforme a la normativa de protección de datos personales.
  </p>
</div>

@push('scripts')
<script>
  // Demo de envío (sin backend)
  if (window.JMM && !JMM.enviarContacto) {
    JMM.enviarContacto = function(e){
      e.preventDefault();
      alert('¡Gracias! Hemos recibido tu mensaje. Te responderemos a la brevedad.');
      e.target.reset();
    }
  }
</script>
@endpush
@endsection
