<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Error 403</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Redireccionar-->
  <meta http-equiv="Refresh" content="1.5; URL={{url('/')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body { 
      background-color: #1abc9c;
      color: #ffffff;
  }
  #url{
  	color: white;
  }
  </style>
</head>
<body>

<div class="bg-1">
  <div class="container text-center">
  <br><br><br>
  	<h4>error 403</h4>
    <h1><b>Acceso restringido</b></h1><br>
    <img src="{{URL::to('images/restringido.png')}}" class="img-circle}}" alt="Bird" width="250em">
    <br><h2><a href="{{url('/')}}" id="url"> Volver a inicio</a></h2>
  </div>
</div>

</body>
</html>