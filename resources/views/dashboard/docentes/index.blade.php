@extends('layouts.dashboard.main')

@section('main')
<div class="container py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Equipo Institucional</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipo as $miembro)
                        <tr>
                            <td>{{ $miembro->nombre }}</td>
                            <td>{{ $miembro->cargo }}</td>
                            <td>{{ $miembro->email }}</td>
                            <td>{{ $miembro->telefono ?? 'No disponible' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection