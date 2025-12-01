<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SeccionesController extends Controller
{
    public function index()
    {
        $secciones = collect([
            ['nivel' => 'Inicial', 'grado' => '3 años', 'seccion' => 'Amorosos', 'vacantes' => 20],
            ['nivel' => 'Inicial', 'grado' => '3 años', 'seccion' => 'Divertidos', 'vacantes' => 20],
            ['nivel' => 'Inicial', 'grado' => '4 años', 'seccion' => 'Creativos', 'vacantes' => 20],
            ['nivel' => 'Inicial', 'grado' => '5 años', 'seccion' => 'Solidarios', 'vacantes' => 20],
            ['nivel' => 'Inicial', 'grado' => '5 años', 'seccion' => 'Cariñosos', 'vacantes' => 20],
        ]);

        dd($secciones);

        return view('secciones', compact('secciones'));
    }

    public function create()
    {
        // Obtener la lista de docentes desde la tabla equipo_institucional filtrando por cargo
        $docentes = \App\Models\EquipoInstitucional::where('cargo', 'Docente')->get();

        // Retornar la vista con los docentes
        return view('dashboard.secciones.create', compact('docentes'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'grado' => 'required|string',
            'seccion' => 'required|string',
            'vacantes' => 'required|integer|min:0',
            'docente' => 'required|exists:equipo_institucional,id',
        ]);

        // Crear la nueva sección
        \App\Models\Seccione::create([
            'grado' => $validatedData['grado'],
            'seccion' => $validatedData['seccion'],
            'vacantes' => $validatedData['vacantes'],
            'docente_id' => $validatedData['docente'],
        ]);

        // Redirigir al índice de secciones con un mensaje de éxito
        return redirect()->route('dashboard.secciones.index')->with('success', 'Sección creada exitosamente.');
    }

    public function equipoInstitucional()
    {
        // Consultar todos los datos del equipo institucional
        $equipo = \App\Models\EquipoInstitucional::all();

        // Retornar la vista con los datos del equipo
        return view('dashboard.equipo_institucional.index', compact('equipo'));
    }
}