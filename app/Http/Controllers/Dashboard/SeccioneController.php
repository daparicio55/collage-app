<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\EquipoInstitucional;
use App\Models\Seccione;
use Illuminate\Http\Request;

class SeccioneController extends Controller
{
    public function index()
    {
        $secciones = Seccione::orderBy('grado')->paginate(15);
        return view('dashboard.secciones.index', compact('secciones'));
    }

    public function create()
    {
        $docentes = EquipoInstitucional::select('id', 'nombre')
            ->whereIn('cargo', ['Docente', 'Directivo'])
            ->get();
        return view('dashboard.secciones.create', compact('docentes'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            //'nivel' => 'required|string|max:50',
            'grado' => 'required|string|max:50',
            'seccion' => 'required|string|max:50',
            'vacantes' => 'required|integer|min:0',
            'docente_id' => 'required|exists:equipo_institucional,id',
        ]);

        Seccione::create($validated);

        return redirect()->route('dashboard.secciones.index')->with('success', 'Sección creada correctamente.');
    }

    public function edit(Seccione $seccione)
    {
        $docentes = EquipoInstitucional::select('id', 'nombre')
            ->whereIn('cargo', ['Docente', 'Directivo'])
            ->get();
        return view('dashboard.secciones.edit', compact('seccione', 'docentes'));
    }

    public function update(Request $request, Seccione $seccione)
    {
        $validated = $request->validate([
            'grado' => 'required|string|max:50',
            'seccion' => 'required|string|max:50',
            'vacantes' => 'required|integer|min:0',
            'docente_id' => 'required|exists:equipo_institucional,id',
        ]);

        $seccione->update($validated);

        return redirect()->route('dashboard.secciones.index')->with('success', 'Sección actualizada.');
    }

    public function destroy(Seccione $seccione)
    {
        $seccione->delete();
        return back()->with('success', 'Sección eliminada.');
    }
}
