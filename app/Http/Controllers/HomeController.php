<?php

namespace App\Http\Controllers;

use App\Models\Seccione;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  /**
   * Datos de ejemplo (fallback) — se usan cuando la base de datos no tiene registros.
   * Mantén aquí los nombres que quieres mostrar por defecto (Directivos y docentes).
   */
  protected function sampleDocentes()
  {
    return collect([
      (object)[ // Directivo
        'nombre' => 'Jovita',
        'apellido' => 'Zumaeta Rojas',
        'telefono' => '987654321',
        'seccion' => '',
        'cargo' => 'Directivo',
        'foto_url' => 'recursos/img/foto.webp',
        'email' => 'jovita.zumaeta@iei020.edu.pe'
      ],
      (object)[ // Docentes
        'nombre' => 'Luis Fernando',
        'apellido' => 'Gómez',
        'telefono' => '987654321',
        'seccion' => 'A',
        'cargo' => 'Docente',
        'foto_url' => 'recursos/img/fotom.png',
        'email' => 'luis.gomez@iei020.edu.pe'
      ],
      (object)[
        'nombre' => 'Carla',
        'apellido' => 'Rodríguez',
        'telefono' => '987654321',
        'seccion' => 'A',
        'cargo' => 'Docente',
        'foto_url' => 'recursos/img/foto.webp',
        'email' => 'carla.rodriguez@iei020.edu.pe'
      ],
      (object)[
        'nombre' => 'Carlos',
        'apellido' => 'Perez',
        'telefono' => '987654321',
        'seccion' => 'B',
        'cargo' => 'Docente',
        'foto_url' => 'recursos/img/foto.webp',
        'email' => 'carlos.perez@iei020.edu.pe'
      ],
      (object)[
        'nombre' => 'Pedro',
        'apellido' => 'Lopez',
        'telefono' => '987654321',
        'seccion' => 'B',
        'cargo' => 'Docente',
        'foto_url' => 'recursos/img/foto.webp',
        'email' => 'pedro.lopez@iei020.edu.pe'
      ],
      (object)[
        'nombre' => 'Ana María',
        'apellido' => 'Santos',
        'telefono' => '987222333',
        'seccion' => 'C',
        'cargo' => 'Docente',
        'foto_url' => 'recursos/img/foto.webp',
        'email' => 'ana.santos@iei020.edu.pe'
      ],
      // Auxiliares
      (object)[
        'nombre' => 'Marta',
        'apellido' => 'Pérez',
        'telefono' => '987444555',
        'seccion' => '',
        'cargo' => 'Auxiliar de educación',
        'foto_url' => 'recursos/img/foto.webp',
        'email' => 'marta.perez@iei020.edu.pe'
      ],
      (object)[
        'nombre' => 'Luisa',
        'apellido' => 'Ramos',
        'telefono' => '987666777',
        'seccion' => '',
        'cargo' => 'Auxiliar de educación',
        'foto_url' => 'recursos/img/fotom.png',
        'email' => 'luisa.ramos@iei020.edu.pe'
      ],
      // Administrativos
      (object)[
        'nombre' => 'Rosa',
        'apellido' => 'Lopez',
        'telefono' => '987999000',
        'seccion' => '',
        'cargo' => 'Administrativo',
        'foto_url' => 'recursos/img/foto.webp',
        'email' => 'rosa.lopez@iei020.edu.pe'
      ],
      (object)[
        'nombre' => 'Miguel',
        'apellido' => 'Castillo',
        'telefono' => '987111000',
        'seccion' => '',
        'cargo' => 'Administrativo',
        'foto_url' => 'recursos/img/foto.webp',
        'email' => 'miguel.castillo@iei020.edu.pe'
      ],
    ]);
  }
  public function index()
  {
    $marca = $this->getMarca();

    $slides = [
      ['img' => 'recursos/Aprender.jpg', 'h2' => 'Aprender jugando', 'p' => 'Ambientes seguros y afectivos.', 'cta' => 'Conoce los programas', 'link' => '?p=programas'],
      ['img' => 'recursos/Familia.jpg', 'h2' => 'Familias + Escuela', 'p' => 'Desarrollo integral y acompañamiento.', 'cta' => 'Matrículas abiertas', 'link' => '?p=matriculas'],
      ['img' => 'recursos/Art.jpg', 'h2' => 'Arte y movimiento', 'p' => 'Exploración, creatividad y psicomotricidad.', 'cta' => 'Ver talleres', 'link' => '?p=programas#talleres'],
    ];

    $flyers = [
      ['img' => 'recursos/flyer-inicio.jpg', 't' => 'Inicio de clases', 'link' => '?p=matriculas'],
      ['img' => 'recursos/flyer-verano.jpg', 't' => 'Verano divertido', 'link' => '?p=programas'],
      ['img' => 'recursos/flyer-qaliwarma.jpg', 't' => 'Qaliwarma', 'link' => '?p=qaliwarma'],
      ['img' => 'recursos/flyer-taller.jpg', 't' => 'Talleres creativos', 'link' => '?p=programas#talleres'],
    ];

    $programas = [
      ['icono' => '🎒', 'slug' => 'inicial', 'titulo' => 'Educación Inicial', 'desc' => 'Formación integral para 3, 4 y 5 años.'],
      ['icono' => '⏰', 'slug' => 'temprana', 'titulo' => 'Estimulación Temprana', 'desc' => '0–3 años con enfoque sensorial y motriz.'],
      ['icono' => '🎨', 'slug' => 'talleres', 'titulo' => 'Talleres Creativos', 'desc' => 'Música, arte, cuentacuentos, psicomotricidad.'],
    ];

    $noticias = [
      ['titulo' => 'Fiesta de fin de año', 'fecha' => '2023-12-20', 'descripcion' => 'Celebramos el cierre del año con una gran fiesta llena de alegría y sorpresas para nuestros niños y sus familias.'],
      ['titulo' => 'Taller de padres', 'fecha' => '2023-11-15', 'descripcion' => 'Invitamos a todos los padres a participar en nuestro taller sobre crianza positiva y desarrollo infantil.'],
      ['titulo' => 'Día del niño', 'fecha' => '2023-08-30', 'descripcion' => 'Actividades especiales y juegos para celebrar el Día del Niño con mucha diversión y aprendizaje.'],
    ];

    return view('home', compact('marca', 'slides', 'flyers', 'programas', 'noticias'));
  }

  public function matriculas()
  {
    $marca = $this->getMarca();
    return view('matriculas', compact('marca'));
  }

  public function matriculas_inicial()
  {
    $marca = $this->getMarca();
    $secciones = Seccione::where('nivel', 'Inicial')->get();
    //return $secciones;
    return view('matriculas_inicial', compact('marca', 'secciones'));
  }

  public function getMarca()
  {
    return [
      'nombre'  => 'I.E.I 020',
      'logo'    => 'recursos/logoja.png', // logo en /recursos
      'eslogan' => 'Descubre un mundo de crecimiento y diversión',
    ];
  }

  public function personal()
  {
    $marca = $this->getMarca();

    // Leer datos del equipo institucional desde la base de datos
    $personal = \App\Models\EquipoInstitucional::all()->map(function ($d) {
      $seccion = \App\Models\Seccione::where('seccion', $d->seccion)->first();
      return [
        'id' => $d->id, // Agregar ID para edición
        'nombres' => $d->nombre, // Cambiar 'nombre' a 'nombres'
        'seccion' => $seccion ? $seccion->seccion : 'Sin sección', // Obtener sección real
        'cargo' => $d->cargo,
        'foto' => $d->foto_url ?? 'recursos/placeholder/persona.png',
        'email' => $d->email ?? null,
        'telefono' => $d->telefono ?? 'Sin teléfono',
      ];
    })->toArray();

    // Estadísticas institucionales
    $stats = [
      // clave: etiqueta tal como se muestra en la vista
      'Estudiantes' => 107,
      'Directivos' => \App\Models\EquipoInstitucional::where('cargo', 'Directivo')->count(),
      'Docentes' => \App\Models\EquipoInstitucional::where('cargo', 'Docente')->count(),
      'Auxiliares de educación' => \App\Models\EquipoInstitucional::where('cargo', 'Auxiliar de educación')->count(),
      'Administrativos' => \App\Models\EquipoInstitucional::where('cargo', 'Administrativo')->count(),
    ];

    return view('personal', compact('marca', 'personal', 'stats'));
  }

  public function editarPersonal(Request $request, $id)
  {
    $personal = \App\Models\EquipoInstitucional::find($id);

    if (!$personal) {
      return redirect()->back()->with('error', 'El personal no existe.');
    }

    $data = $request->validate([
      'nombre' => 'required|string|max:255',
      'seccion' => 'nullable|string|max:255',
      'cargo' => 'required|string|max:255',
      'foto_url' => 'nullable|string|max:255',
      'email' => 'nullable|email|max:255',
      'telefono' => 'nullable|string|max:20',
    ]);

    $personal->update($data);

    return redirect()->route('personal')->with('success', 'Datos actualizados correctamente.');
  }

  public function secciones()
  {
    $marca = $this->getMarca();

    // Agrupar las secciones por grado (años)
    $seccionesDB = Seccione::orderBy('grado')->orderBy('seccion')->get()->groupBy('grado');

    $secciones = [];
    foreach ($seccionesDB as $grado => $items) {
      $secciones[] = [
        'grado' => $grado,
        'secciones' => $items->map(function ($s) {
          return [
            'nombre' => $s->seccion,
            'vacantes' => $s->vacantes,
            'docente' => (function () use ($s) {
              // Buscar un docente asignado a la sección
              $t = Seccione::find($s->id)->docente;
              if ($t) return $t->nombre;
              return 'Docente no asignado';
            })(),
          ];
        })->values()->all(),
      ];
    }
    // Eliminado el dd($secciones) para permitir que la vista se renderice normalmente.
    return view('secciones', compact('marca', 'secciones'));
  }
  public function nosotros($tab = null)
  {
    // tu método que ya usas en todas las vistas
    $marca = $this->getMarca();

    // decidir qué sección mostrar
    $section = match ($tab) {
      'mision'  => 'mision',
      'vision'  => 'vision',
      'valores' => 'valores',
      'metas'   => 'metas',
      default   => 'quienes', // cuando es /nosotros
    };

    return view('nosotros', compact('marca', 'section'));
  }
  public function contacto()
  {
    $marca = $this->getMarca(); // ya lo usas en otras vistas
    return view('contacto', compact('marca'));
  }

  /*
// Envío real (opcional):
public function enviarContacto(Request $request) {
    $data = $request->validate([
        'nombre'   => 'required|string|max:120',
        'email'    => 'required|email',
        'telefono' => 'nullable|string|max:30',
        'asunto'   => 'required|string|max:80',
        'mensaje'  => 'required|string|max:2000',
        'empresa'  => 'nullable|string|max:50', // honeypot
    ]);

    // Si honeypot viene con algo, abortar (posible bot)
    if (!empty($data['empresa'])) {
        return back()->with('status','ok');
    }

    // Aquí podrías: Mail::to('iei020@educacion.gob.pe')->send(new ContactoIE($data));
    return back()->with('status', 'Mensaje enviado. ¡Gracias por escribirnos!');
}
*/
  public function programas()
  {
    $marca = $this->getMarca();

    // 14 competencias por áreas (títulos y descripciones breves)
    $competencias = [
      // PERSONAL SOCIAL
      [
        'area' => 'Personal Social',
        'icon' => '🧒🏻',
        'titulo' => 'Construye su identidad',
        'desc' => 'Reconoce quién es, valora su nombre, gustos y cualidades; expresa sus emociones con respeto y va fortaleciendo su autoestima.'
      ],
      [
        'area' => 'Personal Social',
        'icon' => '🤝',
        'titulo' => 'Convive y participa democráticamente',
        'desc' => 'Comparte, respeta turnos y acuerdos del aula, cuida los materiales comunes y aporta al bienestar del grupo.'
      ],
      [
        'area' => 'Personal Social',
        'icon' => '✨',
        'titulo' => 'Vive sus valores y dialoga sobre su experiencia de fe',
        'desc' => 'Expresa con respeto sus creencias y aprende a dialogar con los demás, promoviendo el buen trato y la empatía.'
      ],

      // PSICOMOTRIZ
      [
        'area' => 'Psicomotriz',
        'icon' => '🚶‍♀️',
        'titulo' => 'Se desenvuelve de manera autónoma a través de su motricidad',
        'desc' => 'Coordina movimientos gruesos y finos, explora espacios y objetos, y adopta posturas seguras en el juego.'
      ],

      // COMUNICACIÓN (lengua materna)
      [
        'area' => 'Comunicación',
        'icon' => '🗣️',
        'titulo' => 'Se comunica oralmente en su lengua materna',
        'desc' => 'Comprende y expresa ideas en conversaciones cotidianas, narra experiencias y escucha a los demás.'
      ],
      [
        'area' => 'Comunicación',
        'icon' => '📖',
        'titulo' => 'Lee diversos tipos de texto en su lengua materna',
        'desc' => 'Explora cuentos, rimas y textos del entorno; reconoce portadas, imágenes y secuencias con ayuda.'
      ],
      [
        'area' => 'Comunicación',
        'icon' => '✍️',
        'titulo' => 'Escribe diversos tipos de texto en su lengua materna',
        'desc' => 'Dibuja y grafica para comunicar ideas; avanza del garabateo a trazos convencionales con intención comunicativa.'
      ],
      [
        'area' => 'Comunicación - Arte',
        'icon' => '🎨',
        'titulo' => 'Crea proyectos desde los lenguajes del arte',
        'desc' => 'Explora música, plástica y expresión corporal para representar emociones, historias y el entorno.'
      ],

      // CASTELLANO COMO SEGUNDA LENGUA
      [
        'area' => 'Castellano L2',
        'icon' => '💬',
        'titulo' => 'Se comunica oralmente en castellano como segunda lengua',
        'desc' => 'Comprende y usa expresiones cotidianas en castellano, ampliando vocabulario en situaciones reales.'
      ],

      // MATEMÁTICA
      [
        'area' => 'Matemática',
        'icon' => '🔢',
        'titulo' => 'Resuelve problemas de cantidad',
        'desc' => 'Cuenta colecciones, compara y agrupa objetos; usa números en situaciones de juego y vida diaria.'
      ],
      [
        'area' => 'Matemática',
        'icon' => '🧩',
        'titulo' => 'Resuelve problemas de forma, movimiento y localización',
        'desc' => 'Reconoce formas, posiciones y trayectorias; arma rompecabezas y sigue rutas sencillas.'
      ],

      // CIENCIA Y TECNOLOGÍA
      [
        'area' => 'Ciencia y Tecnología',
        'icon' => '🔬',
        'titulo' => 'Indaga mediante métodos científicos',
        'desc' => 'Observa, formula preguntas, experimenta con materiales y comunica lo que descubre con apoyo del adulto.'
      ],

      // TRANSVERSALES
      [
        'area' => 'Transversal',
        'icon' => '💻',
        'titulo' => 'Se desenvuelve en entornos virtuales generados por las TIC',
        'desc' => 'Interactúa con recursos digitales sencillos para explorar, crear y reforzar aprendizajes con acompañamiento.'
      ],
      [
        'area' => 'Transversal',
        'icon' => '🌱',
        'titulo' => 'Gestiona su aprendizaje de manera autónoma',
        'desc' => 'Planifica acciones simples, persevera ante retos y evalúa con apoyo lo que logró y lo que puede mejorar.'
      ],
    ];

    return view('programas', compact('marca', 'competencias'));
  }
}
