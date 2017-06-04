 <!-- Small modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="NuevaEncuesta">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Crear nueva encuesta</h4>
                        </div>
                        <div class="modal-body">

                            
                          {!! Form::open(['route' => 'adminencuesta.store', 'method' => 'POST', 'class'=>'form-horizontal form-label-left' ]) !!}                     
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Semestre</label>
                              {!!Form::text('semestre', null, [ 'required','class'=> 'form-control', 'placeholder'=>'semestre'])!!}
                            </div>
                      </div>             
                                          
                      <div class="col-md-6 col-md-offset-3">
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-success" value="Crear">
                        </div>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>

      </div>
    </div>