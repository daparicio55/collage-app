@extends('layouts.main')
@section('content')
    <section class="page alt" align="center">
        <div class="wrap">
            <h1 class="hx">
                Pre-Matrículas
            </h1>
        </div>
    </section>
    <!-- SECCIÓN PRE-MATRÍCULA -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-start">

                <!-- TEXTO E INDICACIONES -->
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h2 class="h3 fw-bold mb-3">Pre-matrícula de estudiantes</h2>
                    <p class="mb-3">
                        Estimados padres de familia, para iniciar el proceso de matrícula deberán
                        descargar, completar y presentar el <strong>Formato de Pre-matrícula</strong>
                        en la Mesa de Partes de la institución.
                    </p>

                    <h6 class="text-uppercase text-muted mb-2">Pasos para el registro</h6>
                    <ol class="small mb-3">
                        <li>Descargar el formato de pre-matrícula desde el botón de la derecha.</li>
                        <li>Completar todos los datos solicitados del estudiante y del apoderado.</li>
                        <li>Firmar el formato (padre, madre o apoderado responsable).</li>
                        <li>Adjuntar las copias de los documentos indicados más abajo.</li>
                        <li>Presentar el expediente completo en la Mesa de Partes dentro del plazo establecido.</li>
                    </ol>

                    <h6 class="text-uppercase text-muted mb-2">Documentos que debe adjuntar</h6>
                    <ul class="small mb-3">
                        <li>Copia de DNI del estudiante.</li>
                        <li>Copia de DNI de padre, madre o apoderado.</li>
                        <li>Copia de carnet de vacunación (para nivel inicial).</li>
                        <li>Recibo de servicio (agua/luz) reciente para acreditar domicilio.</li>
                    </ul>

                    <div class="alert alert-info small mb-0">
                        <strong>Atención de Mesa de Partes:</strong><br>
                        Lunes a viernes de 8:00 a.m. a 1:00 p.m.<br>
                        Modalidad: presencial (oficina de Secretaría) o virtual según indicaciones de la institución.
                    </div>
                </div>

                <!-- CARD CON DESCARGA DEL FORMATO -->
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h3 class="h6 text-uppercase text-muted mb-2">Formato oficial</h3>
                            <p class="mb-1 fw-semibold">Formato de Pre-matrícula</p>
                            <p class="small text-muted mb-3">
                                Nivel inicial • 3, 4 y 5 años<br>
                                Versión actualizada: noviembre 2025
                            </p>

                            <!-- CAMBIA href POR LA RUTA REAL DE TU ARCHIVO -->
                            <a href="/documentos/formato-pre-matricula.pdf" class="btn btn-primary w-100 mb-2" download>
                                Descargar formato
                            </a>

                            <p class="small text-muted mb-2">
                                El formato se encuentra en PDF. Puede completarse a mano o de forma digital
                                antes de imprimir.
                            </p>

                            <div class="border-top pt-2 mt-2 small text-muted">
                                Ante cualquier duda, comuníquese con Secretaría
                                o con la Dirección de la institución.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
