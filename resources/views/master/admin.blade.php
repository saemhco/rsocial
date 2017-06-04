<!DOCTYPE html>
<?php  
use Carbon\Carbon;
Carbon::setLocale('es');

  $consulta=\App\User::where('solicitud','1')->where('estado','0')
            ->select(DB::raw('count(*) as cont'))->first();
  $nSolicitudes=$consulta->cont;
  if($nSolicitudes>0){
    $solicitudes=\App\User::where('solicitud','1')
            ->where('estado','0')->orderBy('id','=','DESC')->paginate(5);
  }
?>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AdminTV :: @yield('title')</title>
    <link rel="icon" type="image/png" href="{{url('images/enfermeria_logo.png')}}" />

    <!-- Bootstrap -->
    {!!Html::style('vendors/bootstrap/dist/css/bootstrap.min.css')!!}
    <!-- Font Awesome -->
    {!!Html::style('vendors/font-awesome/css/font-awesome.min.css')!!}
    <!-- NProgress -->
    {!!Html::style('vendors/nprogress/nprogress.css')!!}
    <!-- Custom Theme Style -->
    {!!Html::style('build/css/custom.min.css')!!}
    <!-- iCheck -->
    {!!Html::style('vendors/iCheck/skins/flat/green.css')!!}
    @yield('estilos')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{url('admin')}}" class="site_title"><i class="fa fa-users"></i> <span>Proyectos</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{URL::to('images/'.Auth::user()->foto)}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>{!!Auth::user()->nombres.' '.Auth::user()->apellidos!!}</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <!-- <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li> -->
                  <li><a href="{{url('admindocentes')}}"><i class="fa fa-user"></i> Docentes <span class="fa fa-circle"></span></a>
                  </li>
                  <li><a href="{{url('adminestudiantes')}}"><i class="fa fa-graduation-cap"></i> Estud <span class="fa fa-circle"></span></a>
                  </li>
                  <li><a href="{{url('adminproyectos')}}"><i class="fa fa-file-text-o"></i> Proyectos <span class="fa fa-circle"></span></a>
                  </li>
                  <li><a href="{{url('solicitudes')}}"><i class="fa fa-users"></i> Solicitudes <span class="fa fa-circle"></span></a>
                  </li>
                  <li><a href="{{url('adminencuesta')}}"><i class="fa fa-line-chart">
                    </i> Encuesta <span class="fa fa-circle"></span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a href="{{url('log')}}" data-toggle="tooltip" data-placement="top" title="Cerrar Sesión">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
          @include('master.mensajes')
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{URL::to('images/'.Auth::user()->foto)}}" alt="">{!!Auth::user()->nombres!!}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="#" data-toggle="modal" data-target="#EditarAdmin" onclick="cargarModalAdmin('{{Auth::user()->id}}')" >
                        <i class="fa fa-cogs pull-right"></i>
                        <span>Configuraciones</span>
                      </a>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#ayuda"><i class="fa fa-info pull-right"></i>Ayuda </a></li>
                    <li><a href="{{url('log')}}"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false" title="solicitudes">
                    <i class="fa fa-users"></i>
                    <!--Numero de mensajes-->
                    @if($nSolicitudes>0)
                    <span class="badge bg-green">{{$nSolicitudes}}</span>
                    
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    @foreach($solicitudes as $s)
                    <li>
                      <a href="{{url('solicitudes')}}">
                        <span class="image"><img src="{{URL::to('images/'.$s->foto)}}" alt="Profile Image" /></span>
                        <span>
                          @if($s->tipo=='1')
                            <span><u>Docente:</u> </span>
                          @elseif($s->tipo=='2')
                            <span><u>Estudiante:</u> </span>
                          @endif
                          <span>{{$s->nombres}}, {{$s->apellidos}}</span>
                        </span>
                        <span class="message">
                          DNI. {{$s->dni}}
                        </span>
                        <span class="time">{{Carbon::parse($s->created_at)->diffForHumans()}}</span><br>
                      </a>
                    </li>
                    @endforeach
                    <li>
                      <div class="text-center">
                        <a href="{{url('solicitudes')}}">
                          <strong>Ver todas las solicitudes</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                    @else
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                      <li>
                      <div class="text-center">
                        <a href="{{url('solicitudes')}}">
                          <strong>No hay solicitudes</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                    </ul>
                    @endif
                </li>
                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="row">

               @yield('contenido')

            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Facultad de enfermería <a href="https://colorlib.com"> - UNHEVAL</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    @include('master.editar.edadmin')
    @include('master.extras.ayuda')
    <!-- jQuery -->
    {!!Html::script('vendors/jquery/dist/jquery.min.js')!!}
    <!-- Bootstrap -->
    {!!Html::script('vendors/bootstrap/dist/js/bootstrap.min.js')!!}
    <!-- FastClick -->
    {!!Html::script('vendors/fastclick/lib/fastclick.js')!!}
    <!-- NProgress -->
    {!!Html::script('vendors/nprogress/nprogress.js')!!}
    <!-- Custom Theme Scripts -->
    {!!Html::script('build/js/custom.min.js')!!}
    <!-- iCheck -->
    {!!Html::script('vendors/iCheck/icheck.min.js')!!}

    <script type="text/javascript">
      //Solo permita números
      function valida(e){
          tecla = (document.all) ? e.keyCode : e.which;

          //Tecla de retroceso para borrar, siempre la permite
          if (tecla==8){
              return true;
          }
              
          // Patron de entrada, en este caso solo acepta numeros
          patron =/[0-9]/;
          tecla_final = String.fromCharCode(tecla);
          return patron.test(tecla_final);
      }
            function cargarModalAdmin(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        //var route="tutored/edtutor/"+id;
        var route="admin/"+id+"/edit";
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',

          success: function(result){
            console.log(result);
            $('#ea_nombres').val(result.nombres);
            $('#ea_apellidos').val(result.apellidos);
            $('#ea_email').val(result.email);     
          }                  
        });
      }
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
    @yield('script')
  </body>
</html>