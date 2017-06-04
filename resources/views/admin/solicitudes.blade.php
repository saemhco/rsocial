@extends('master.admin')
@section('title','Solicituds')
@section('estilos')
  @include('master.extras.tablasEstilos')
    <style>
      #eliminar{
        color: red;
        opacity: 0.4;
        font-size: 1.6em;
        transition: 0.5s;
      }
      #eliminar:hover{
        opacity: 1;
      }
      #editar{
        color: green;
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
    </style>
@endsection
@section('contenido')
<!-- Small modal-Editar -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="EditarE"></div>
<!--Cuerpo-->
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b> Solicitudes </b><a href="#" data-toggle="modal" data-target="#NuevoEstudiante"
                    title="Nuevo"><i id="ico-plus" class="fa fa-plus-circle"></i></a></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content table-responsive">
                    <table  id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>DNI</th>
                          <th>Tipo</th>
                          <th>Nombres y Apellidos</th>
                          <th>E-mail</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>


                      <tbody>
                        @foreach($users as $u)
                          <tr>
                          <td>{{$u->dni}}</td>
                            @if($u->tipo=='1')
                            <td>Docente</td>
                            @elseif($u->tipo=='2')
                            <td>Estudiante</td>
                            @else
                            <td>Usuario no definido</td>
                            @endif
                          <td>{{$u->nombres}}, {{$u->apellidos}}</td>
                          <td>{{$u->email}}</td>
                          
                         
                          <td align="center">
                        
                        {!!Form::open(['route'=>['solicitudes.destroy', $u->id], 'method'=>'DELETE'])!!} 
                        <a href="{{url('solicitud',$u->id)}}" id="editar" title="Aceptar"
                           style="border-radius: 45%;" onclick="javascript:return confirmacion('Aceptar');">
                          <i class="fa fa-check-square-o"></i>
                        </a>
                          &nbsp;
                         <button class="submit" id="eliminar" title="Eliminar" 
                           style="border-radius: 45%;" 
                            onclick="javascript:return confirmacion('Eliminar');"> 
                          <i class="fa fa-trash"></i></button>
                        {!!Form::close() !!}

                          </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
<!--Fin Cuerpo-->

@endsection
@section('script')
  @include('master.extras.tablasScript')
  <script type="text/javascript">
//Editar tutor
      function editar(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="adminestudiantes/"+id+"/edit";
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',
          success: function(result){
            console.log(result);
            $('#EditarE').html(result);
          }                  
        });
      }
      //Confirmación
  function confirmacion(msj){
    confirmar = confirm('¿Seguro que deseas '+msj+' esta solicitud?');
    return confirmar;
  }    
  </script>
@endsection