<?php

$page = $_GET['p'] ?? 'home';
$valid = ['home','nosotros', 'personal','matriculas','programas','contacto'];
if (!in_array($page, $valid)) $page = 'home';
$sub = $_GET['s'] ?? 'quienes';                 // subsección de Nosotros (por defecto: Quiénes somos)
$valid_sub = ['quienes','mision','vision','valores'];
if (!in_array($sub, $valid_sub)) $sub = 'quienes';

$niv = $_GET['n'] ?? 'inicial';                // subsección de Niveles
$valid_niv = ['inicial','primaria'];
if (!in_array($niv, $valid_niv)) $niv = 'inicial';

$vista = $_GET['vista'] ?? ''; 
function active($slug){ return (($_GET['p'] ?? 'home') === $slug) ? ' class="active"' : ''; }
function subactive($slug,$cur){ return $slug===$cur ? ' style="font-weight:700;opacity:1"' : ''; }
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($marca['nombre']) ?> — <?= $page==='home'?'Inicio':ucfirst($page) ?></title>
<meta name="description" content="I.E.I 020: Programas, Matrículas y Contacto.">
<link rel="stylesheet" href="{{ asset('recursos/css/main.css') }}">
</head>
<body>
<header class="topbar">
  <div class="wrap header">
    <a class="brand" href="?"><img src="<?= $marca['logo'] ?>" alt="Logo <?= htmlspecialchars($marca['nombre']) ?>"><span class="brand-title"><?= htmlspecialchars($marca['nombre']) ?></span></a>
    <button class="menu-btn" onclick="JMM.toggleMenu()">☰</button>
    <nav id="mainNav" class="nav">
      <a href="{{ url('/') }}"
     class="btn-home {{ request()->is('/') ? 'active' : '' }}"
     aria-label="Inicio">
     <img src="{{ asset('recursos/Inicio.png') }}" alt="Inicio" width="30" height="30">
  </a>
<div class="has-sub">
  <a href="?p=nosotros"<?= active('nosotros') ?>>Nosotros ▾</a>
  <div class="sub">
    <a href="?p=nosotros&s=quienes" <?= subactive('quienes', $sub) ?>>Quiénes somos</a>
    <a href="?p=nosotros&s=mision"  <?= subactive('mision',  $sub) ?>>Misión</a>
    <a href="?p=nosotros&s=vision"  <?= subactive('vision',  $sub) ?>>Visión</a>
    <a href="?p=nosotros&s=valores" <?= subactive('valores', $sub) ?>>Valores</a>
    <a href="?p=nosotros&s=valores" <?= subactive('valores', $sub) ?>>Valores</a>
  </div>
</div>


  <div class="has-sub">
    <a href="?p=personal"<?=active('personal')?>>Personal</a>
    <div class="sub">
      <a href="?p=niveles&n=inicial"  <?= subactive('inicial',  $niv) ?>>Educación Inicial</a>
    </div>
  </div>

  <a href="?p=programas" <?= active('programas') ?>>Programas</a>
  <a href="?p=matriculas" <?= active('matriculas') ?>>Matrículas</a>
  <a href="?p=contacto"   <?= active('contacto')   ?>>Contáctenos</a>
</nav>
  </div>
</header>

<main>
<?php if($page==='home'): ?>
  <!-- ===== INICIO (solo atractivo) ===== -->
  <section class="hero">
    <div class="wrap hero-grid">
      <aside class="flyer-box">
        <div class="flyer-head">
          <h3>Cronograma</h3>
          <div class="rail-nav">
            <button type="button" onclick="JMM.railScroll(-1)">‹</button>
            <button type="button" onclick="JMM.railScroll(1)">›</button>
          </div>
        </div>
        <div id="rail" class="rail">
          <?php foreach($flyers as $f): ?>
            <a class="card-f" href="<?= $f['link'] ?>">
              <img src="<?= $f['img'] ?>" alt="<?= htmlspecialchars($f['t']) ?>">
              <div class="cap"><?= htmlspecialchars($f['t']) ?></div>
            </a>
          <?php endforeach; ?>
        </div>
      </aside>

      <section class="slider" aria-roledescription="carrusel">
        <?php foreach($slides as $k=>$s): ?>
          <article class="slide" data-slide="<?= $k ?>" style="display:<?= $k===0?'block':'none' ?>;background-image:url('<?= $s[''] ?>')">
            <div class="txt">
              <h2><?= htmlspecialchars($s['h2']) ?></h2>
              <p><?= htmlspecialchars($s['p']) ?></p>
              <a class="btn" href="<?= $s['link'] ?>"><?= htmlspecialchars($s['cta']) ?></a>
            </div>
            <div class="slider-nav">
              <button type="button" onclick="JMM.prevSlide()">‹</button>
              <button type="button" onclick="JMM.nextSlide()">›</button>
            </div>
          </article>
        <?php endforeach; ?>
      </section>
    </div>
  </section>

