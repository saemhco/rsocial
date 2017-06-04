@extends('master.docente')
@section('title','Proyectos')
@section('estilos')
  {!!Html::style('select2-4.0.3/dist/css/select2.min.css',['rel'=>'stylesheet'])!!}
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
    </style>
@endsection
@section('contenido')
<!--Cuerpo-->

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Mis Proyectos </b><a href="{{route('docenteproyecto.create')}}" title="Nuevo"><i id="ico-plus" class="fa fa-plus-circle"></i></a></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content table-responsive">
                    <table  id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Fecha</th>
                          <th>Título</th>
                          <th>Curso</th>
                          <th>%</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>


                      <tbody>
                      @foreach($proyectos as $p)
                        <tr>
                          <td>{{$p->created_at}}</td>
                          <td>{{$p->titulo}}</td>
                          <td>{{$p->curso->curso}}</td>
                          <td>{{$p->porcentaje}}</td>
                          <td>
                              <ul id="accion">
                                <li>
                                <label data-toggle="tooltip" title="descargar archivo">
                                  <a href="#" onclick="descargar('{{$p->id}}','{{$p->titulo}}')"
                                   id="editar"  data-toggle="modal" data-target="#descargar" >
                                  <i class="fa fa-download"></i>
                                  </a>
                                </label>
                                </li>

                                <li>
                                <label data-toggle="tooltip" title="Subir archivo">
                                  <a href="#" onclick="subir('{{$p->id}}','{{$p->titulo}}')" 
                                   id="editar"  data-toggle="modal" data-target="#subir" >
                                    <i class="fa fa-upload"></i>
                                  </a>
                                </label>
                                </li>

                                <li>
                                 <label data-toggle="tooltip" title="Modificar integrantes">
                                 <a href="#" onclick="integrantes('{{$p->id}}','{{$p->titulo}}')" id="editar" data-toggle="modal" data-target="#Integrantes"  >
                                 <i class="fa fa-users"></i>
                                  </a>
                                </label>
                                </li>
                                <li>
                                <label data-toggle="tooltip" title="Editar proyecto">
                                <a href="{{route('docenteproyecto.edit',$p->id)}}" id="editar" >
                                   <i class="fa fa-file-text"></i>
                                </a>
                                </label>
                                </li>
                                <li>
                                <label data-toggle="tooltip" title="Información">
                                <a href="#" id="editar"  data-toggle="modal" data-target="#informacion" onclick="informacion('{{$p->id}}')" >
                                   <i class="fa fa-info"></i>
                                </a>
                                </label>
                                </li>
                                <li>
                                <label data-toggle="tooltip" title="Revición / Observación">
                                <a href="#" onclick="obs('{{$p->id}}')" id="editar"  data-toggle="modal" data-target="#obs" >
                                   <i class="fa fa-search"></i>
                                </a>
                                </label>
                                </li>
                                <li>
                                <label data-toggle="tooltip" title="Eliminar">
                                <a href="{{url('documentoeliminar',$p->id)}}" id="eliminar" onclick="javascript:return confirmacion();">
                                   <i class="fa fa-times-circle"></i>
                                </a>
                                </label>
                                </li>
                              </ul>
                          </td>
                        </tr>
                        @endforeach()
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
<!--Fin Cuerpo-->
  @include('docente.acciones.descargar-modal')
  @include('docente.acciones.subir-modal')
  <div class="modal fade bs-example-modal-sm in" tabindex="" role="dialog" aria-hidden="true" id="Integrantes" ></div>
  <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-hidden="true" id="informacion"></div>
  <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-hidden="true" id="obs"></div>

  
@endsection
@section('script')
  @include('master.extras.tablasScript')


  <script type="text/javascript">

//Informacion
      function informacion(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="docenteproyecto/"+id; //La ruta es Show
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',

          success: function(result){
            //console.log(result.objetivos);
            $('#informacion').html(result);              
          }                  
        });
      } 

      function descargar(ids,t){
        var id=ids;
        var titulo=t;
        var route="docenteacciones/descargar/"+id; //La ruta 
        var data={'id':id};
        var token=$("#token").val();
         $.ajax({
                headers:{'X-CSRF-TOKEN':token},
                data:  data,
                url:   route,
                beforeSend: function () {
                        $("#datos").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        //console.log(response);
                        $("#datos").html(response);
                        $("#titulo-d").html(titulo);
                }
        });
      }

      function subir(ids,t){
        var id=ids;
        var titulo=t;
        var route="docenteacciones/subir/"+id; //La ruta 
        var token=$("#token").val();
         $.ajax({
                headers:{'X-CSRF-TOKEN':token},
                url:   route,
                beforeSend: function () {
                        $("#datos-subir").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        //console.log(response);
                $("#datos-subir").html(response);
                $("#proyecto").val(id);
                $("#titulo-s").html(titulo);
                }
        });
        
      }

      function integrantes(ids,t){
        var id=ids;
        var titulo=t;
        var route="docenteacciones/integrantes/"+id; //La ruta 
        var token=$("#token").val();
         $.ajax({
                headers:{'X-CSRF-TOKEN':token},
                url:   route,
                beforeSend: function () {
                        $("#Integrantes").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        //console.log(response);
                $("#Integrantes").html(response);
                $("#titulo-i").html(titulo);
                $("#estudiante").select2({});
                $("#estudiant").select2({});
                }
        });
        
      } 

      function obs(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="docenteacciones/obs/"+id; //La ruta es Show
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',

          success: function(result){
            //console.log(result.objetivos);
            $('#obs').html(result);
            //$('#i-pdf').href("docenteacciones/pdf"+result.id);                 
          }                  
        });
      }
    function confirmacion(msj){
      confirmar = confirm('¿Seguro que desea Eliminar permanentemente este Proyecto?');
      return confirmar;
    }
  </script>

  <!--Scripts Select2-curso-->
  {!!Html::script('select2-4.0.3/dist/js/select2.js')!!}
 
@endsection