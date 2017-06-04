@if($documentos=="[]")
                        <span>Aún no se han registrado documentos/archivos</span>
@else                   
						<div class="item form-group">
                        	<div class="col-md-12 col-sm-12 col-xs-12">                 
                              <div>                              
                              {!!Form::select('documento',$documentos,null,['required','class'=>'form-control unidad','placeholder' => 'Seleccione una versión','files'=>'true'])!!}
                              </div>
                        	</div>
                        </div>
                        <input type="file" name="archivo" required="required">
                          <div align="right"><br>
                            <button type="submit" class="btn btn-primary">Actualizar
                            </button>
                         </div>
@endif