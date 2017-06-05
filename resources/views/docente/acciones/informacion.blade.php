<style type="text/css">
  .info-p{
    font-size: 1.3em;  
  }
  .info-p>b{
     color: #151272;
  }

</style>

                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Información</h4>
                        </div>
                        <div class="modal-body">

                          <p class="info-p" align="center"><b>
                            @if($p->tipo==1)
                              Proyección Social
                            @else
                              Extensión Universitaria
                            @endif
                            </b>
                          </p>
                        <ul>
                          <li><p class="info-p" id="i-titulo"><b>Título del proyecto: </b>{{$p->titulo}}</p></li>
                          <li><p class="info-p" id="i-titulo"><b>Resolución de aprobación del Proyecto : </b>{{$p->resolucion_proyecto}}</p></li>
                          <li><p class="info-p" id="i-titulo"><b>Resolución de aprobación del Informe General : </b>{{$p->resolucion_informe}}</p></li>
                          <li><p class="info-p" id="i-curso"><b>Curso: </b> {{$p->curso}}</p></li>
                          <li><p class="info-p" id="i-docente"><b>Docente a cargo: </b>{{$p->n.", ".$p->a}}</p></li>
                          <li ><p class="info-p" ><b>Estudiantes: </b>
                          @foreach($estudiantes as $e)
                            <ul>
                              <li >{{$e->nombres.", ".$e->apellidos}}</li>
                            </ul>
                          @endforeach
                          </p></li>
                          <li><p class="info-p" id="i-semestre"><b>Semestre: </b>{{$p->semestre}}</p></li>
                          <li><p class="info-p" id="i-ciclo"><b>Ciclo: </b>{{$p->ciclo}}</p></li>
                          <li><p class="info-p" id="i-seccion"><b>Sección: </b>{{$p->seccion}}</p></li>
                          <li><p class="info-p" id="i-porcentaje"><b>% desarrollo: </b>{{$p->porcentaje}}</p></li>
                          <li><p class="info-p" id="i-porcentaje"><b> Beneficiarios: </b>{{$p->beneficiarios}}</p></li>
                          <li><p class="info-p" id="i-porcentaje"><b> Satisfación de los involucrados: </b>{{$satisfaccion[$p->satisfacion_involucrados]}}</p></li>
                          <li><p class="info-p" id="i-porcentaje"><b> Grupo de interés: </b>{{$p->grupo_interes}}</p></li>
                          <li><p class="info-p" id="i-objetivos"><b>Objetivos: </b><br>{!!$p->objetivos!!}</p></li>
                          <li><p class="info-p" id="i-justificacion"><b>Justificación: </b>{!!$p->justificacion!!}</p></li>
                          <li><p class="info-p" id="i-logros"><b>Logros (indicadores): </b><br>{!!$p->logros!!}</p></li>
                          <li><p class="info-p" id="i-dificultades"><b>Dificultades: </b><br>{!!$p->dificultades!!}</p></li>
                          <li><p class="info-p" id="i-obs"><b><i>Obs: </i></b><br>{!!$p->obs!!}</p></li>
                        </ul>
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <a href="{{url('docenteproyecto/'.$p->id.'/edit')}}" type="button" class="btn btn-primary" id="btn-editar">Editar</a>
                          <a href="{{url('docenteacciones/pdf/'.$p->id)}}" type="button" class="btn btn-primary" target="_blank">
                            <i class="icon fa fa-file-pdf-o"></i> PDF
                          </a>
                        </div>

                      </div>
                    </div>