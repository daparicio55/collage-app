<div class="modal fade" id="modal-{{ $key_nivel ?? 'default-nivel' }}-{{ $key_seccion ?? 'default-seccion' }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">{{ $seccion['nivel'] ?? 'Nivel no disponible' }} - {{ $seccion['nombre'] ?? 'Nombre no disponible' }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                      <ul class="list-unstyled mb-0">
                        <li><strong>Docente:</strong> {{ $seccion['docente'] ?? 'Docente no disponible' }}</li>
                        <li><strong>Turno:</strong> Mañana</li>
                        <li><strong>Vacantes:</strong> {{ $seccion['vacantes'] ?? '0' }}</li>
                        <li><strong>Matriculados:</strong> —</li>
                        <li><strong>Estado:</strong> Con vacantes</li>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-primary" href="#">
                        Continuar inscripción
                      </a>
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>