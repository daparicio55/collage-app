<?php
namespace App\Http\Controllers;
use App\Models\Seccione;
use Illuminate\Http\Request;
class SeccionesController extends Controller

{
    public function index()

    {
        $secciones = [
  [
    'nivel' => '3 años',
    'secciones' => [
      ['nombre' => 'Amorosos', 'vacantes' => 12],
      ['nombre' => 'Arcoíris',  'vacantes' => 5],
    ],
  ],
  [
    'nivel' => '4 años',
    'secciones' => [
      ['nombre' => 'Ositos', 'vacantes' => 8],
      ['nombre' => 'Estrellitas', 'vacantes' => 2],
    ],
  ],
  [
    'nivel' => '5 años',
    'secciones' => [
      ['nombre' => 'Mariposas', 'vacantes' => 15],
    ],
  ],
];
        return view('secciones', compact('secciones')); 
    }
}