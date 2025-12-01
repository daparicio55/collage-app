<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::all();
        return view('dashboard.noticias.index', compact('noticias'));
        // Lógica para mostrar una lista de noticias
    }

    public function create()
    {
        return view('dashboard.noticias.create');
        // Lógica para mostrar el formulario de creación de noticias
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'fecha' => 'required|date',
            'descripcion' => 'required',
            'url_imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            // Crear una nueva noticia
            $noticia = new Noticia();
            $noticia->titulo = $validated['titulo'];
            $noticia->fecha = $validated['fecha'];
            $noticia->descripcion = $validated['descripcion'];

            // Manejar la subida de la imagen si existe
            if ($request->hasFile('url_imagen')) {
                $imagen = $request->file('url_imagen');
                $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
                // Guardar la imagen en la carpeta storage/app/public/noticias
                $rutaImagen = $imagen->storeAs('public/noticias', $nombreImagen);
                $noticia->url_imagen = 'storage/noticias/' . $nombreImagen;
            }

            $noticia->save();

            return redirect()->route('dashboard.noticias.index')
                           ->with('success', 'Noticia creada exitosamente');

        } catch (\Exception $e) {
            return back()->withInput()
                        ->withErrors(['error' => 'Error al crear la noticia: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('dashboard.noticias.edit', compact('noticia'));
        // Lógica para mostrar el formulario de edición de noticias
    }

    public function destroy($id){
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return redirect()->route('dashboard.noticias.index')
                         ->with('success', 'Noticia eliminada exitosamente');
    }
}
