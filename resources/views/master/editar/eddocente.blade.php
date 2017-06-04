               <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Editar Tutor</h4>
                        </div>
                        <div class="modal-body">                            
                          {!! Form::model($po,['route' => ['docente.update',$po->id], 'method' =>'PUT', 'class'=>'form-horizontal form-label-left', 'files'=>true ]) !!}    
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="file" id="files" name="foto" accept="image/*" />
                          <br/>
                          <output id="list"><img src="{{URL::to('images/'.Auth::user()->foto)}}" width="100%"></output>
                        </div>
                      </div>

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
                        <label>Género </label><br>                       
                          <div>
                              {!!Form::select('sexo',$sexo,null, ['required','class'=>'form-control unidad','placeholder' => 'Seleccione'])!!}
                          </div>
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
      <script type="text/javascript">
          //Mostrar imagenes del imput file
          function archivo(evt) {
            var files = evt.target.files; // FileList object
            //Obtenemos la imagen del campo "file". 
            for (var i = 0, f; f = files[i]; i++) {         
              //Solo admitimos imágenes.
              if (!f.type.match('image.*')) { continue;}
            var reader = new FileReader();
            reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("list").innerHTML = ['<img class="thumb" width="100%" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
           reader.readAsDataURL(f);
       }
    }      
      document.getElementById('files').addEventListener('change', archivo, false);
    </script>