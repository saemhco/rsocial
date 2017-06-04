<?php 
use Carbon\Carbon;
Carbon::setLocale('es');
?>
@extends('master.docente')
@section('title','Foros')
@section('estilos')
   {!!Html::style('editor/editor.css',['rel'=>'stylesheet'])!!}
<style type="text/css">

h2,
h3{
  font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-weight: 800;
}

hr{
  max-width: 100%;
  margin: 2px;
  border-width: 1.5px;
  border-color: rgba(73,155,234,0.2);
}

.post-preview > a {
  color: #333333;
}
.post-preview > a:hover,
.post-preview > a:focus {
  text-decoration: none;
  color: #0085A1;
}
.post-preview > a > .post-title {
  font-size: 1.9em;
  margin-top: 30px;
  margin-bottom: 10px;
}
.post-preview > a > .post-subtitle {
  margin: 0;
  font-weight: 300;
  margin-bottom: 10px;
}
.post-preview > .post-meta {
  color: #777777;
  font-size: 1.15em;
  font-style: italic;
  margin-top: 0;
}
.post-preview > .post-meta > a {
  text-decoration: none;
  color: #333333;
}
.post-preview > .post-meta > a:hover,
.post-preview > .post-meta > a:focus {
  color: #0085A1;
  text-decoration: underline;
}

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
        font-size: 2em;
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

</style>

@endsection
@section('contenido')

<!-- 
include('tutor.foros.editar-foro') -->
<!--Cabecera-->
            <div class="page-title">
              <div class="title_left">
                <h2>&nbsp;&nbsp; <b>Foros</b> <a href="#" data-toggle="modal" data-target="#NuevoForo"
                    title="Nuevo foro"><i id="ico-plus" class="fa fa-plus-circle"></i></a></h2>
              </div>
             
              <div class="title_right">
              
              <div class="item form-group">
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <label>Curso</label>
                  {!!Form::select('curso',$cursos,null,['required','id'=>'xcurso','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione un curso'])!!}
                </div>
              </div>

              {!! Form::open(['route' => 'foros.index', 'method'=>'GET', 'class'=>'form-horizontal form-label-left' ]) !!}
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" name="buscador" placeholder="Buscar foro (título)...">
                    <span class="input-group-btn">
                              <input type="submit" class="btn btn-info btn-round" name="" value="Ir!">
                    </span>
                  </div>
                </div>
                {!! Form::close() !!}
              </div>
              
            </div>
<!--Fin Cabecera-->
<!--Cuerpo-->

<div class="col-md-12">
  <div class="x_panel">
  <!-- Main Content -->
    <div class="container">
        <div class="row">
          <!-- -Xs pequeños móviles, sm moviles, md tablets y pcs, lg pcs grandes
             -offset-4 : desplazar 4 espacios, es como columna vacia -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="contenido">

              @foreach($foros as $foro)
              <div class="col-xs-2 col-sm-2 col-md-1  col-md-offset-1 col-lg-1 col-lg-offset-1">
                <br><br><img src="{{URL::to('images/'.$foro->user->foto)}}" width="100%">
              </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 post-preview">
                    <a href="{{url('foros',$foro->id)}}">
                        <h2 class="post-title">
                            {{$foro->titulo}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{$foro->proyecto->curso->curso}} / {{$foro->proyecto->titulo}}
                        </h3>
                    </a>
                    <?php
                        $fecha=Carbon::parse($foro->created_at);
                        switch ($fecha->format('m')) {
                                  case '01': $mes="Ene"; break;
                                  case '02': $mes="Feb"; break;
                                  case '03': $mes="Mar"; break;
                                  case '04': $mes="Abr"; break;
                                  case '05': $mes="May"; break;
                                  case '06': $mes="Jun"; break;
                                  case '07': $mes="Jul"; break;
                                  case '08': $mes="Ago"; break;
                                  case '09': $mes="Sep"; break;
                                  case '10': $mes="Oct"; break;
                                  case '11': $mes="Nov"; break;
                                  case '12': $mes="Dic"; break;
                                  default: $mes=""; break;
                            }
                      ?>
                    <p class="post-meta">Publicado por <a href="#">{{$foro->user->nombres}}, {{$foro->user->apellidos}}</a> {{'el '.$fecha->format('d').' de '.$mes.' de '.$fecha->format('Y').' ~ '.$fecha->format('h:i:s A')}}</p>
                  <hr>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                  <br>
                  {!!Form::open(['route'=>['foros.destroy', $foro->id],'method'=>'DELETE'])!!} 
                    <button class="submit" id="eliminar" title="Eliminar" 
                      style="border-radius: 45%;" 
                      onclick="javascript:return confirmacion();"> 
                    <i class="fa fa-trash">
                      
                    </i></button>
                  {!! Form::close() !!}
                </div>
                @endforeach
                
            </div>
        </div>
    </div>  
    <!--Fin Main Content -->
    </div>
</div>
<!--Fin Cuerpo-->
  
@endsection
@section('script')
  @include('docente.foro-nuevo')
  {!!Html::script('editor/editor.js')!!}
  <script type="text/javascript">
  //TextArea Nuevo
  $(document).ready(function() {
        $("#contenido-n").Editor();
  });
  //Capturar texto con sus estilos Nuevo
  function capturaNuevo(){
    $('#contenido-n').val($("#contenido-n").Editor("getText"));
  }

  //Filtrar por cursos
  $("#xcurso").change(event => {
    console.log("id: ");
        var id=$("#xcurso").val();
        var route="miforo/xcurso/"+id; //La
        var token=$("#token").val();
        $.ajax({
           headers:{'X-CSRF-TOKEN':token},
           url:route,
          success: function(result){
            //console.log(result);
           $('#contenido').html(result);
        //     $('#obs').html(result);
        //     //$('#i-pdf').href("docenteacciones/pdf"+result.id);                 
         }                  
       });
    });
  
//Confirmación
  function confirmacion(msj){
    confirmar = confirm('¿Seguro que deseas eliminar este foro?');
    return confirmar;
  }
  </script>
@endsection

