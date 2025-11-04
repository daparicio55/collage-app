<?php

namespace App\Http\Controllers;

use App\Models\Actividade; // o Activity si así se llama tu modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CronogramaController extends Controller
{
    // Devuelve fechas con actividad en el año: ["2025-10-03","2025-12-25",...]
    public function fechasPorAnio(Request $request)
    {
        $anio = (int)($request->query('anio') ?: now()->year);

        // formateamos YYYY-mm-dd desde tu campo 'fecha'
        $fechas = Actividade::query()
            ->whereYear('fecha', $anio)
            ->select(DB::raw("DATE_FORMAT(fecha,'%Y-%m-%d') as f"))
            ->pluck('f')
            ->unique()
            ->values();

        return response()->json($fechas);
    }

    // Devuelve actividades de un día: [{id, fecha, descripcion}, ...]
    public function actividadesPorDia(Request $request)
    {
        $fecha = $request->query('fecha'); // esperado "YYYY-mm-dd"
        abort_if(!$fecha, 400, 'Falta parámetro fecha');

        $acts = Actividade::query()
            ->whereDate('fecha', $fecha)
            ->orderBy('fecha')
            ->get(['id','fecha','descripcion']);

        return response()->json($acts);
    }
}
