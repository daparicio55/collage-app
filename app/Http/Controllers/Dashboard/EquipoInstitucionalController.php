<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\EquipoInstitucional;
use Illuminate\Http\Request;

class EquipoInstitucionalController extends Controller
{
    public function index()
    {
        $equipo = EquipoInstitucional::all();
        return view('dashboard.docentes.index', compact('equipo'));
    }

    public function create()
    {
        return view('dashboard.docentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('imagen') ? $request->file('imagen')->store('public/perfiles') : null;

        EquipoInstitucional::create([
            'nombre' => $request->nombre,
            'cargo' => $request->cargo,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'imagen_url' => $path ? str_replace('public/', 'storage/', $path) : null,
        ]);

        return redirect()->route('dashboard.docentes.index')->with('success', 'Miembro agregado correctamente.');
    }

    public function edit($id)
    {
        $miembro = EquipoInstitucional::findOrFail($id);
        return view('dashboard.docentes.edit', compact('miembro'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $miembro = EquipoInstitucional::findOrFail($id);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/perfiles');
            $miembro->imagen_url = str_replace('public/', 'storage/', $path);
        }

        $miembro->update([
            'nombre' => $request->nombre,
            'cargo' => $request->cargo,
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('docentes.index')->with('success', 'Miembro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $miembro = EquipoInstitucional::findOrFail($id);
        $miembro->delete();

        return redirect()->route('docentes.index')->with('success', 'Miembro eliminado correctamente.');
    }
}
