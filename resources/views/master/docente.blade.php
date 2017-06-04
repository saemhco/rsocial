<?php  
use Carbon\Carbon;
Carbon::setLocale('es');

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Docente::@yield('title')</title>
    <link rel="icon" type="image/png" href="{{url('images/enfermeria_logo2.png')}}" />

    <!-- Bootstrap -->
    {!!Html::style('vendors/bootstrap/dist/css/bootstrap.min.css')!!}
    <!-- Font Awesome -->
    {!!Html::style('vendors/font-awesome/css/font-awesome.min.css')!!}
    <!-- NProgress -->
    {!!Html::style('vendors/nprogress/nprogress.css')!!}
    <!-- iCheck -->
    {!!Html::style('vendors/iCheck/skins/flat/green.css')!!}
    <!-- bootstrap-daterangepicker -->
    {!!Html::style('vendors/bootstrap-daterangepicker/daterangepicker.css')!!}

    <!-- Custom Theme Style -->
    {!!Html::style('build/css/custom.min.css')!!}


    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    @yield('estilos')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{url('docenteproyecto')}}" class="site_title"><i class="fa fa-files-o"></i> <span>Proyectos</span></a>
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
                <li><a href="{{url('docenteproyecto')}}" ><i class="fa fa-file-text">
                    </i> Proyectos <span class="fa fa-circle"></span></a></li>
                  
                <li><a href="{{url('foros')}}"><i class="fa fa-list-alt">
                    </i> Foros <span class="fa fa-circle"></span></a></li>

                <li><a href="{{url('docentencuesta')}}"><i class="fa fa-line-chart">
                    </i> Encuesta <span class="fa fa-circle"></span></a></li>                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Configurar">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Chat">
                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
              </a>
              <a href="{{url('tutorforos')}}" data-toggle="tooltip" data-placement="top" title="Foros">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
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
                    <img src="{{URL::to('images/'.Auth::user()->foto)}}" alt="">
                    <b>Docente</b>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="#"  onclick="editar('{{Auth::user()->id}}')" data-toggle="modal" data-target="#EditarD"><i class="fa fa-cogs pull-right"></i><span>
                    {{Auth::user()->nombres}}</a></li>
                    
                    <li><a href="https://youtu.be/9mVvSxZNCAQ" target="_blank"><i class="fa fa-info pull-right"></i>Ayuda </a></li>
                    <li><a href="{{url('log')}}"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                  </ul>
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
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="EditarD"></div>
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

      //Editar Estudiante
            function editar(ids){
        //var route="http://localhost/tutoria/public/admin/edtutor/"+id;
        var id=ids;
        var route="docente/"+id+"/edit";
        var data={'id':id}; 
        var token=$("#token").val();
        $.ajax({
          headers:{'X-CSRF-TOKEN':token},
          url:route,
          type:'GET',
          success: function(result){
            //console.log(result);
            $('#EditarD').html(result);
          }                  
        });
      }
    </script>
    <!-- /Starrr -->
    @yield('script')
  </body>
</html>