<div class="modal fade bs-example-modal-sm in" tabindex="-1" role="dialog" aria-hidden="true" id="subir" >
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">
                              <p id="titulo-s"></p>
                          </h4>
                        </div>
                        <div class="modal-body" >
                          {!! Form::open(['route' => 'documento.store', 'method' => 'POST', 'class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data']) !!} 
                          {{csrf_field()}}
                            <label>Subir un nuevo archivo</label>
                            <input type="file" name="documento" required="required">
                            <div align="right"><br>
                            <input type="hidden" name="proyecto" id="proyecto" >
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                           {!! Form::close() !!}<hr>


                           {!! Form::open(['route' => 'documento.update', 'method' => 'PUT', 'class'=>'form-horizontal form-label-left', 'files'=>'true']) !!} 
                            <label>Actualizar un archivo</label>
                            <div id="datos-subir"></div>
                           {!! Form::close() !!}
                          
                        </div>
                        
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>

                      </div>
                    </div>
</div>