           <!-- Small modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="NuevoDocente">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Registrar nuevo Tutor</h4>
                        </div>
                        <div class="modal-body">

                            
                          {!! Form::open(['route' => 'admindocentes.store', 'method' => 'POST', 'class'=>'form-horizontal form-label-left' ]) !!}                     
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>DNI</label>
                              {!!Form::text('dni', null, [ 'required','maxlength'=>'8','onkeypress'=>'return valida(event)','class'=> 'form-control', 'placeholder'=>'dni'])!!}
                            </div>
                      </div>
                                            
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Nombres</label>
                              {!!Form::text('nombres', null, [ 'required','class'=> 'form-control', 'placeholder'=>'Nombres'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Apellidos</label>
                              {!!Form::text('apellidos', null, [ 'required','class'=> 'form-control', 'placeholder'=>'Nombres'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>E-mail</label>
                              {!!Form::email('email', null, [ 'required','class'=> 'form-control', 'placeholder'=>'Correo electrónico'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>Estado</label><br>                       
                              <div>
                                  <select name='estado' class='form-control'>
                                  <option value='1'>Activo</option>
                                  <option value='0'>Inactivo</option>
                                </select>
                              </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>Género</label><br>                       
                              <div>
                                  <select id='sexo' name='sexo' class='form-control unidad'>
                                  <option value=''>Seleccione</option>
                                  <option value='1'>Masculino</option>
                                  <option value='0'>Femenino</option>
                                </select>
                              </div>
                        </div>
                      </div>                      
                      <div class="col-md-6 col-md-offset-3">
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-success" value="Guardar">
                        </div>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>

      </div>
    </div>