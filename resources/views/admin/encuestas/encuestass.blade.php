@extends('master.admin')
@section('title','Encuestas')
@section('estilos')
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
  @include('admin.encuestas.encuesta-nuevo')
  <!--Ventana modal de editar-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="EditarEncuesta">
</div>
  <!--FIN Ventana modal de editar-->
<!--Cuerpo-->
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Encuestas <a href="#" class="btn btn-round btn-success" data-toggle="modal" data-target="#NuevaEncuesta">Nuevo</a></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="x_content table-responsive">
                    <table  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Encuesta</th>
                          <th>Fecha</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>


                      <tbody>
                          
                      @foreach($enc as $e)
                        <tr>
                          <td>{{\Carbon\Carbon::parse($e->created_at)->format('Y').'-'.$e->semestre}}</td>
                          <td>{{$e->created_at}}</td>
                          <td>
                          @if($e->estado=='1')
                            {!!Form::open(['route'=>['adminencuesta.update', $e->id], 'method'=>'PUT'])!!} 
                              <input type="hidden" name="estado" value="0">
                              <button class="submit btn btn-success btn-xs"" title="Clic para Desactivar" 
                              onclick="javascript:return conf('Desactivar');"> 
                              Activo</button>
                            {!!Form::close() !!}
                            @else
                            {!!Form::open(['route'=>['adminencuesta.update', $e->id], 'method'=>'PUT'])!!} 
                              <input type="hidden" name="estado" value="1">
                              <button class="submit btn btn-danger btn-xs"" title="Clic para Activar" 
                              onclick="javascript:return conf('Activar');"> 
                              Inactivo</button>
                            {!!Form::close() !!}
                          @endif
                          </td>
                          <td>
                            <a href="{{url('excel',$e->id)}}" title="Descargar Excel" style="color: green; font-size:2em; padding-right: 4px;"><i id="ico-plus" class="fa fa-file-excel-o"></i></a>
                            <a href="#" title="Editar nombre" style="color: blue; font-size:2em; padding-left: 10px;"><i id="ico-plus" class="fa fa-pencil-square-o" onclick="editarencuesta('{{$e->id}}');" data-toggle="modal" data-target="#EditarEncuesta"></i></a>
                          </td>
                        </tr>    
                      @endforeach
                      </tbody>
                    </table>
      </div>


<script type="text/javascript">
    function conf(msj){
    confirmar = confirm('¿Seguro que deseas '+msj+' esta encuesta?');
    return confirmar;
  }
  
</script>

    </div>
  </div>
</div>
<!--Fin Cuerpo-->

@endsection
@section('script')
  @include('master.extras.tablasScript')
  <script type="text/javascript">
    function editarencuesta(ids){
    //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="adminencuesta/"+id+"/edit";
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',
          success: function(result){
            //console.log(result);
            $('#EditarEncuesta').html(result);
          }                  
        });
  }
  </script>
 
@endsection