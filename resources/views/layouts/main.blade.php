<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $marca['nombre'] }}</title>
<meta name="description" content="I.E.I 020: Programas, Matrículas y Contacto.">
<!-- Bootstrap first so site overrides from main.css take effect -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('recursos/css/main.css') }}">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<header class="topbar">
  <div class="wrap header">
    <a class="brand" href="#"><img src="{{ asset($marca['logo']) }}" alt="Logo {{ $marca['nombre'] }} ?>"><span class="brand-title">{{ $marca['nombre'] }}</span></a>
    <button class="menu-btn" onclick="JMM.toggleMenu()">☰</button>
      {{-- Botón para acceder al panel de administración (visible solo a usuarios autenticados) --}}
      @auth
        <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm ms-2 admin-panel-btn d-flex align-items-center" aria-label="Ir al panel de administración" title="Panel de administración">
          <i class="fas fa-cog me-2" aria-hidden="true"></i>
          <span class="d-none d-md-inline">Panel</span>
        </a>
      @endauth
    <nav id="mainNav" class="nav">
     <a href="{{ url('/') }}"
     class="btn-home {{ request()->is('/') ? 'active' : '' }}"
     aria-label="Inicio">
     <img src="{{ asset('recursos/Inicio.png') }}" alt="Inicio" width="30" height="30">
  </a>
<div class="has-sub">
    <a href="{{ route('nosotros.index') }}">Nosotros ▾</a>
    <div class="sub">
        <a href="{{ route('nosotros.index') }}">Quiénes somos</a>
        <a href="{{ route('nosotros.tab', 'mision') }}">Misión</a>
        <a href="{{ route('nosotros.tab', 'vision') }}">Visión</a>
        <a href="{{ route('nosotros.tab', 'valores') }}">Valores</a>
        <a href="{{ route('nosotros.tab', 'metas') }}">Metas</a>
    </div>
</div>

  <div class="has-sub">
      <a href="{{ route('personal.index') }}">Equipo institucional</a>
  </div>
  <a href="{{ route('secciones.index') }}">Secciones</a>
  <a href="{{ route('home.programas') }}">Programas</a>
  <a href="{{ route('home.matriculas') }}">Matrículas</a>
  <a href="{{ route('home.contacto') }}">Contáctenos</a>
</nav>
  </div>
</header>

<main class="content-area">
  @yield('content')
</main>

<footer class="site-footer">
  <div class="wrap foot d-flex flex-column flex-md-row justify-content-between align-items-start gap-4">
    <div class="footer-brand" style="max-width:320px;">
      <a href="{{ url('/') }}" class="d-flex align-items-center gap-2 text-decoration-none text-reset">
        <img src="{{ asset($marca['logo']) }}" alt="{{ $marca['nombre'] }}" style="height:64px; width:auto; object-fit:contain;">
        <div>
          <strong class="d-block">{{ $marca['nombre'] }}</strong>
          <small class="text-muted">{{ $marca['eslogan'] }}</small>
        </div>
      </a>
      <p class="small text-muted mt-3">RUC 10430536431 · Jr. Amazonas cuadra 1, Chachapoyas – Perú</p>
    </div>

    <div class="footer-links d-flex gap-4">
      <div>
        <h6 class="mb-2">Explorar</h6>
        <ul class="list-unstyled small mb-0">
          <li><a href="{{ url('/') }}">Inicio</a></li>
          <li><a href="{{ route('nosotros.index') }}">Nosotros</a></li>
          <li><a href="{{ route('secciones.index') }}">Secciones</a></li>
          <li><a href="{{ route('home.programas') }}">Programas</a></li>
        </ul>
      </div>

      <div>
        <h6 class="mb-2">Ayuda & Contacto</h6>
        <ul class="list-unstyled small mb-0">
          <li><a href="{{ route('home.contacto') }}">Contáctenos</a></li>
          <li><a href="#">Preguntas frecuentes</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-contact text-md-end" style="min-width:200px;">
      <h6 class="mb-2">Contáctanos</h6>
      <div class="small text-muted">Teléfono: (041) 000000 · <a href="mailto:iei020@educacion.gob.pe">iei020@educacion.gob.pe</a></div>
      <div class="social mt-3">
        <a href="#" class="btn btn-outline-light btn-sm me-1"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="btn btn-outline-light btn-sm me-1"><i class="fab fa-instagram"></i></a>
        <a href="#" class="btn btn-outline-light btn-sm"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>
  </div>

  <div class="text-center py-3 border-top small" style="border-color:rgba(255,255,255,0.06)">
    © {{ date('Y') }} {{ $marca['nombre'] }} — Todos los derechos reservados.
  </div>
</footer>

<script>
(function(win,doc){
  const $=s=>doc.querySelector(s), $$=s=>Array.from(doc.querySelectorAll(s));
  const st={cur:0,slides:[]};
  function toggleMenu(){ $('#mainNav')?.classList.toggle('open'); }
  function railScroll(d){ $('#rail')?.scrollBy({left:d*260,behavior:'smooth'}); }
  function init(){ st.slides=$$('.slide'); if(st.slides.length) setInterval(next,7000); }
  function show(n){ st.slides.forEach((s,i)=>s.style.display=i===n?'block':'none'); st.cur=n; }
  function next(){ if(!st.slides.length) return; show((st.cur+1)%st.slides.length); }
  function prev(){ if(!st.slides.length) return; show((st.cur-1+st.slides.length)%st.slides.length); }
  function enviarContacto(e){ e.preventDefault(); alert('¡Gracias! Nos pondremos en contacto.'); e.target.reset(); }
  win.JMM={toggleMenu,railScroll,nextSlide:next,prevSlide:prev,enviarContacto};
  doc.addEventListener('DOMContentLoaded',init);
})(window,document);

  // Añade esto dentro de tu IIFE si quieres:
  // win.JMM = { ... , enviarPreinscripcion };
  function enviarPreinscripcion(e){
    e.preventDefault();
    alert('¡Gracias! Hemos recibido su preinscripción. La IE se comunicará con usted.');
    e.target.reset();
    // Si deseas, puedes llevar al usuario arriba del Proceso:
    location.hash = '#proceso-inicial';
  }
  if(window.JMM){ JMM.enviarPreinscripcion = enviarPreinscripcion; }
</script>
@stack('js')
@stack('scripts')
</body>
</html>
