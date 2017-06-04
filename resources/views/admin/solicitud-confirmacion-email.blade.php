<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>correo</title>
   <style>

   .titulo {
    color: #1e80b6;
    padding-top: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
    }

    .body{
     background-color: #ECECEC;	
    }
    #cuenta{
        background-color: black;
        margin-left: 2em;
        margin-right: 2em;
        width: 70%;
        border-radius: 20px;
    }
    #dato{
        color: white;
        margin-left: 2em;
        font-size: 20px;
        padding-bottom: 13px;
        padding-top: 13px;

    }


    #postcontenido{
    color: black;
    padding-top: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
    font-size: 17px;
   }

   </style>

</head> 

<body class="body">

<div class="titulo" > <h2>Proyección y Extensión Universitaria. Enfermería-UNHEVAL
</h2>
<span>Hola {!!$nombres!!}, Se ha registrado correctamente a la plataforma, puede ingresar usando los siguientes datos</span>
<hr>
<div id="cuenta" ><p id="dato"> {!!$contenido!!}</p></div>
<hr>
<div id="postcontenido" > Puedes ingresar <a href="http://www.proyectosenfermeria.com">aquí</a> <br>
<i style="font-size: 15px;">Se le ha proporcionado una contraseña temporal, por seguridad recomendamos cambie periódicamente</i>
</div>
<br><br><p>
<img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQOhSU00eQWygEkrgJQHk4tiIuYZ17NdrI62w-oN_tGlE6KrqNi8Q" width="180px;">
<br>
<i>Facultad de Enfermería-UHEVAL</i>

</p>


	
</body>
</html>