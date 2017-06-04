               <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Editar Tutor</h4>
                        </div>
                        <div class="modal-body">                            
                          {!! Form::model($po,['route' => ['adminestudiantes.update',$po->id], 'method' =>'PUT', 'class'=>'form-horizontal form-label-left' ]) !!}                     
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
                                {!!Form::select('estado',$estado,null, ['required','class'=>'form-control unidad','placeholder' => 'Seleccione'])!!}
                              </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>Género </label><br>                       
                          <div>
                              {!!Form::select('sexo',$sexo,null, ['required','class'=>'form-control unidad','placeholder' => 'Seleccione'])!!}
                          </div>
                        </div>
                      </div> 

                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Fecha de Nacimiento </label>
                              {!!Form::date('f_nac',$po->estudiante->f_nac, ['required', 'class'=> 'form-control'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Fecha de Ingreso</label>
                              {!!Form::date('f_ing', $po->estudiante->f_ing, ['required', 'class'=> 'form-control'])!!}
                            </div>
                      </div> 
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>Nueva contraseña</label><br>                       
                          <div>
                            {!!Form::text('pass', null, ['class'=> 'form-control', 'placeholder'=>'opcional'])!!}
                          </div>
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