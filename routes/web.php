<?php

use Illuminate\Support\Facades\Route;

// Public controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ActividadeController;
use App\Http\Controllers\CronogramaController;

// Dashboard controllers
use App\Http\Controllers\Dashboard\SeccioneController;
use App\Http\Controllers\Dashboard\EquipoInstitucionalController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/matriculas', [HomeController::class, 'matriculas'])->name('home.matriculas');
Route::get('/matriculas/inicial', [HomeController::class, 'matriculas_inicial'])->name('home.matriculas.inicial');

Route::get('/secciones', [HomeController::class, 'secciones'])->name('secciones.index');
Route::get('/personal',  [HomeController::class, 'personal'])->name('personal.index');

Route::get('/nosotros',      [HomeController::class, 'nosotros'])->name('nosotros.index');
Route::get('/nosotros/{tab}',[HomeController::class, 'nosotros'])->name('nosotros.tab');

Route::get('/contacto',  [HomeController::class, 'contacto'])->name('home.contacto');
Route::get('/programas', [HomeController::class, 'programas'])->name('home.programas');

/*
|--------------------------------------------------------------------------
| CRONOGRAMA / APIs
|--------------------------------------------------------------------------
*/
Route::get('/cronograma', [CronogramaController::class, 'index'])->name('cronograma');

Route::get('/api/actividades/fechas', [CronogramaController::class, 'fechasPorAnio']);
Route::get('/api/actividades/dia',    [CronogramaController::class, 'actividadesPorDia']);
Route::get('/api/actividades/rango',  [CronogramaController::class, 'fechasRango']);
Route::get('/api/actividades/mes',    [CronogramaController::class, 'fechasPorMes']);

/*
|--------------------------------------------------------------------------
| RUTAS DEL PANEL (requieren auth)
|--------------------------------------------------------------------------
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Actividades
    Route::get ('/dashboard/actividades',                 [ActividadeController::class,'index'])->name('dashboard.actividades.index');
    Route::get ('/dashboard/actividades/create',          [ActividadeController::class,'create'])->name('dashboard.actividades.create');
    Route::post('/dashboard/actividades',                 [ActividadeController::class,'store'])->name('dashboard.actividades.store');
    Route::get ('/dashboard/actividades/{actividade}/edit',[ActividadeController::class,'edit'])->name('dashboard.actividades.edit');
    Route::put ('/dashboard/actividades/{actividade}',    [ActividadeController::class,'update'])->name('dashboard.actividades.update');

    // Noticias
    Route::resource('/dashboard/noticias', NoticiaController::class)
        ->names('dashboard.noticias');

    // Secciones (académicas)
    Route::resource('/dashboard/secciones', SeccioneController::class)
        ->names('dashboard.secciones');

    // Equipo institucional (docentes/auxiliares/administrativos)
    Route::prefix('dashboard/docentes')->name('dashboard.docentes.')->group(function () {
        Route::get   ('/',           [EquipoInstitucionalController::class, 'index'])->name('index');
        Route::get   ('/create',     [EquipoInstitucionalController::class, 'create'])->name('create');
        Route::post  ('/',           [EquipoInstitucionalController::class, 'store'])->name('store');
        Route::get   ('/{id}',       [EquipoInstitucionalController::class, 'show'])->name('show');
        Route::get   ('/{id}/edit',  [EquipoInstitucionalController::class, 'edit'])->name('edit');
        Route::put   ('/{id}',       [EquipoInstitucionalController::class, 'update'])->name('update');
        Route::delete('/{id}',       [EquipoInstitucionalController::class, 'destroy'])->name('destroy');
    });
});
