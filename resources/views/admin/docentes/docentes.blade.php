@extends('master.admin')
@section('title','Docente')
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
@include('admin.docentes.nuevo-docente')
@include('admin.docentes.eliminar-docente')
<!-- Small modal-Editar -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="EditarDocente"></div>
<!--Cuerpo-->
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Tutores </b><a href="#" data-toggle="modal" data-target="#NuevoDocente"
                    title="Nuevo"><i id="ico-plus" class="fa fa-plus-circle"></i></a></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content table-responsive">
                    <table  id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>DNI</th>
                          <th>Nombres y Apellidos</th>
                          <th>E-mail</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>


                      <tbody>
                        @foreach($docentes as $d)
                          <tr>
                          <td>{{$d->dni}}</td>
                          <td>{{$d->nombres}}, {{$d->apellidos}}</td>
                          <td>{{$d->email}}</td>
                         <td>{{$d->estado}}</td>
                          <td>
                            <a 
                              href="#" onclick="editar('{{$d->id}}')" id="editar" data-toggle="modal" data-target="#EditarDocente" ><i class="fa fa-pencil-square-o" title="Editar" ></i>
                              <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"> 
                            </a>
                            <a href="#" onclick="eliminar('{{$d->id}}')" id="eliminar" title="Eliminar" data-toggle="modal" data-target="#eliminar"><i class="fa fa-trash"></i>
                            </a>
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
        var route="admindocentes/"+id+"/edit";
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',
          success: function(result){
            console.log(result);
            $('#EditarDocente').html(result);
          }                  
        });
      }
      function eliminar(ids){
        var id=ids;
        document.getElementById("eliminar-d").href = "admindocente/eliminar/"+id;
      }    
  </script>
@endsection