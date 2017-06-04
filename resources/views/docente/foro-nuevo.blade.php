                  <!-- Large modal -->
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="NuevoForo">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Nuevo Foro</h4>
                        </div>
                        <div class="modal-body">  
                          {!! Form::open(['route' => 'foros.store', 'method' => 'POST', 'class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data']) !!}      
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Proyecto</label>
                              {!!Form::select('pnf',$pnf,null,['required','id'=>'pnf','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione un proyecto'])!!}
                            </div>
                      </div>               
                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Título</label>
                              {!!Form::text('titulo', null, [ 'required','class'=> 'form-control', 'placeholder'=>'Título del Foro'])!!}
                            </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label>Contenido</label>
                          <div class="col-lg-12 nopadding">
                            <textarea id="contenido-n" name="contenido-n"></textarea> 
                          </div>
                          <br/>
                        </div>
                      </div>

                      <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Archivo</label>
                              <input type="file" name="archivo" />
                            </div>
                      </div>
                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary" onclick="capturaNuevo()">Guardar</button>
                    </div>
                    {!! Form::close() !!}
                    </div>
                  </div>