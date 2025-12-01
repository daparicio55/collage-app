@extends('layouts.main')

@section('content')
<section class="hero">
  <div class="wrap hero-grid">

    <aside class="flyer-box" id="cronograma-box">
      <div class="flyer-head" style="display:flex;justify-content:space-between;align-items:center">
        <h3 style="margin:0">Cronograma</h3>
        <div class="cal-nav" style="display:flex;gap:6px">
          <button type="button" class="btn-ghost" id="calPrev">‹</button>
          <button type="button" class="btn-ghost" id="calNext">›</button>
        </div>
      </div>

      <div id="calSlider" class="cal-slider">
        @php
          use Illuminate\Support\Carbon;
          $base = Carbon::now()->startOfMonth();
          $diasSemana = ['L','M','M','J','V','S','D'];
          for ($m = 0; $m < 12; $m++) {
            $mes = (clone $base)->addMonths($m);
            $inicioDow = $mes->dayOfWeekIso;    // 1..7
            $diasMes   = $mes->daysInMonth;
        @endphp

        <div class="cal-month" data-ym="{{ $mes->format('Y-m') }}">
          <div class="cal-title">{{ $mes->translatedFormat('F Y') }}</div>
          <div class="cal-grid">
            @foreach ($diasSemana as $d)
              <div class="cal-dow">{{ $d }}</div>
            @endforeach

            @for ($i = 1; $i < $inicioDow; $i++)
              <div class="cal-cell cal-empty"></div>
            @endfor

            @for ($d = 1; $d <= $diasMes; $d++)
              @php $fecha = $mes->format('Y-m-') . str_pad($d, 2, '0', STR_PAD_LEFT); @endphp
              <div class="cal-cell" data-date="{{ $fecha }}"><span>{{ $d }}</span></div>
            @endfor
          </div>
        </div>

        @php } @endphp
      </div>
    </aside>
    <section class="slider" aria-roledescription="carrusel">
        <?php foreach($slides as $k=>$s): ?>
          <article class="slide" data-slide="<?= $k ?>" style="display:<?= $k===0?'block':'none' ?>;background-image:url('<?= $s['img'] ?>')">
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

@include('noticias')


<div id="calModal" aria-modal="true" role="dialog">
  <div class="modal-box">
    <div class="modal-head">
      <strong id="calModalTitle">Actividades</strong>
      <button class="close" type="button" id="calModalClose">Cerrar</button>
    </div>
    <div class="modal-body" id="calModalBody">
      <!-- aquí se cargan las actividades del día -->
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
(function(win,doc){
  const slider  = doc.querySelector('#calSlider');
  const months  = Array.from(slider.querySelectorAll('.cal-month'));

  // Marcar "hoy"
  const hoy = new Date();
  const hoyStr = hoy.toISOString().slice(0,10); // YYYY-mm-dd

  slider.querySelectorAll('.cal-cell[data-date]').forEach(c=>{
    if (c.dataset.date === hoyStr) c.classList.add('is-today');
  });

  // 1) Pintar fechas con actividad
  const anio = (new Date()).getFullYear();
  fetch(`/api/actividades/fechas?anio=${anio}`)
    .then(r=>r.ok?r.json():[])
    .then(fechas=>{
      const set = new Set(fechas || []);
      slider.querySelectorAll('.cal-cell[data-date]').forEach(c=>{
        if(set.has(c.dataset.date)){ c.classList.add('has-activity'); }
      });
    })
    .catch(()=>{});

  // 2) Abrir modal con las actividades del día al hacer clic
  const modal      = doc.querySelector('#calModal');
  const modalTitle = doc.querySelector('#calModalTitle');
  const modalBody  = doc.querySelector('#calModalBody');
  const modalClose = doc.querySelector('#calModalClose');

  function abrirModal(fechaISO){
    modalTitle.textContent = 'Actividades — ' + fechaISO;
    modalBody.innerHTML = '<p style="opacity:.7">Cargando…</p>';

    fetch(`/api/actividades/dia?fecha=${encodeURIComponent(fechaISO)}`)
      .then(r=>r.ok?r.json():[])
      .then(items=>{
        if(!items || !items.length){
          modalBody.innerHTML = '<p style="opacity:.8">No hay actividades programadas para esta fecha.</p>';
          return;
        }
        const ul = doc.createElement('ul');
        ul.style.margin = '0 0 0 18px';
        items.forEach(it=>{
          const li = doc.createElement('li');
          li.textContent = it.descripcion || '(Sin descripción)';
          ul.appendChild(li);
        });
        modalBody.innerHTML = '';
        modalBody.appendChild(ul);
      })
      .catch(()=>{
        modalBody.innerHTML = '<p style="color:#b00020">Ocurrió un error al cargar.</p>';
      });

    modal.style.display = 'block';
  }

  slider.addEventListener('click', (ev)=>{
    const cell = ev.target.closest('.cal-cell[data-date]');
    if(!cell) return;
    const fecha = cell.dataset.date; // YYYY-mm-dd
    abrirModal(fecha);
  });

  modalClose.addEventListener('click', ()=> modal.style.display = 'none');
  modal.addEventListener('click', (e)=>{ if(e.target === modal) modal.style.display='none'; });

  // 3) Navegación del calendario (ya la tienes)
  const btnPrev = doc.querySelector('#calPrev');
  const btnNext = doc.querySelector('#calNext');
  let idx = 0;
  function show(i){
    idx = (i+months.length)%months.length;
    months.forEach((m,k)=> m.classList.toggle('active', k===idx));
  }
  show(0);
  btnPrev?.addEventListener('click', ()=> show(idx-1));
  btnNext?.addEventListener('click', ()=> show(idx+1));
})(window,document);
</script>
@endpush