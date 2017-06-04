<!DOCTYPE html>
@include('master.mensajes')
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="icon" type="image/png" href="{{url('images/enfermeria_logo.png')}}" />

        <!-- CSS -->
        <!-- Bootstrap -->
    {!!Html::style('vendors/bootstrap/dist/css/bootstrap.min.css')!!}
    <!-- Font Awesome -->
    {!!Html::style('vendors/font-awesome/css/font-awesome.min.css')!!}
    <style type="text/css">
        input[type="text"], 
        input[type="password"],
        input[type="email"], 
        textarea, 
        textarea.form-control {
            height: 50px;
            margin: 0;
            padding: 0 20px;
            vertical-align: middle;
            background: #f8f8f8;
            border: 3px solid #ddd;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 300;
            line-height: 50px;
            color: #888;
            -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
            -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
            -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
        }

        textarea, 
        textarea.form-control {
            padding-top: 10px;
            padding-bottom: 10px;
            line-height: 30px;
        }

        input[type="text"]:focus, 
        input[type="password"]:focus, 
        textarea:focus, 
        textarea.form-control:focus {
            outline: 0;
            background: #fff;
            border: 3px solid #ccc;
            -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
        }

        input[type="text"]:-moz-placeholder, input[type="password"]:-moz-placeholder, 
        textarea:-moz-placeholder, textarea.form-control:-moz-placeholder { color: #888; }

        input[type="text"]:-ms-input-placeholder, input[type="password"]:-ms-input-placeholder, 
        textarea:-ms-input-placeholder, textarea.form-control:-ms-input-placeholder { color: #888; }

        input[type="text"]::-webkit-input-placeholder, input[type="password"]::-webkit-input-placeholder, 
        textarea::-webkit-input-placeholder, textarea.form-control::-webkit-input-placeholder { color: #888; }


    </style>
    <style type="text/css">
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 100%;
            color: #888;
            line-height: 3px;
            text-align: center;
        }

        strong { font-weight: 500; }

        a, a:hover, a:focus {
            color: #de995e;
            text-decoration: none;
            -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
        }

        h1, h2 {
            margin-top: 0px;
            font-size: 30px;
            font-weight: 100;
            color: #555;
            line-height: 50px;
        }

        h3 {
            font-size: 22px;
            font-weight: 300;
            color: #555;
            line-height: 30px;
        }

        img { max-width: 100%; }

        ::-moz-selection { background: #de995e; color: #fff; text-shadow: none; }
        ::selection { background: #de995e; color: #fff; text-shadow: none; }


        /***** Top content *****/

        .inner-bg {
            padding: 30px 0 30px 0;
        }

        .top-content .text {
            color: #fff;
        }

        .top-content .text h1 { color: #fff; }

        .top-content .description {
            margin: 20px 0 10px 0;
        }

        .top-content .description p { opacity: 0.8; }

        .top-content .description a {
            color: #fff;
        }
        .top-content .description a:hover, 
        .top-content .description a:focus { border-bottom: 1px dotted #fff; }

        .form-box {
            margin-top: 35px;
        }

        .form-top {
            overflow: hidden;
            padding: 0 25px 15px 25px;
            background: #fff;
            -moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0;
            text-align: left;
        }

        .form-top-left {
            float: left;
            width: 75%;
            padding-top: 25px;
        }

        .form-top-left h3 { margin-top: 0; }

        .form-top-right {
            float: left;
            width: 25%;
            padding-top: 5px;
            font-size: 66px;
            color: #ddd;
            line-height: 10px;
            text-align: right;
        }

        .form-bottom {
            padding: 25px 25px 30px 25px;
            background: #eee;
            -moz-border-radius: 0 0 4px 4px; -webkit-border-radius: 0 0 4px 4px; border-radius: 0 0 4px 4px;
            text-align: left;
        }

        .form-bottom form textarea {
            height: 10px;
        }

        .form-bottom form .input-error {
            border-color: #de995e;
        }

        /***** Media queries *****/

        @media (min-width: 992px) and (max-width: 1199px) {}

        @media (min-width: 768px) and (max-width: 991px) {}

        @media (max-width: 767px) {
            
            .inner-bg { padding: 10px 0 10px 0; }

        }

        @media (max-width: 415px) {
            
            h1, h2 { font-size: 32px; }

        }

    </style>     

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>Proyección y Extensión Universitaria</strong></h1>
                            <div class="description">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Iniciar Sesión</h3><br>
                            		<p>Ingrese sus datos</p>
                        		</div>
                        		<div class="form-top-right">
                        			<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                {!! Form::open(['route' => 'log.store', 'method' => 'POST']) !!}
			                    	<div class="form-group">
			                        	<input type="email" name="email" placeholder="Usuario" class="form-username form-control">
			                        </div>
			                        <div class="form-group">
			                        	<input type="password" name="password" placeholder="Contraseña" class="form-password form-control">
			                        </div>
			                        <button type="button" class="btn btn-round btn-default" data-toggle="modal" data-target="#mimodal">Registrarse</button>
                                    <button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Ingresar</button>
			                    {!! Form::close() !!}
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Small modal -->
        <div class="modal fade bs-example-modal-sm" id="mimodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                          <h4 class="modal-title" id="myModalLabel2">Registrarse</h4>
                    </div>
                    <div class="modal-body">
                    {!! Form::open(['route' =>'user.store', 'method' => 'POST', 'class'=>'form-horizontal form-label-left' ]) !!}
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select name='tipo' class='form-control unidad' required="required">
                            <option value=''>Seleccione una opción</option>
                            <option value='1'>Docente</option>
                            <option value='2'>Estudiante</option>
                         </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input required="required" class="form-control" placeholder="Nombres" name="nombres" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input required="required" class="form-control" placeholder="Apellidos" name="apellidos" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          {!!Form::text('dni', null, ['required','maxlength'=>'8','onkeypress'=>'return valida(event)', 'class'=> 'form-control', 'placeholder'=>'DNI'])!!}
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="email" required="required" class="form-control" placeholder="Correo electrotrónico" name="email">
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select name='sexo' class='form-control unidad' required="required">
                            <option value=''>Sexo</option>
                            <option value='1'>Masculino</option>
                            <option value='0'>Femenino</option>
                         </select>
                        </div>
                      </div>    
                    <div class="modal-footer" align="center">
                        <input type="submit" class="btn btn-success" value="Registrar Usuario">
                    </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>                  



        <!-- Javascript -->
        <!-- jQuery -->
    {!!Html::script('vendors/jquery/dist/jquery.min.js')!!}
    <!-- Bootstrap -->
    {!!Html::script('vendors/bootstrap/dist/js/bootstrap.min.js')!!}
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script type="text/javascript">
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
        </script>

    </body>

</html>