<?php elseif($page==='programas'): ?>
  <section class="page">
    <div class="wrap">
      <h1 class="hx">Programas</h1>
      <div class="grid3">
        <?php foreach($programas as $p): ?>
          <article class="card" id="<?= $p['slug'] ?>">
            <img src="<?= 'recursos/program-'.$p['slug'].'.jpg' ?>" alt="<?= htmlspecialchars($p['titulo']) ?>">
            <div class="body">
              <strong><?= $p['icono'] ?> <?= htmlspecialchars($p['titulo']) ?></strong>
              <p><?= htmlspecialchars($p['desc']) ?></p>
              <a class="btn" href="?p=matriculas">Quiero inscribir</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php elseif($page==='nosotros'): ?>
  <section class="page">
    <div class="wrap">
      <h1 class="hx">Nosotros</h1>
      <?php
// Tarjetas para subtemas
$nos_cards = [
  ['slug'=>'quienes','titulo'=>'Quiénes somos','desc'=>'Nuestra identidad y propósito.','img'=>'recursos/nos-quienes.jpg'],
  ['slug'=>'mision', 'titulo'=>'Misión','desc'=>'Razón de ser del servicio educativo.','img'=>'recursos/nos-mision.jpg'],
  ['slug'=>'vision', 'titulo'=>'Visión','desc'=>'A dónde queremos llegar.','img'=>'recursos/nos-vision.jpg'],
  ['slug'=>'valores','titulo'=>'Valores','desc'=>'Principios que nos guían.','img'=>'recursos/nos-valores.jpg'],
];
?>
<div class="grid4" style="margin:12px 0 18px">
  <?php foreach($nos_cards as $c): ?>
    <a class="nos-card <?= $sub===$c['slug']?'active':'' ?>" href="?p=nosotros&s=<?= $c['slug'] ?>">
      <img src="<?= htmlspecialchars($c['img']) ?>" alt="<?= htmlspecialchars($c['titulo']) ?>">
      <div class="body">
        <div class="kicker">Nosotros</div>
        <strong><?= htmlspecialchars($c['titulo']) ?></strong>
        <p style="margin:.4rem 0 0;opacity:.9"><?= htmlspecialchars($c['desc']) ?></p>
      </div>
    </a>
  <?php endforeach; ?>
</div>

 <div class="card"><div class="body">
  <?php if($sub==='quienes'): ?>
    <h2 class="hx" style="font-size:22px">Quiénes somos</h2>
    <p>Somos la I.E.I 379 <strong>Mundo Mágico</strong>, una institución pública de educación inicial que promueve el desarrollo integral de niñas y niños en alianza con las familias y la comunidad.</p>

  <?php elseif($sub==='mision'): ?>
    <h2 class="hx" style="font-size:22px">Misión</h2>
    <p>Brindar servicios educativos de calidad en el nivel inicial, promoviendo el desarrollo integral de niñas y niños en un entorno seguro, inclusivo y afectivo, en alianza con las familias y la comunidad.</p>

  <?php elseif($sub==='vision'): ?>
    <h2 class="hx" style="font-size:22px">Visión</h2>
    <p>Ser una institución educativa referente en la región por su propuesta pedagógica, su enfoque en valores y su compromiso con el bienestar y aprendizaje significativo de la primera infancia.</p>

  <?php elseif($sub==='valores'): ?>
    <h2 class="hx" style="font-size:22px">Valores</h2>
    <ul style="margin-left:18px">
      <li>Respeto y convivencia democrática.</li>
      <li>Inclusión y equidad.</li>
      <li>Responsabilidad y honestidad.</li>
      <li>Trabajo colaborativo con las familias.</li>
      <li>Cuidado del entorno y seguridad.</li>
    </ul>
  <?php endif; ?>
  <!-- Ubicación / contacto en bloque bicolor (similar al panel de sede en SIR) -->
      <div id="contacto-adm" class="admis-loc" style="margin-top:18px">
