@extends('layouts.main') {{-- usa tu layout --}}

@section('content')
<section class="page">
  <div class="wrap" style="max-width:1100px">
    <h1 class="hx">Cronograma {{ $year }}</h1>

    <div class="cal-toolbar">
      <button class="btn-ghost" id="prevYear">← {{ $year-1 }}</button>
      <div class="year-label" id="yearLabel">{{ $year }}</div>
      <button class="btn-ghost" id="nextYear">{{ $year+1 }} →</button>
      <button class="btn" id="refreshBtn" title="Actualizar">Actualizar</button>
    </div>

    <div id="calendario" class="cal-year"></div>

    <aside class="cal-aside">
      <h3 class="hx" style="font-size:20px;margin-top:0">Actividades del día</h3>
      <div id="listaDia" class="acts"></div>
    </aside>
  </div>
</section>
@endsection

@push('styles')
<style>
.cal-toolbar{display:flex;align-items:center;gap:10px;margin:10px 0 16px}
.year-label{font-weight:800;font-size:22px;letter-spacing:.5px}

.cal-year{
  display:grid;grid-template-columns:repeat(3,1fr);gap:16px;
}
@media(max-width:950px){.cal-year{grid-template-columns:1fr}}
.cal-month{
  border:1px solid #e6eaed;border-radius:12px;background:#fff;overflow:hidden
}
.cal-head{display:flex;justify-content:space-between;align-items:center;padding:10px 12px;background:#f6f8fa;font-weight:700}
.cal-grid{
  display:grid;grid-template-columns:repeat(7,1fr);gap:4px;padding:10px
}
.cal-wd{font-size:12px;opacity:.7;text-align:center}
.cal-day{
  aspect-ratio: 1/1; display:grid; place-items:center;
  border-radius:10px; position:relative; font-weight:600;
  cursor:default; user-select:none;
}
.cal-day.muted{opacity:.35}
.cal-day.today{outline:2px solid var(--azul,#65a1c2)}
.cal-day.has-act::after{
  content:""; position:absolute; inset:-4px;
  border:3px solid var(--verde,#2e6b52); border-radius:12px;
  pointer-events:none;
}
.cal-day.clickable{cursor:pointer}
.cal-aside{margin-top:18px}
.acts{display:grid;gap:8px}
.act-item{border:1px solid #e6eaed;border-radius:10px;padding:10px;background:#fff}
</style>
@endpush

@push('scripts')
<script>
(function(win,doc){
  const elCal   = doc.getElementById('calendario');      // contenedor del mes
  const elYear  = doc.getElementById('yearLabel');       // <span id="yearLabel">2025</span>
  const btnPrev = doc.getElementById('prevYear');
  const btnNext = doc.getElementById('nextYear');
  const btnRef  = doc.getElementById('refreshBtn');      // opcional
  let year = parseInt(elYear?.textContent || new Date().getFullYear(), 10);

  // cache en memoria por año (opcional)
  const cache = {};

  function marcarFechas(lista){
    // limpia marcas previas
    elCal.querySelectorAll('.cal-cell.has-activity').forEach(c=>c.classList.remove('has-activity'));
    // marca nuevas
    const set = new Set(lista || []);
    elCal.querySelectorAll('.cal-cell[data-date]').forEach(c=>{
      if (set.has(c.dataset.date)) c.classList.add('has-activity');
    });
  }

  function cargarFechas(anio, force=false){
    if (!force && cache[anio]) { marcarFechas(cache[anio]); return; }
    // “t=Date.now()” evita cache duro del navegador/proxy
    fetch(`/api/actividades/fechas?anio=${anio}&t=${Date.now()}`, {
      headers: { 'Cache-Control': 'no-cache' }
    })
      .then(r => r.ok ? r.json() : [])
      .then(data => { cache[anio] = data || []; marcarFechas(cache[anio]); })
      .catch(()=>{/* silencioso */});
  }

  // Al iniciar
  cargarFechas(year);

  // Cambios de año
  btnPrev?.addEventListener('click', ()=>{ year--; elYear.textContent = year; cargarFechas(year); });
  btnNext?.addEventListener('click', ()=>{ year++; elYear.textContent = year; cargarFechas(year); });
  btnRef ?.addEventListener('click', ()=> cargarFechas(year, true));

  // Cuando vuelves a la pestaña, vuelve a pedir (por si registraste algo en otra vista)
  win.addEventListener('focus', ()=> cargarFechas(year, true));

  // Modal al hacer clic en un día
  const modal = doc.getElementById('calModal');
  const modalBody = doc.getElementById('calModalBody');
  elCal.addEventListener('click', (e)=>{
    const cell = e.target.closest('.cal-cell[data-date]');
    if(!cell) return;
    const fecha = cell.dataset.date;
    fetch(`/api/actividades/dia?fecha=${fecha}&t=${Date.now()}`, { headers:{'Cache-Control':'no-cache'} })
      .then(r=>r.ok?r.json():[])
      .then(lista=>{
        modalBody.innerHTML = lista?.length
          ? `<h4>${fecha}</h4>` + lista.map(a=>`<div class="act-item">• ${a.descripcion}</div>`).join('')
          : `<p>Sin actividades para ${fecha}.</p>`;
        modal?.classList.add('open');
      });
  });
  doc.getElementById('calModalClose')?.addEventListener('click', ()=> modal?.classList.remove('open'));
})(window,document);
</script>
@endpush