<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $marca['nombre'] }}</title>
<meta name="description" content="I.E.I 020: Programas, Matrículas y Contacto.">
<link rel="stylesheet" href="{{ asset('recursos/css/main.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<header class="topbar">
  <div class="wrap header">
    <a class="brand" href="#"><img src="{{ asset($marca['logo']) }}" alt="Logo {{ $marca['nombre'] }} ?>"><span class="brand-title">{{ $marca['nombre'] }}</span></a>
    <button class="menu-btn" onclick="JMM.toggleMenu()">☰</button>
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
  <a href="#">Programas</a>
  <a href="{{ route('home.matriculas') }}">Matrículas</a>
  <a href="#">Contáctenos</a>
</nav>
  </div>
</header>

@yield('content')

<footer>
  <div class="wrap foot">
    <div><strong>{{ $marca['nombre'] }}</strong> • {{ $marca['eslogan'] }}</div>
    <div>RUC 10430536431 · AA.HH. 16 de octubre, Chachapoyas – Perú</div>
    <div class="social"><a href="#">Facebook</a><a href="#">Instagram</a><a href="#">WhatsApp</a></div>
    <div class="copy">© {{ date('Y') }} {{ $marca['nombre'] }}. Todos los derechos reservados.</div>
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
