<?php

namespace App\Http\Controllers;

use App\Models\Seccione;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
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

        return view('home', compact('marca', 'slides', 'flyers', 'programas'));
    }

    public function matriculas(){
        $marca = $this->getMarca();
        return view('matriculas',compact('marca'));
    }

    public function matriculas_inicial(){
      $marca = $this->getMarca();
      $secciones = Seccione::where('nivel','Inicial')->get();
      //return $secciones;
      return view('matriculas_inicial',compact('marca','secciones'));
    }

    public function getMarca(){
        return [
            'nombre'  => 'I.E.I 020',
            'logo'    => 'recursos/logoja.png', // logo en /recursos
            'eslogan' => 'Descubre un mundo de crecimiento y diversión',
          ];
    }

    public function personal()
{
    // 1. traes la marca
    $marca = $this->getMarca();

    // 2. tu data de personal
    $personal = [
        // DIRECTIVOS
        [
            'nombres'  => 'Jovita Zumaeta Rojas',
            'telefono' => '987654321',
            'seccion'  => 'Dirección',
            'cargo'    => 'Directivo',
            'foto'     => 'recursos/img/fotom.png',
        ],
        // DOCENTES
        [
            'nombres'  => 'Luis Fernando Gómez',
            'telefono' => '987654321',
            'seccion'  => '3 años',
            'cargo'    => 'Docente',
            'foto'     => 'recursos/img/foto.webp',
        ],
        [
            'nombres'  => 'Carla Rodríguez',
            'telefono' => '987654321',
            'seccion'  => '3 años',
            'cargo'    => 'Docente',
            'foto'     => 'recursos/img/fotom.png',
        ],
         [
            'nombres'  => 'Carlos Perez',
            'telefono' => '987654321',
            'seccion'  => '4 años',
            'cargo'    => 'Docente',
            'foto'     => 'recursos/img/foto.webp',
        ],
         [
            'nombres'  => 'Pedro Lopez',
            'telefono' => '987654321',
            'seccion'  => '5 años',
            'cargo'    => 'Docente',
            'foto'     => 'recursos/img/foto.webp',
        ],
         [
            'nombres'  => 'Neli Alvarado',
            'telefono' => '987654321',
            'seccion'  => '5 años',
            'cargo'    => 'Docente',
            'foto'     => 'recursos/img/fotom.png',
        ],
        // AUXILIARES
        [
            'nombres'  => 'María Luisa Fernández',
            'telefono' => '987654321',
            'seccion'  => 'Aula de 3 años',
            'cargo'    => 'Auxiliar de educación',
            'foto'     => 'recursos/img/fotom.png',
        ],
        [
            'nombres'  => 'Juanita Livia',
            'telefono' => '987654321',
            'seccion'  => 'Aula de 4 años',
            'cargo'    => 'Auxiliar de educación',
            'foto'     => 'recursos/img/fotom.png',
        ],
        // ADMINISTRATIVOS
        [
            'nombres'  => 'Pedro Sánchez',
            'telefono' => '987654321',
            'seccion'  => 'Secretaría',
            'cargo'    => 'Administrativo',
            'foto'     => 'recursos/img/foto.webp',
        ],
        [
            'nombres'  => 'Rosa Gálvez',
            'telefono' => '987654321',
            'seccion'  => 'Tesorería',
            'cargo'    => 'Administrativo',
            'foto'     => 'recursos/img/fotom.png',
        ],
    ];

    // 3. envías las dos variables
    return view('personal', compact('marca', 'personal'));
}

    public function secciones(){
      $marca = $this->getMarca();
      //Menú secciones donde se muestre por ejemplo 3 años: 2 secciones(1ra S-Geniales, 2da //S-Amorosos) 4 años: 2 secciones(Bondadosos, Creativos) 5años: 2seeciones(Solidarios, responsables)
      $secciones = [
        [
          'nivel' => '3 años',
          'secciones' => [
            ['nombre' => 'S-Amorosos', 'descripcion' => 'Sección de niños geniales y curiosos.','cupos'=>20,'docente'=>'Ana María Pérez'],
            ['nombre' => 'S-Divertidos', 'descripcion' => 'Sección de niños amorosos y afectivos.','cupos'=>20,'docente'=>'Carlos Ramírez']
          ]
        ],
        [
          'nivel' => '4 años',
          'secciones' => [
            ['nombre' => 'S-Creativos', 'descripcion' => 'Sección de niños bondadosos y solidarios.','cupos'=>21,'docente'=>'Luis Fernando Gómez'],
          ]
        ],
        [
          'nivel' => '5 años',
          'secciones' => [
            ['nombre' => 'S-Solidarios', 'descripcion' => 'Sección de niños solidarios y empáticos.','cupos'=>22,'docente'=>'Carla Rodríguez'],
            ['nombre' => 'S-Cariñosos', 'descripcion' => 'Sección de niños responsables y autónomos.','cupos'=>26,'docente'=>'María Luisa Fernández']
          ]
        ]
      ];
      return view('secciones',compact('marca','secciones'));
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

}
