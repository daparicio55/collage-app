@extends('layouts.main')
@section('content')

<section class="page alt">
    <div class="wrap">
        <h1 class="hx">
            Pre-Matrícula
        </h1>
        <p style="margin:10px 0">
            <a class="btn-ghost" href="{{ route('home.matriculas') }}">← Volver a Matrículas</a>
        </p>

        <section id="proceso-inicial" class="page" style="padding-top:12px">

            <div class="wrap">
                <h2 class="hx">Proceso para Educación Inicial</h2>
                <!-- Tabla de edades -->
                <p class="age-note">Para postular a Inicial se consideran las siguientes edades al
                  <strong>31 de marzo</strong> del año de ingreso:
                </p>
                <div class="card"><div class="body">
                    <table class="age-table">
                        <thead>
                            <tr>
                                <th>Edad</th>
                                <th>Criterio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>3 años</strong></td>
                                <td>Tres años de edad al 31 de marzo del año de ingreso.</td>
                            </tr>
                            <tr>
                                <td><strong>4 años</strong></td>
                                <td>Cuatro años de edad al 31 de marzo del año de ingreso.</td>
                            </tr>
                            <tr>
                                <td><strong>5 años</strong></td>
                                <td>Cinco años de edad al 31 de marzo del año de ingreso.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="timeline">
                <div class="step">
                    <div class="badge gold">#1</div>
                    <div>
                        <h3>Completar formulario de preinscripción</h3>
                        <p>Registre los datos del postulante y de la familia para iniciar el proceso.</p>
                        <div class="btn-line">
                        <!-- Pon aquí tu PDF/Google Form/página interna -->
                            <a class="btn" href="?p=matriculas&nivel=inicial&vista=formulario" target="_blank" rel="noopener">
                                FORMULARIO
                            </a>
                            <span style="opacity:.75">o solicítelo en Secretaría</span>
                        </div>
                    </div>
                </div>
            </div>


            <section id="formulario" class="page" style="padding-top:18px">
                <div class="wrap">
                    <div class="card"><div class="body" style="max-width:760px;margin:auto">
                    <h3 class="hx" style="font-size:22px;margin-top:0">Formulario de preinscripción — Educación Inicial</h3>
                    <p style="margin-top:-6px;opacity:.9">
                        Este formulario es <strong>gratuito</strong> y no garantiza vacante. La IE confirmará su recepción y continuará con los pasos
                        del proceso (validación, entrevista y matrícula en SIAGIE).
                    </p>

                    <!-- OPCIÓN A: Envío sin backend usando formsubmit.co (reemplaza tu correo) -->
                    <!-- <form action="https://formsubmit.co/TU-CORREO@dominio.gob.pe" method="POST"> -->

                    <!-- OPCIÓN B: Solo demostración local (sin enviar) -->
                    <form onsubmit="JMM.enviarPreinscripcion(event)">

                        <fieldset style="border:0;padding:0;margin:0 0 14px">
                        <legend style="font-weight:700;margin:0 0 6px">Datos del estudiante</legend>
                        <label>Apellidos y nombres</label>
                        <input class="inp" name="alumno_nombres" required>

                        <div style="display:grid;gap:10px;grid-template-columns:1fr 1fr">
                            <div>
                            <label>DNI</label>
                            <input class="inp" name="alumno_dni" required maxlength="8" pattern="\d{8}">
                            </div>
                            <div>
                            <label>Fecha de nacimiento</label>
                            <input class="inp" type="date" name="alumno_fnac" required>
                            </div>
                        </div>

                        <div style="display:grid;gap:10px;grid-template-columns:1fr 1fr">
                            <div>
                            <label>Grado al que postula</label>
                            <select class="inp" name="grado" id="grado" required>
                                <option value="">Seleccionar…</option>
                                @foreach ($secciones as $seccione )
                                    <option value="{{ $seccione->id }}">{{ $seccione->grado }}</option>

                                @endforeach
                            </select>
                            </div>
                            <div>
                            <label>Vacantes</label>
                            <input class="inp" name="vacantes" id="vacantes" disabled>
                            </div>
                        </div>

                        <label>Dirección</label>
                        <input class="inp" name="direccion" required>
                        </fieldset>

                        <fieldset style="border:0;padding:0;margin:0 0 14px">
                        <legend style="font-weight:700;margin:0 0 6px">Padre, madre o apoderado</legend>

                        <div style="display:grid;gap:10px;grid-template-columns:1fr 1fr">
                            <div>
                            <label>Apellidos y nombres</label>
                            <input class="inp" name="apo_nombres" required>
                            </div>
                            <div>
                            <label>DNI</label>
                            <input class="inp" name="apo_dni" required maxlength="8" pattern="\d{8}">
                            </div>
                        </div>

                        <div style="display:grid;gap:10px;grid-template-columns:1fr 1fr">
                            <div>
                            <label>Celular</label>
                            <input class="inp" name="apo_cel" required>
                            </div>
                            <div>
                            <label>Correo</label>
                            <input class="inp" type="email" name="apo_email" required>
                            </div>
                        </div>
                        </fieldset>

                        <fieldset style="border:0;padding:0;margin:0 0 14px">
                        <legend style="font-weight:700;margin:0 0 6px">Información adicional</legend>

                        <div style="display:grid;gap:10px;grid-template-columns:1fr 1fr">
                            <div>
                            <label>¿Cuenta con SISFOH?</label>
                            <select class="inp" name="sisfoh">
                                <option>No precisa</option>
                                <option>Sí</option>
                                <option>No</option>
                            </select>
                            </div>
                            <div>
                            <label>¿Atención en Cuna Más u otros?</label>
                            <select class="inp" name="cuna">
                                <option>No precisa</option>
                                <option>Sí</option>
                                <option>No</option>
                            </select>
                            </div>
                        </div>

                        <label>Observaciones (salud, alergias, discapacidad, etc.)</label>
                        <textarea class="inp" rows="3" name="obs"></textarea>
                        </fieldset>

                        <!-- Si usas formsubmit.co puedes desactivar captcha, redirigir, etc. -->
                        <!--
                        <input type="hidden" name="_captcha" value="false">
                        <input type="hidden" name="_next" value="https://tusitio.edu.pe/?p=matriculas&nivel=inicial#proceso-inicial">
                        -->

                        <label style="display:flex;gap:8px;align-items:flex-start;margin-top:6px">
                        <input type="checkbox" required>
                        <span>Acepto el uso de mis datos personales para fines del proceso de matrícula,
                        conforme a la normativa de protección de datos personales vigente.</span>
                        </label>

                        <div class="btn-line" style="margin-top:12px">
                        <button class="btn">Enviar solicitud</button>
                        <a class="btn-ghost" href="?p=matriculas">Cancelar</a>
                        </div>
                    </form>
                    </div></div>
                </div>
                </section>



        </section>
    </div>
</section>
@endsection
@push('js')
    <script>
        console.log('Página de Matrículas Inicial cargada');
        document.getElementById('grado').addEventListener('change',function(){
            const secciones = @json($secciones);
            const seleccionado = secciones.find(s => s.id == this.value);
            const vacantesInput = document.getElementById('vacantes');
            if(seleccionado){
                vacantesInput.value = seleccionado.vacantes;
            } else {
                vacantesInput.value = '';
            }
        });
    </script>
@endpush