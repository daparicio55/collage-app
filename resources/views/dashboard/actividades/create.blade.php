@extends('layouts.dashboard.main')
@section('main')
    <h1 class="mt-2">Crear Nueva Actividad</h1>
    <a href="{{ route('dashboard.actividades.index') }}" class="btn btn-secondary mb-3">Volver al Listado</a>

    <form action="{{ route('dashboard.actividades.store') }}" method="POST">
        @csrf
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" class="form-control mb-3">
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" class="form-control mb-3"></textarea>
        <button type="submit" class="btn btn-primary">Guardar Actividad</button>
    </form>

@endsection