<!-- Mapa centrado en Chachapoyas (zoom ciudad) apuntando al pin -->
<iframe
  src="https://www.google.com/maps?q=-6.23196,-77.86938&ll=-6.23196,-77.86938&z=15&output=embed"
  style="border:0;width:100%;height:340px" loading="lazy"
  referrerpolicy="no-referrer-when-downgrade"
  title="Mapa - AA.HH. 16 de Octubre, Chachapoyas"></iframe>

<a class="btn" target="_blank" rel="noopener"
   href="https://www.google.com/maps/dir/?api=1&destination=-6.23196,-77.86938">
  Cómo llegar
</a>
        <aside>
          <h4>Educación Inicial y Primaria</h4>
          <div style="display:grid;gap:8px">
            <div>📍 <strong>Jr. Amazonas</strong> — Chachapoyas</div>
            <div>☎️ <strong>(041) 000000</strong></div>
            <div>🕘 Lun–Vie 8:00–1:00</div>
          </div>
          <div style="margin-top:8px">
            <a class="btn" target="_blank" rel="noopener"
               href="https://wa.me/51999999999?text=Hola%2C%20quisiera%20informaci%C3%B3n%20sobre%20matr%C3%ADculas.">WhatsApp</a>
          </div>
        </aside>
</div></div>
    </div>
  </section>

<?php elseif($page==='matriculas'): ?>
  <?php $nivel = $_GET['nivel'] ?? ''; ?>
  <section class="page alt">
    <div class="wrap">
      <h1 class="hx">
        Matrículas<?= $nivel ? ' — Educación '.ucfirst($nivel) : '' ?>
      </h1>

      <?php if ($nivel===''): ?>
        <!-- SOLO el bloque de opciones (se oculta cuando hay ?nivel=...) -->
        <div class="adm-hero">
          <div class="adm-opts">
            <!-- Opción 1: Educación Inicial -->
            <article class="adm-opt">
              <div class="adm-icon">👨‍👩‍👧‍👦</div>
              <div style="text-align:center">
                <div style="font-weight:700">Educación Inicial</div>
                <div style="opacity:.85">3, 4 y 5 años</div>
              </div>
              <!-- En MISMA pestaña: quita target. En NUEVA pestaña: deja target="_blank" -->
              <a class="btn-pill" href="?p=matriculas&nivel=inicial#proceso-inicial">
                INGRESA AQUÍ <span>➜</span>
              </a>
            </article>

            <!-- Opción 2: Educación Primaria -->
            <article class="adm-opt">
              <div class="adm-icon">📚</div>
              <div style="text-align:center">
                <div style="font-weight:700">Educación Primaria</div>
                <div style="opacity:.85">1.º a 6.º grado</div>
              </div>
              <a class="btn-pill" href="?p=matriculas&nivel=primaria#proceso-primaria">
                INGRESA AQUÍ <span>➜</span>
              </a>
            </article>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($nivel==='inicial'): ?>
        <!-- Botón volver -->
        <p style="margin:10px 0">
          <a class="btn-ghost" href="?p=matriculas">← Volver a Matrículas</a>
        </p>

        <!-- ====== Proceso de Admisión - EDUCACIÓN INICIAL (Institución Pública) ====== -->
        <section id="proceso-inicial" class="page" style="padding-top:12px">
          <div class="wrap">
            <h2 class="hx">Proceso para Educación Inicial</h2>

            <!-- Tabla de edades -->
            <p class="age-note">Para postular a Inicial se consideran las siguientes edades al
              <strong>31 de marzo</strong> del año de ingreso:</p>
            <div class="card"><div class="body">
              <table class="age-table">
                <thead><tr><th>Edad</th><th>Criterio</th></tr></thead>
                <tbody>
                  <tr><td><strong>3 años</strong></td><td>Tres años de edad al 31 de marzo del año de ingreso.</td></tr>
                  <tr><td><strong>4 años</strong></td><td>Cuatro años de edad al 31 de marzo del año de ingreso.</td></tr>
                  <tr><td><strong>5 años</strong></td><td>Cinco años de edad al 31 de marzo del año de ingreso.</td></tr>
                </tbody>
              </table>
            </div>
          </div>

            <!-- Línea de pasos -->
            <div class="timeline">
              <div class="step">
                <div class="badge gold">#1</div>
                <div>
                  <h3>Completar formulario de preinscripción</h3>
                  <p>Registre los datos del postulante y de la familia para iniciar el proceso.</p>
                  <div class="btn-line">
                    <!-- Pon aquí tu PDF/Google Form/página interna -->
                <a class="btn"
                href="?p=matriculas&nivel=inicial&vista=formulario"
                target="_blank" rel="noopener">
                FORMULARIO
              </a>

                    <span style="opacity:.75">o solicítelo en Secretaría</span>
                  </div>
                </div>
              </div>
            <!-- ====== Sección de Formulario (Institución Pública) ====== -->
