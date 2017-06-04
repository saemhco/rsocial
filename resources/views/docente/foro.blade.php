<?php 
use Carbon\Carbon;
Carbon::setLocale('es');

//Funcion formatear fecha AMiEstílo
  function FormFecha($texto,$tipo) {
    $fecha=Carbon::parse($texto);
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
   $fechaFormateada= $fecha->format('d').' de '.$mes.' de '.$fecha->format('Y').' ~ '.$fecha->format('h:i:s A');
   switch ($tipo) {
      case 'todo': return $fechaFormateada; break;
      case 'mes': return $mes; break;
      default: return "Segundo argumento no válido"; break;
    }             
  
  }
?>
@extends('master.docente')
@section('title','Foro')
@section('estilos')
<style type="text/css">

h2, h3{
  font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-weight: 800;
  color: #0085A1;
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
.post-title {
  font-size: 2.8em;
  margin-top: 30px;
  margin-bottom: 10px;
}
.post-subtitle {
  margin: 0;
  font-size: 2.5em;
  font-weight: 300;
  margin-bottom: 10px;
}
.post-meta {
  color: #777777;
  font-size: 1.1em;
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

 #texto{
  font-size: 1.3em;
  color: black;
 }
 #tiempo{
  font-size: 0.8em;
  font-style: italic;
 }
 #img-res{
  text-align: right;
  box-shadow: 0 0 8px rgba(0, 0, 0, 1);
  border-radius: 100px;
 }


</style>

@endsection
@section('contenido')

<!--Cuerpo-->
<div class="col-md-12">
	<div class="x_panel">
	<!-- Main Content -->
    <div class="container">
        <div class="row">
        	<!-- -Xs pequeños móviles, sm moviles, md tablets y pcs, lg pcs grandes
        		 -offset-4 : desplazar 4 espacios, es como columna vacia -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            	
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 post-preview">
                        <h2 class="post-title" align="center">{{$foro->titulo}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{$foro->proyecto->curso->curso}} / {{$foro->proyecto->titulo}}
                        </h3>
                    <p class="post-meta">Publicado por <a href="#">{{$foro->user->name}}</a> el {{FormFecha($foro->created_at,"todo")}}</p>
                	<hr>
                </div>
                
                <!-- Texto/Contenido del foro -->
                {!!$foro->contenido!!}

                <!-- Archivo -->
                @if($foro->archivo!="")
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <a href="{{url('storage',$foro->archivo)}}" style="color: blue;">
                  <i class="fa fa-download"></i> Descargar archivo
                  </a>
                  <br><br>
                </div>
                @endif
                    
                </div>
            </div>
        </div>
    </div>	
    <!--Fin Main Content -->
    </div>
</div>

<!--Respuestas/comentarios-->
<div class="col-md-12">
  <div class="x_panel">
  <!-- Main Content -->
    <div class="container">
        <div class="row">
          <!-- -Xs pequeños móviles, sm moviles, md tablets y pcs, lg pcs grandes
             -offset-4 : desplazar 4 espacios, es como columna vacia -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2><u>Comentarios</u> <a href="#comentario"><i id="ico-plus" class="fa fa-plus-circle"></i></a></h2>
            </div>
            @foreach($comentarios as $comentario)
            <?php $fechaCom=Carbon::parse($comentario->created_at);?>
            <!--Principio-->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div id="graph_donut" style="width:100%; height:100%;" >
                      <!-- end of user messages -->
                        <ul class="messages">
                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" >
                              <img src="{{url('images/'.$comentario->user->foto)}}" alt="Avatar" width="100%" id="img-res">
                            </div>
                            <div class="message_wrapper col-xs-10 col-sm-10 col-md-10 col-lg-10">
                              <h4 class="heading">{{$comentario->user->nombres}}, {{$comentario->user->nombres}}
                                  <small>[DNI. {{$comentario->user->dni}}]</small>
                              </h4>
                              <blockquote class="message" style="color: black; font-family: Verdana, Geneva, sans-serif;" ALIGN="justify">
                                {{$comentario->respuesta}}
                                <p id="tiempo">
                                  <i class="fa fa-clock-o"></i>
                                      {{$fechaCom->diffForHumans()}}
                                    <?php 
                                    $rutaResp='#resp'.$comentario->id;
                                    $idResp='resp'.$comentario->id;
                                    ?>
                                    <a href="{{$rutaResp}}" style="color: blue; ">[Responder]</a>
                                </p>
                              </blockquote>
                            </div>
                            <div class="message_date col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            
                              <br>
                              <h3 class="date text-info" align="center">{{$fechaCom->format('d')}}</h3>
                              <p class="month">{{FormFecha($comentario->created_at,"mes")}}, {{$fechaCom->format('Y')}}</p>
                            </div>
                        </ul>
                        <!-- end of user messages -->
                    </div>
                </div>
              </div>
            <!--Fin-->  
            @endforeach
            <div class="item form-group">
              <!--Nuevo comentario-->
              <div class="col-md-11 col-sm-11 col-xs-11" style="background-color: #F5F6CE; border-radius: 10px;">
                  <small><h2> Comentar</h2></small>
                  <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" >
                              <img src="{{url('images/'.Auth::user()->foto)}}" alt="Avatar" width="100%" id="img-res">
                  </div>
                  {!! Form::open(['url'=>'miforo/frespuesta', 'method' => 'POST', 'class'=>'form-horizontal form-label-left' ]) !!}
                    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11" >
                    <textarea id="comentario" name="comentario" class="form-control" style="background-color: #F5F6CE; font-size: 1.5em; color: #0A2A29; font-family: Verdana, Geneva, sans-serif;"></textarea><br>
                    </div>
                    <div align="right">
                      <input type="hidden" class="btn btn-success" name="idforo" 
                              value="{{$foro->id}}">
                      <input type="submit" class="btn btn-success" value="Enviar" >
                    </div>
                  {!! Form::close() !!}
                </div>
                <!--Fin de comentario-->
            </div>     
        </div>
    </div>
  </div>
</div>        
<!--Fin Respuestas/comentarios-->

    
@endsection
@section('script')
@endsection