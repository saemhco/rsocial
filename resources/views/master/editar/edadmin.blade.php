<!-- Small modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="EditarAdmin">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Editar mis datos</h4>
                        </div>
                        <div class="modal-body">                            
                          {!! Form::open(['route'=>['admin.update'], 'method' => 'PUT', 'class'=>'form-horizontal form-label-left', 'files'=>true ]) !!}  

                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="file" id="files" name="foto" accept="image/*" />
                          <br/>
                          <output id="list"><img src="{{URL::to('images/'.Auth::user()->foto)}}" width="100%"></output>
                        </div>
                      </div>                                             
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Nombres</label>
                              {!!Form::text('nombres', null, [ 'required','id'=>'ea_nombres','class'=> 'form-control', 'placeholder'=>'Nombres'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Apellidos</label>
                              {!!Form::text('apellidos', null, [ 'required','id'=>'ea_apellidos','class'=> 'form-control', 'placeholder'=>'Apellidos'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>E-mail</label>
                              {!!Form::email('email', null, [ 'required','id'=>'ea_email','class'=> 'form-control', 'placeholder'=>'Correo electrónico'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              {!!Form::text('password', null, ['class'=> 'form-control', 'placeholder'=>'Nueva contraseña (opcional)'])!!}
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
    </div>