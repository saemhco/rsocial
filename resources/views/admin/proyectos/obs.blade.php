<!-- Small modal -->
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2"><label id="titulo-o">Observación</label></h4>
                        </div>
                        <div class="modal-body">                            
                          {!! Form::model($o,['route'=>['adminproyectos.update', $o->id], 'method' => 'PUT', 'class'=>'form-horizontal form-label-left' ]) !!}          
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Obs</label>
                              {!!Form::textArea('obs', null, ['class'=> 'form-control', 'placeholder'=>'Escriba su observación aquí...'])!!}
                            </div>
                      </div>
                      
                      
                                  
                      <div class="col-md-6 col-md-offset-3">
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-success" value="Actualizar">
                        </div>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>

      </div>