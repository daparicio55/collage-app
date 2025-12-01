@extends('layouts.dashboard.main')
@section('main')
    <h1 class="mt-2">Editar Actividad</h1>
    <a href="{{ route('dashboard.actividades.index') }}" class="btn btn-secondary mb-3">Volver al Listado</a>

    <form action="{{ route('dashboard.actividades.update',$actividade->id) }}" method="POST">
        @csrf
        @method('put')
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" class="form-control mb-3" value="{{ $actividade->fecha }}">
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" class="form-control mb-3">{{ $actividade->descripcion }}</textarea>
        <button type="submit" class="btn btn-primary">Actualizar Actividad</button>
    </form>

@endsection