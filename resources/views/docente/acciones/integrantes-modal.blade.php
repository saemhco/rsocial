    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">
                              <p id="titulo-i"></p>
                          </h4>
                        </div>
                        
                        <div class="modal-body" >
                            <div class="item form-group">
                            {!! Form::open(['url' => 'docenteacciones/intupdate', 'method' => 'POST', 'class'=>'form-horizontal form-label-left']) !!} 
                              <div class="col-md-12 col-sm-12 col-xs-12">
                               <label>Agregar Integrantes</label>
                               <select id="estudiante" name="estudiante" class="form-control" required="required">
                                 <option value="">Seleccione una opcción </option>

                                 @foreach($estudiantes as $e)
                                  <?php 
                                  //Que no muestre a los est que ya estan en este proyecto 
                                  $sensor=0;
                                  if($misestudiantes!="[]"){
                                    foreach ($misestudiantes as $me) {
                                      if($e->id==$me->estudiante_id){
                                        $sensor=1; break;
                                      }
                                    }
                                  }
                                  if ($sensor==1) {continue;
                                  }
                                   ?>
                                 <option value="{{$e->id}}">{{$e->apellidos.", ".$e->nombres." (DNI. ".$e->dni.")"}}</option>
                                 @endforeach
                               </select>
                               <div align="right">

                              <input type="hidden" name="proyecto" value="{{$id}}">
                               <button type="submit" class="btn btn-primary" style="margin-top: 5px;">+Agregar</button></div>
                              </div>
                              {!! Form::close() !!} 
                              
                              <hr>
            <!-- ................................................................... -->
                              {!! Form::open(['url' => 'docenteacciones/inteliminar', 'method' => 'POST', 'class'=>'form-horizontal form-label-left']) !!} 
                              <div class="col-md-12 col-sm-12 col-xs-12">
                               <label>Eliminar Integrantes</label>
                               <select id="estudiant" name="estudiante" class="form-control" required="required">
                                 <option value="">Seleccione una opcción </option>
                                 @foreach($misestudiantes as $e)
                                 <option value="{{$e->id}}">{{$e->estudiante->user->nombres.", ".$e->estudiante->user->apellidos." (DNI. ".$e->estudiante->user->dni.")"}}</option>
                                 @endforeach
                               </select>
                               <div align="right">
                               <button type="submit" class="btn btn-danger" style="margin-top: 5px;">- Eliminar</button></div>
                              </div>
                              {!! Form::close() !!} 
                            </div>
                                                    
                        </div>
                        
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          
                        </div>
                         
                      </div>
</div>