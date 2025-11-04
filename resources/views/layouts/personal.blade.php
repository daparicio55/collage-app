{{-- resources/views/docentes/index.blade.php --}}
@extends('layouts.app') {{-- o el layout que uses --}}

@section('title','Personal')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-8">
  <header class="mb-6">
    <h1 class="text-3xl font-bold text-emerald-900">Personal</h1>
    <p class="text-slate-600">Nivel Inicial — 3, 4 y 5 años (Secciones A y B)</p>
  </header>

  {{-- Filtros --}}
  <form method="GET" class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-3">
    <input name="q" value="{{ $q }}" placeholder="Buscar por nombre o especialidad"
           class="w-full rounded-xl border border-slate-300 px-3 py-2 focus:ring-2 focus:ring-emerald-400" />
    <select name="grado" class="rounded-xl border border-slate-300 px-3 py-2">
      <option value="">Grado (todos)</option>
      @foreach (['3'=>'3 años','4'=>'4 años','5'=>'5 años'] as $k=>$v)
        <option value="{{ $k }}" @selected($grado==$k)>{{ $v }}</option>
      @endforeach
    </select>
    <select name="seccion" class="rounded-xl border border-slate-300 px-3 py-2">
      <option value="">Sección (todas)</option>
      @foreach (['A','B'] as $s)
        <option value="{{ $s }}" @selected($seccion==$s)>{{ $s }}</option>
      @endforeach
    </select>
    <button class="rounded-xl bg-emerald-600 text-white font-semibold px-4 py-2 hover:bg-emerald-700">
      Filtrar
    </button>
  </form>

  {{-- Grid --}}
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($docentes as $d)
      <article class="rounded-2xl border border-slate-200 shadow-sm overflow-hidden bg-white hover:shadow-md transition">
        <div class="relative h-40 bg-gradient-to-r from-emerald-50 to-emerald-100">
          <img src="{{ $d->avatar_url }}" alt="Foto de {{ $d->nombres }}"
               class="absolute -bottom-10 left-6 w-24 h-24 rounded-full ring-4 ring-white object-cover">
        </div>

        <div class="pt-14 px-6 pb-5">
          <h3 class="text-xl font-bold text-slate-900">{{ $d->nombres }}</h3>
          <div class="mt-1 text-emerald-700 font-semibold">{{ $d->etiqueta_grado }}</div>
          <div class="text-slate-600">{{ $d->cargo }} @if($d->especialidad) • {{ $d->especialidad }} @endif</div>
          <div class="mt-3 text-sm text-slate-600">
            Turno: <span class="font-medium text-slate-800">{{ $d->turno }}</span>
          </div>
          @if($d->bio)
            <p class="mt-3 text-slate-700">{{ $d->bio }}</p>
          @endif

          <div class="mt-4 flex flex-wrap gap-2">
            @if($d->email)
              <a href="mailto:{{ $d->email }}" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-sm">Correo</a>
            @endif
            @if($d->telefono)
              <a href="tel:{{ $d->telefono }}" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-sm">Llamar</a>
            @endif
            @if($d->whatsapp)
              <a target="_blank" rel="noopener"
                 href="https://wa.me/{{ $d->whatsapp }}?text=Hola%20prof.%20{{ urlencode($d->nombres) }}%2C%20tengo%20una%20consulta."
                 class="px-3 py-1 rounded-lg bg-emerald-600 text-white text-sm hover:bg-emerald-700">WhatsApp</a>
            @endif
          </div>
        </div>
      </article>
    @empty
      <div class="col-span-full p-10 text-center border border-dashed rounded-2xl text-slate-500">
        No hay docentes registrados todavía.
      </div>
    @endforelse
  </div>
</section>
@endsection
