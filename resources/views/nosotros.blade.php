@extends('layouts.main')

@section('content')
<div class="container py-4">
    {{-- Encabezado --}}
    <div class="mb-4" style="text-align: center;">
        <h1 class="fw-bold mb-1">Nosotros</h1>
        <p class="text-muted mb-0">Conozca la organización, propósito institucional y lineamientos.</p>
    </div>

    {{-- CONTENIDO DINÁMICO --}}
    @if($section === 'quienes')
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-3">
                        <h3 class="h5 fw-bold mb-3">Quiénes somos</h3>
                        <p class="mb-0" style="text-align: justify;">
                            Somos una IEI creada en el año 1981, con RDZ N°0068 el 1 de abril. En sus inicios funcionó por primera vez en dos aulas prestadas del CECAT con 50 niños y niñas con el nombre de jardín de infancia N°020, durante el gobierno de Fernando Belaunde Terry, en el año 1981, recibe una duración de un terreno de 1100 m2, lugar donde actualmente viene funcionando. En la actualidad la población estudiantil es de 111, distribuidos en 5 secciones, con 5 docentes y una directora que también cumple el rol docente. La infraestructura se encuentra ubicada en el Jr. Amazonas cuadra 1, perteneciente al barrio Yance de la ciudad de Chachapoyas, región Amazonas. Para la funcionalidad y estar dentro de la operatividad cumpliendo con los estándares de calidad del servicio, realiza el mejoramiento de la infraestructura invirtiendo los presupuestos del Mantenimiento escolar y los aportes por derecho de APAFA, que la asociación de padres de familia dispone.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <img src="{{ asset('recursos/nosotros.jpg') }}" alt="Imagen institucional"
                         class="w-100 h-100 object-fit-cover rounded-3"
                         style="min-height: 230px;">
                </div>
            </div>
        </div>

    @elseif($section === 'mision')
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold mb-3">Misión</h3>
                        <p class="mb-0" style="text-align: justify;">
                            Brindar una educación integral de calidad, con énfasis en la formación de valores cívicos, éticos, morales, socioculturales y ecológicos, logrando aprendizajes establecidos en el currículo nacional, donde nuestros estudiantes experimenten, descubran y potencien sus capacidades desde el protagonismo de sus acciones, con docentes capaces de generar espacios retadores y autónomos, con recursos pertinentes e innovadores, en espacios seguros, inclusivos de sana convivencia y libre de violencia
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <img src="{{ asset('recursos/mision.jpg') }}" alt="Misión IEI 020"
                         class="w-100 h-100 object-fit-cover rounded-3"
                         style="min-height: 230px;">
                </div>
            </div>
        </div>

    @elseif($section === 'vision')
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold mb-3">Visión</h3>
                        <p class="mb-0" style="text-align: justify;">
                            La Institución Educativa Inicial 020, al 2027 seremos una institución educativa que brinda a nuestros niños y niñas  una formación integral, innovadora e inclusiva que desarrolla capacidades fundamentales individuales y grupales, basados en el fortalecimiento de su autoestima, autonomía, respeto, honestidad, disciplina y responsabilidad; garantizando una mejor calidad de vida que les permita enfrentar los desafíos del mundo competitivo, favoreciendo el desarrollo social, ecológico y emocional de todos.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <img src="{{ asset('recursos/vision.jpg') }}" alt="Visión institucional"
                         class="w-100 h-100 object-fit-cover rounded-3"
                         style="min-height: 230px;">
                </div>
            </div>
        </div>