<section id="formulario" class="page" style="padding-top:18px">
  <div class="wrap">
    <div class="card"><div class="body" style="max-width:760px;margin:auto">
      <h3 class="hx" style="font-size:22px;margin-top:0">Formulario de preinscripción — Educación Inicial</h3>
      <p style="margin-top:-6px;opacity:.9">
        Este formulario es <strong>gratuito</strong> y no garantiza vacante. La IE confirmará su recepción y continuará con los pasos
        del proceso (validación, entrevista y matrícula en SIAGIE).
      </p>

      <!-- OPCIÓN A: Envío sin backend usando formsubmit.co (reemplaza tu correo) -->
      <!-- <form action="https://formsubmit.co/TU-CORREO@dominio.gob.pe" method="POST"> -->

      <!-- OPCIÓN B: Solo demostración local (sin enviar) -->
      <form onsubmit="JMM.enviarPreinscripcion(event)">

        <fieldset style="border:0;padding:0;margin:0 0 14px">
          <legend style="font-weight:700;margin:0 0 6px">Datos del estudiante</legend>
          <label>Apellidos y nombres</label>
          <input class="inp" name="alumno_nombres" required>

          <div style="display:grid;gap:10px;grid-template-columns:1fr 1fr">
            <div>
              <label>DNI</label>
              <input class="inp" name="alumno_dni" required maxlength="8" pattern="\d{8}">
            </div>
            <div>
              <label>Fecha de nacimiento</label>
              <input class="inp" type="date" name="alumno_fnac" required>
            </div>
          </div>

          <div style="display:grid;gap:10px;grid-template-columns:1fr 1fr">
            <div>
              <label>Grado al que postula</label>
              <select class="inp" name="grado" required>
                <option value="">Seleccionar…</option>
                <option>3 años</option>
                <option>4 años</option>
                <option>5 años</option>
              </select>
            </div>
            <div>
              <label>Turno preferente (referencial)</label>
              <select class="inp" name="turno">
                <option>Mañana</option>
                <option>Tarde</option>
                <option>Indistinto</option>
              </select>
            </div>
          </div>

          <label>Dirección</label>
          <input class="inp" name="direccion" required>
        </fieldset>

        <fieldset style="border:0;padding:0;margin:0 0 14px">
          <legend style="font-weight:700;margin:0 0 6px">Padre, madre o apoderado</legend>

          <div style="display:grid;gap:10px;grid-template-columns:1fr 1fr">
            <div>
              <label>Apellidos y nombres</label>
              <input class="inp" name="apo_nombres" required>
            </div>
            <div>
              <label>DNI</label>
              <input class="inp" name="apo_dni" required maxlength="8" pattern="\d{8}">
            </div>
          </div>

          <div style="display:grid;gap:10px;grid-template-columns:1fr 1fr">
            <div>
              <label>Celular</label>
              <input class="inp" name="apo_cel" required>
            </div>
            <div>
              <label>Correo</label>
              <input class="inp" type="email" name="apo_email" required>
            </div>
          </div>
        </fieldset>

        <fieldset style="border:0;padding:0;margin:0 0 14px">
          <legend style="font-weight:700;margin:0 0 6px">Información adicional</legend>

          <div style="display:grid;gap:10px;grid-template-columns:1fr 1fr">
            <div>
              <label>¿Cuenta con SISFOH?</label>
              <select class="inp" name="sisfoh">
                <option>No precisa</option>
                <option>Sí</option>
                <option>No</option>
              </select>
            </div>
            <div>
              <label>¿Atención en Cuna Más u otros?</label>
              <select class="inp" name="cuna">
                <option>No precisa</option>
                <option>Sí</option>
                <option>No</option>
              </select>
            </div>
          </div>

          <label>Observaciones (salud, alergias, discapacidad, etc.)</label>
          <textarea class="inp" rows="3" name="obs"></textarea>
        </fieldset>

        <!-- Si usas formsubmit.co puedes desactivar captcha, redirigir, etc. -->
        <!--
        <input type="hidden" name="_captcha" value="false">
        <input type="hidden" name="_next" value="https://tusitio.edu.pe/?p=matriculas&nivel=inicial#proceso-inicial">
        -->

        <label style="display:flex;gap:8px;align-items:flex-start;margin-top:6px">
          <input type="checkbox" required>
          <span>Acepto el uso de mis datos personales para fines del proceso de matrícula,
          conforme a la normativa de protección de datos personales vigente.</span>
        </label>

        <div class="btn-line" style="margin-top:12px">
          <button class="btn">Enviar solicitud</button>
          <a class="btn-ghost" href="?p=matriculas">Cancelar</a>
        </div>
      </form>
    </div></div>
  </div>
