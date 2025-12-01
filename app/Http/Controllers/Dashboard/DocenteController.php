<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        // Consultar los docentes desde la tabla equipo_institucional
        $docentes = \App\Models\EquipoInstitucional::where('cargo', 'Docente')->orderBy('nombre')->paginate(15);

        // Retornar la vista con los docentes
        return view('dashboard.docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('dashboard.docentes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'cargo' => 'nullable|string|max:80',
            'seccion' => 'nullable|string|max:120',
            'especialidad' => 'nullable|string|max:120',
            'email' => 'required|email|unique:docentes,email',
            'telefono' => 'nullable|string|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $docente = new Docente($validated);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $name = time().'_'.preg_replace('/[^a-zA-Z0-9._-]/','', $file->getClientOriginalName());
            $file->storeAs('public/docentes', $name);
            $docente->foto_url = 'storage/docentes/'.$name;
        }

        $docente->save();

        return redirect()->route('dashboard.docentes.index')->with('success', 'Docente creado correctamente.');
    }

    public function edit(Docente $docente)
    {
        return view('dashboard.docentes.edit', compact('docente'));
    }

    public function update(Request $request, Docente $docente)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'cargo' => 'nullable|string|max:80',
            'seccion' => 'nullable|string|max:120',
            'especialidad' => 'nullable|string|max:120',
            'email' => 'required|email|unique:docentes,email,'.$docente->id,
            'telefono' => 'nullable|string|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $docente->fill($validated);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $name = time().'_'.preg_replace('/[^a-zA-Z0-9._-]/','', $file->getClientOriginalName());
            $file->storeAs('public/docentes', $name);
            $docente->foto_url = 'storage/docentes/'.$name;
        }

        $docente->save();

        return redirect()->route('dashboard.docentes.index')->with('success', 'Docente actualizado.');
    }

    public function destroy(Docente $docente)
    {
        // Optionally: delete image file from storage
        $docente->delete();
        return back()->with('success', 'Docente eliminado.');
    }
}
