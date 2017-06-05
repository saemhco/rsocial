<?php 
  if ($p->tipo=='1') {
    $tipo="Proyección Social";
  }else{
    $tipo="Extensión Universitaría";
  }
?>
<html>
  <head>
    <title>Reporte</title>
    <meta http-equiv="Content-Type" content="text/html;">
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <style>
      @page { margin: 120px 40px 85px 40px;/*ejes: arriba, derecha, abajo, izquierda*/}
      #header { position: fixed; left: 0px; top: -115px; right: 0px; height: 115px; /*background-color: blue;*/ }
      #footer { position: fixed; left: 0px; bottom: -90px; right: 0px; height: 50px; /*background-color: lightblue;*/ font-style: italic;}
      #footer .page:after { content: counter(page, upper-arabic); /*cambiar arabic por roman si se quiere numeros romanos*/ }

      /*Tablas*/
      .tth{font-size:16px;font-weight:normal;background:#e8edff; padding:8px;}
      .ttd{font-size:14px;padding: 8px;}
      .h-img{
        margin-top: 20px;
      }
      p{
        margin:5px;
        margin-left: 15px;
      }


    </style>
</head>
<body>
  <div id="header">
    <table width="100%">
      <tr align="left">
        <td><img src="images/unheval_logo.jpg" height="70px" class="h-img"></td>
        <td align="center">
          <h3 style="font-size: 18px; margin-bottom:0;">UNIVERSIDAD NACIONAL "HERMILIO VALDIZÁN"</h3>
          <p style="margin-bottom:0;"><b>FACULTAD DE ENFERMERÍA</b></p>
          <p style="font-size: 15px;margin-bottom:0;"><b>{{$tipo}}</b></p>
        </td>
      <td align="right"><img src="images/enfermeria_logo.png" height="60px;" class="h-img"></td>
      </tr>
    </table>
      <hr width="80%">
  </div>
  <div id="footer">
    <p class="page" style="border-top: 1px solid;" align="right">{{$date}}
    @for($i=0;$i<8;$i++)
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @endfor
    Página</p>
  </div>
  <div id="content" style="margin-left: 30px; margin-right: 30px;">

    <h2 align="center" style="font-size: 20px; font-family: fantasy;">{{$p->titulo}}</h2><br>

    <!--1.DATOS GENERALES-->
    <p><b>Resolución de aprobación del Proyecto: </b> {{$p->resolucion_proyecto}}</p>
    <p><b>Resolución de aprobación del Informe General: </b>{{$p->resolucion_informe}}</p>

    <p>
      <b>Semestre:</b> {{$p->semestre}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>Ciclo:</b> {{$p->ciclo}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>Sección:</b> {{$p->seccion}}
    </p>
  <p><b>Tutor: </b> {{$p->docente->user->nombres}}, {{$p->docente->user->apellidos}}</p>
    <p><b>Estudiantes: </b> 
         @foreach($estudiantes as $e)
            <ul>
              <li style="margin-bottom: -10px; margin-left: 15px;">{{$e->nombres.", ".$e->apellidos}}</li>
            </ul>
         @endforeach
    </p>
    <p><b>% Avance: </b> {{$p->porcentaje}}</p>
    <p><b>Lugar: </b> {{$p->lugar}}</p><br>
    <p><b>Beneficiarios: </b> {{$p->beneficiarios}}</p><br>
    <p><b>Satisfacción de los involucrados: </b> {{$satisfaccionInvolucrados[$p->satisfacion_involucrados]}}</p><br>
    <p><b>Grupo de interés: </b>{!!$p->grupo_interes!!}</p><br>
    <p><b>Objetivos: </b><br>{!!$p->objetivos!!}</p><br>
    <p><b>Justificación: </b><br>{!!$p->justificacion!!}</p><br>
    <p><b>Logros (indicadores): </b><br>{!!$p->logros!!}</p><br>
    <p><b>Dificultades: </b><br>{!!$p->dificultades!!}</p><br>
    <p><i><b>Obs: </b><br>{!!$p->obs!!}</i></p>
    
    <!-- FIN DATOS GENERALES-->
    <br>

  </div>
  </body>
</html>