</section>

              <div class="step">
                <div class="badge">#2</div>
                <div>
                  <h3>Entrega de requisitos en Secretaría</h3>
                  <p>Presentación física o digital de documentos obligatorios.</p>
                  <ul>
                    <li>DNI del estudiante y de los padres/apoderado.</li>
                    <li>Copia de carné de vacunación.</li>
                    <li>2 fotos tamaño carné.</li>
                    <li>Ficha única de matrícula (se le brindará en la IE).</li>
                  </ul>
                </div>
              </div>

              <div class="step">
                <div class="badge">#3</div>
                <div>
                  <h3>Validación de datos y registro</h3>
                  <p>La IE confirma información y prepara el expediente de matrícula (SIAGIE).</p>
                </div>
              </div>

              <div class="step">
                <div class="badge alt">#4</div>
                <div>
                  <h3>Entrevista de acogida (familia)</h3>
                  <p>Diálogo breve para conocer al niño(a), su contexto y resolver consultas.</p>
                </div>
              </div>

              <div class="step">
                <div class="badge">#5</div>
                <div>
                  <h3>Resultado</h3>
                  <p>Se notifica la aceptación y se indica la sección o turno propuesto.</p>
                </div>
              </div>

              <div class="step">
                <div class="badge">#6</div>
                <div>
                  <h3>Matrícula oficial</h3>
                  <p>Firma de documentos y registro en el SIAGIE por parte de la IE.</p>
                </div>
              </div>

              <div class="step">
                <div class="badge gold">#7</div>
                <div>
                  <h3>Asignación de vacante</h3>
                  <p>Se confirma la vacante y se comparte la lista de útiles e indicaciones de inicio.</p>
                  <div class="btn-line">
                    <a class="btn-ghost" href="?p=contacto">Consultas</a>
                    <a class="btn-ghost" href="?p=matriculas">Volver a Matrículas</a>
                  </div>
                </div>
              </div>
            </div><!-- /timeline -->
          </div>
        </section>
      <?php endif; ?>
    </div>
  </section>

<?php elseif($page==='convenios'): ?>
  <section class="page">
    <div class="wrap">
      <h1 class="hx">Convenios Estatales y Aliados</h1>
      <div class="grid3">
        <?php foreach($convenios as $c): ?>
          <article class="card" id="<?= $c['slug'] ?>">
            <img src="<?= $c['logo'] ?>" alt="<?= htmlspecialchars($c['titulo']) ?>" class="logo-card">
            <div class="body">
              <strong><?= htmlspecialchars($c['titulo']) ?></strong>
              <p><?= htmlspecialchars($c['desc']) ?></p>
              <a class="btn" href="?p=contacto">Más información</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

<?php elseif($page==='contacto'): ?>
  <section class="page cream">
    <div class="wrap">
      <h1 class="hx">Contáctenos</h1>
      <div class="card"><div class="body" style="max-width:640px">
        <form onsubmit="JMM.enviarContacto(event)">
          <label>Nombre</label><input class="inp" required>
          <label>Correo</label><input class="inp" type="email" required>
          <label>Mensaje</label><textarea class="inp" rows="4" required></textarea>
          <button class="btn">Enviar</button>
        </form>
      </div></div>
    </div>
  </section>
<?php endif; ?>
</main>

<footer>
  <div class="wrap foot">
    <div><strong><?= htmlspecialchars($marca['nombre']) ?></strong> • <?= htmlspecialchars($marca['eslogan']) ?></div>
    <div>RUC 10430536431 · AA.HH. 16 de octubre, Chachapoyas – Perú</div>
    <div class="social"><a href="#">Facebook</a><a href="#">Instagram</a><a href="#">WhatsApp</a></div>
    <div class="copy">© <?= date('Y') ?> <?= htmlspecialchars($marca['nombre']) ?>. Todos los derechos reservados.</div>
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
</body>
</html>