@elseif($section === 'valores')
    <div class="mb-3">
        <h3 class="h5 fw-bold">Valores institucionales</h3>
        <p class="text-muted mb-4" style="text-align: justify;">
            Principios que orientan el trabajo pedagógico y la convivencia en la IEI 020.
        </p>
    </div>

    {{-- 1. Solidaridad --}}
    <div class="row g-3 mb-3">
        {{-- texto --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body">
                    <span class="badge bg-accent mb-2">Valor</span>
                    <h5 class="mb-2">Solidaridad</h5>
                    <p class="mb-3 small" style="text-align: justify;">
                        Es el valor que nos lleva a identificarnos con las necesidades entre los estudiantes, docentes y personal de la I.E., y comprometernos a propiciar el desarrollo del bienestar común, actuando con justicia e inclusión.
                    </p>
                    <p class="text-muted small mb-0" style="text-align: justify;">
                        <strong>Actitudes:</strong> Asume el servicio de su entorno inmediato como misión permanente. Comparte lo que sabe y lo que tiene, basado en metas o intereses comunes.
                    </p>
                </div>
            </div>
        </div>
        {{-- imagen --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <img src="{{ asset('recursos/valores/solidaridad.jpg') }}"
                     alt="Solidaridad"
                     class="w-100 h-100"
                     style="object-fit: cover; min-height: 210px;">
            </div>
        </div>
    </div>

    {{-- 2. Respeto --}}
    <div class="row g-3 mb-3">
        {{-- texto --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body">
                    <span class="badge bg-accent mb-2">Valor</span>
                    <h5 class="mb-2">Respeto</h5>
                    <p class="mb-3 small" style="text-align: justify;">
                        Es el valor que reconoce, comprende y valora los derechos y deberes, así como la dignidad de sí mismo y la de sus compañeros, fomentando la acogida y la estima de forma generosa y sincera, para lograr una convivencia armónica, justa y libre de violencia. 
                    </p>
                    <p class="text-muted small mb-0" style="text-align: justify;">
                        <strong>Actitudes:</strong> Escuchar y aceptar opiniones de los demás. Se comporta adecuadamente, es amable, honesto, valorando a las personas.
                    </p>
                </div>
            </div>
        </div>
        {{-- imagen --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <img src="{{ asset('recursos/Respeto.jpg') }}"
                     alt="Respeto"
                     class="w-100 h-100"
                     style="object-fit: cover; min-height: 210px;">
            </div>
        </div>
    </div>

    {{-- 3. Responsabilidad --}}
    <div class="row g-3 mb-3">
        {{-- texto --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body">
                    <span class="badge bg-accent mb-2">Valor</span>
                    <h5 class="mb-2">Responsabilidad</h5>
                    <p class="mb-3 small" style="text-align: justify;">
                        Es el valor que refleja el compromiso que uno asume al realizar las acciones que corresponden a su quehacer en beneficio de su autonomía y madurez, buscando el bien común. 
                    </p>
                    <p class="text-muted small mb-0" style="text-align: justify;">
                        <strong>Actitudes:</strong> Realiza sus trabajos en orden y oportunamente. Cumple compromisos adquiridos generando confianza y tranquilidad entre las personas. 
                    </p>
                </div>
            </div>
        </div>
        {{-- imagen --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <img src="{{ asset('recursos/valores/responsabilidad.jpg') }}"
                     alt="Responsabilidad"
                     class="w-100 h-100"
                     style="object-fit: cover; min-height: 210px;">
            </div>
        </div>
    </div>
    @elseif($section === 'metas')
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-body p-4">
            <h3 class="h5 fw-bold mb-3">Metas anuales</h3>
            <p class="mb-3" style="text-align: justify;">
                Las metas anuales que aspiramos alcanzar responden a desempeños que, en términos de aprendizaje,
                se articulan con las competencias y los estándares de aprendizaje de las áreas curriculares.
                Estas metas permiten organizar el trabajo pedagógico trimestral y asegurar la atención a las
                actividades permanentes (juego libre, talleres, psicomotricidad, música, gráfico-plástico) y a los
                proyectos o unidades de aprendizaje.
            </p>

            {{-- Tarjetitas de síntesis --}}
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <div class="h-100 p-3 rounded-3 bg-light border">
                        <h6 class="fw-bold mb-1">1. Logro de aprendizajes</h6>
                        <p class="mb-0 small" style="text-align: justify;">
                            Alinear las experiencias de aprendizaje a las competencias del Currículo Nacional.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-3 rounded-3 bg-light border">
                        <h6 class="fw-bold mb-1">2. Organización trimestral</h6>
                        <p class="mb-0 small" style="text-align: justify;">
                            Distribuir las unidades y talleres en los tres trimestres para asegurar continuidad.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-3 rounded-3 bg-light border">
                        <h6 class="fw-bold mb-1">3. Enfoque integral</h6>
                        <p class="mb-0 small" style="text-align: justify;">
                            Considerar actividades permanentes, proyectos y evaluación diagnóstica.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Acordeón para la matriz --}}
            <div class="accordion" id="acordeonMetas">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingMatriz">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseMatriz" aria-expanded="true" aria-controls="collapseMatriz">
                            Matriz de organización de los aprendizajes
                        </button>
                    </h2>
                    <div id="collapseMatriz" class="accordion-collapse collapse show"
                         aria-labelledby="headingMatriz" data-bs-parent="#acordeonMetas">
                        <div class="accordion-body">
                            <p class="small mb-3" style="text-align: justify;">
                                La siguiente matriz muestra el vínculo entre las áreas, las competencias y su
                                desarrollo a lo largo de los trimestres, considerando unidades didácticas, proyectos,
                                talleres y actividades permanentes.
                            </p>

                            <div class="table-responsive">
                                <table class="table table-sm table-bordered align-middle mb-0">
                                    <thead class="table-primary text-center">
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle;">Áreas</th>
                                            <th rowspan="2" style="vertical-align: middle;">Competencias</th>
                                            <th colspan="7">Trimestres / Organización</th>
                                        </tr>
                                        <tr class="small">
                                            <th>Diag.</th>
                                            <th>Proyecto</th>
                                            <th>Unidad</th>
                                            <th>Proyecto</th>
                                            <th>Talleres</th>
                                            <th>Act. permanentes</th>
                                            <th>Juego libre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- COMUNICACIÓN --}}
                                        <tr>
                                            <td rowspan="4"><strong>Comunicación</strong></td>
                                            <td>Se comunica oralmente en su lengua materna</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                        </tr>
                                        <tr>
                                            <td>Lee diversos tipos de textos en su lengua materna</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                        </tr>
                                        <tr>
                                            <td>Escribe diversos tipos de textos en su lengua materna</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                        </tr>
                                        <tr>
                                            <td>Crea proyectos desde los lenguajes artísticos</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                        </tr>

                                        {{-- MATEMÁTICA --}}
                                        <tr>
                                            <td rowspan="2"><strong>Matemática</strong></td>
                                            <td>Resuelve problemas de cantidad</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                        </tr>
                                        <tr>
                                            <td>Resuelve problemas de forma, movimiento y localización</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                        </tr>

                                        {{-- CIENCIA Y TECNOLOGÍA --}}
                                        <tr>
                                            <td><strong>Ciencia y Tecnología</strong></td>
                                            <td>Indaga mediante métodos científicos para construir sus conocimientos</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                        </tr>

                                        {{-- PERSONAL SOCIAL --}}
                                        <tr>
                                            <td rowspan="3"><strong>Personal Social</strong></td>
                                            <td>Construye su identidad</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                        </tr>
                                        <tr>
                                            <td>Convive y participa democráticamente en la búsqueda del bien común</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Construye su identidad como persona humana, amada por Dios, digna, libre y trascendente,
                                                comprendiendo la doctrina de su propia religión y abierta al diálogo
                                            </td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                        </tr>

                                        {{-- PSICOMOTRIZ --}}
                                        <tr>
                                            <td><strong>Psicomotriz</strong></td>
                                            <td>Se desenvuelve de manera autónoma a través de su motricidad</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                            <td class="text-center">X</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div> {{-- accordion-body --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
</div>

@push('styles')
<style>
    .valor-card {
        transition: transform .15s ease, box-shadow .15s ease;
    }
    .valor-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 .5rem 1.2rem rgba(0,0,0,.08);
    }
    .object-fit-cover {
        object-fit: cover;
    }
</style>
@endpush
@endsection
