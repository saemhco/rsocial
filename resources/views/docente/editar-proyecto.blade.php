@extends('master.docente')
@section('title','Proyectos')
@section('estilos')
  {!!Html::style('select2-4.0.3/dist/css/select2.min.css',['rel'=>'stylesheet'])!!}
  {!!Html::style('editor/editor.css',['rel'=>'stylesheet'])!!}

  @include('master.extras.tablasEstilos')


    <style>
      #eliminar{
        color: red;
        opacity: 0.4;
        font-size: 2em;
        transition: 0.5s;
      }
      #eliminar:hover{
        opacity: 1;
      }
      #editar{
        color: blue;
        opacity: 0.4;
        font-size: 1.8em;
        transition: 0.5s;
      }
      #editar:hover{
        opacity: 1;
      }
      .estado{
        text-align: center;
        border-radius: 20px;
        font-family: 'Denk One', sans-serif;
        margin-top: 30%;
        padding: 0.2em;
      }
      
       #accion{
        list-style:none; /* Eliminamos los bullets */
        margin:0px; /* Quitamos los margenes */
        padding:0px; /* Quitamos el padding */
      }
      #accion>li {
        float:left; /* Hacemos que el menu se muestre horizontal */
        padding-left:10px;
      }
    .lista ul
    {
       padding-right: 0px;
       padding-left: 0px;
       padding-bottom: 0px;
       padding-top: 0px;
       margin: 0px;
    }
    .lista li
    {
       list-style-type: none;
       display: inline;
       padding-right: 5px;
    }
  </style>
@endsection
@section('contenido')
<!--Cuerpo-->
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
      <a href="{{url('docenteproyecto')}}" style="color: green;"><i id="ico-plus" class="fa fa-arrow-left"></i> volver </a>
        <div class="x_title">
          <div align="center"><h2 ><b> Editar Proyecto </b></h2></div>  
            <div class="clearfix"></div>
        </div>  
        <div class="x_content" >
          {!! Form::model($mp,['route' => ['docenteproyecto.update', $mp->id], 'method' => 'PUT', 'class'=>'form-horizontal form-label-left', 'enctype'=>'multipart/form-data']) !!}                     
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <label>Curso</label>
                {!!Form::select('curso',$cursos,$mp->curso_id,['required','id'=>'curso','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <label>Tipo</label>
                {!!Form::select('tipo',$tipos,$mp->tipo, ['required','class'=>'form-control unidad','placeholder' => 'Seleccione'])!!}
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Semestre</label>
                  {!!Form::text('semestre', $mp->semestre, [ 'required','class'=> 'form-control', 'placeholder'=>'Semestre'])!!}
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Ciclo</label>
                  {!!Form::text('ciclo', $mp->ciclo, [ 'required','class'=> 'form-control', 'placeholder'=>'Ciclo académico'])!!}
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Sección</label>
                  {!!Form::text('seccion', $mp->seccion, [ 'required','class'=> 'form-control', 'placeholder'=>'Sección'])!!}
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Título</label>
                  {!!Form::text('titulo', $mp->titulo, [ 'required','class'=> 'form-control', 'placeholder'=>'Titulo del proyecto'])!!}
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Resolución de aprobación del Proyecto</label>
                  {!!Form::text('resolucion_proyecto', null, ['class'=> 'form-control', 'placeholder'=>'Resolución de aprobación del proyecto'])!!}
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Resolución de aprobación del Informe General</label>
                  {!!Form::text('resolucion_informe', null, ['class'=> 'form-control', 'placeholder'=>'Resolución de aprobación del informe general'])!!}
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Beneficiarios</label>
                  {!!Form::text('beneficiarios', null, [ 'required','class'=> 'form-control', 'placeholder'=>'Beneficiarios'])!!}
                </div>
              </div>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12 lista">
                <label>Satisfacción de los involucrados (adjuntar excel)</label>
                  <ul >
                    <li style="float:left;">
                      {!!Form::select('satisfacion_involucrados',$satisfaccionInvolucrados,null,['class'=>'form-control unidad','style'=>'width: auto','placeholder' => 'Seleccione'])!!}
                    </li>
                    <li style="float:left; margin-top: 5px;">             
                      <input type="file" name="excelSatisfaccion">
                    </li>
                  </ul>
                </div>
              </div>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Grupo(s) de interés</label>
                  {!!Form::text('grupo_interes', null, ['class'=> 'form-control', 'placeholder'=>'Grupo de interés'])!!}
                </div>
              </div>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Lugar</label>
                  {!!Form::text('lugar', null, [ 'required','class'=> 'form-control', 'placeholder'=>'Lugar'])!!}
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Porcentaje de Desarrollo</label>
                  {!!Form::text('porcentaje', $mp->porcentaje, [ 'required','class'=> 'form-control', 'placeholder'=>'%'])!!}
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Registro de participación (adjuntar lista de participación)</label>
                  <input type="file" name="registro_participacion">
                </div>
              </div><br>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>Evidencias (Adjuntar fotos en .pdf o .docx)</label>
                  <input type="file" name="evidencias">
                </div>
              </div><br>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>Objetivos</label>
                <div class="col-lg-12 nopadding">
                 <textarea id="objetivos" name="objetivos"></textarea> 
                </div>
                  <br />
                </div>
              </div>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>Justificación</label>
                  <div class="col-lg-12 nopadding">
                 <textarea id="justificacion" name="justificacion"></textarea> 
                </div>
                  <br />
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>Logros (indicadores)</label>
                  <div class="col-lg-12 nopadding">
                 <textarea id="logros" name="logros"></textarea> 
                </div>
                  <br />
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>Dificultades</label>
                  <div class="col-lg-12 nopadding">
                 <textarea id="dificultades" name="dificultades"></textarea> 
                </div>
                  <br />
                </div>
              </div>

                      <div class="col-md-12"><br>
                        <div class="modal-footer">
                          <button class="btn btn-success btn-lg" onclick="captura()">Actualizar</button>
                        </div>
                      </div>
          {!! Form::close() !!}
        </div>        
  </div>
</div>
<!--Fin Cuerpo-->

@endsection
@section('script')
  <!--Scripts Select2-curso-->
  {!!Html::script('editor/editor.js')!!}
  {!!Html::script('select2-4.0.3/dist/js/select2.js')!!}
  <script type="text/javascript">

  //Editores y completar    
      $(document).ready(function() {
        $("#objetivos").Editor();
        $("#objetivos").Editor("setText", '<?php echo $mp->objetivos; ?>');
        $("#justificacion").Editor();
        $("#justificacion").Editor("setText", '<?php echo $mp->justificacion; ?>');
        $("#logros").Editor();
        $("#logros").Editor("setText", '<?php echo $mp->logros; ?>');
        $("#dificultades").Editor();
        $("#dificultades").Editor("setText", '<?php echo $mp->dificultades; ?>');
      });

        

  //Capturar los textos
     function captura(){
      $('#objetivos').val($("#objetivos").Editor("getText"));
      $('#justificacion').val($("#justificacion").Editor("getText"));
      $('#logros').val($("#logros").Editor("getText"));
      $('#dificultades').val($("#dificultades").Editor("getText"));
    }

    //Nuevo Curso (Select2)
    $("#curso").select2({
       });
    </script>
@endsection