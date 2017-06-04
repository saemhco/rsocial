@extends('master.estudiante')
@section('title','Encuestas')
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
      <h2>Responder encuesta: </h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
     {!! Form::open(['route' => 'estudiantencuesta.store', 'method' => 'POST', 'class'=>'form-horizontal form-label-left']) !!} 

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <label>Cursos que realiza</label>
                {!!Form::select('cursos[]',$cursos,null,['required','id'=>'cursos','multiple'=>'multiple','class'=>'form-control unidad','style'=>'width: 100%'])!!}
                </div>
              </div>
              <br>
              <h3 align="center"><u>1. Campus responsable</u></h3><br>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <label>
                  1. En la Facultad las relaciones interpersonales son en general de respeto y cordialidad.
                </label>
                {!!Form::select('ee_i_i',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div>
              <hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <label>2. Percibo que hay un buen clima laboral entre los trabajadores de la Facultad.</label>
                {!!Form::select('ee_i_ii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>3. Entre profesores y estudiantes hay un trato de respeto y colaboración.</label>
                  {!!Form::select('ee_i_iii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>4. No percibo discriminación por género, raza, nivel socioeconómico u orientación política o sexual.</label>
                  {!!Form::select('ee_i_iv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>5. Hay equidad de género en el acceso a los puestos directivos.</label>
                  {!!Form::select('ee_i_v',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>6. Me siento escuchado como ciudadano, puedo participar en la vida institucional.</label>
                  {!!Form::select('ee_i_vi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>7. La Facultad está organizada para recibir a estudiantes con necesidades</label>
                  {!!Form::select('ee_i_vii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>8. La Facultad toma medidas para la protección del medio ambiente en el campus.</label>
                  {!!Form::select('ee_i_viii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>9.   He adquirido hábitos ecológicos desde que estoy en la Facultad.</label>
                {!!Form::select('ee_i_ix',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>10. Percibo que el personal de la Facultad recibe una capacitación y directivas para el cuidado del medio ambiente en el campus.</label>
                {!!Form::select('ee_i_x',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>11. Los procesos para elegir a las autoridades son transparentes y democráticos.</label>
                {!!Form::select('ee_i_xi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>12. Las autoridades toman las grandes decisiones en forma democrática y consensuada.</label>
                 {!!Form::select('ee_i_xii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>13. Los estudiantes tienen una participación adecuada en las instancias de gobierno.</label>
                 {!!Form::select('ee_i_xiii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>14. En la Facultad reina la libertad de expresión y participación para todo el personal docente, no docente y estudiantes.</label>
                 {!!Form::select('ee_i_xiv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>15. Se me informa de modo transparente acerca de todo lo que me concierne y afecta en la Facultad.</label>
                 {!!Form::select('ee_i_xv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>16. Los mensajes publicitarios que difunde la Facultad son elaborados con criterios éticos y de responsabilidad  social.</label>
                 {!!Form::select('ee_i_xvi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>17. La Facultad nos invita a mantener buenas relaciones con las demás facultades y universidades con las cuales compite.</label>
                 {!!Form::select('ee_i_xvii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>18. La Facultad busca utilizar sus campañas de marketing para promover valores y temas de responsabilidad social.</label>
                 {!!Form::select('ee_i_xviii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              
              <!-- ............................................................. -->

              <h3 align="center"><u>2. Formación profesional y ciudadana</u></h3> <br>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>1.  La Facultad me brinda una formación ética y ciudadana que me ayuda a ser una persona socialmente responsable.</label>
                 {!!Form::select('ee_ii_i',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>2. Mi formación es realmente integral, humana y profesional.</label>
                 {!!Form::select('ee_ii_ii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>3. Mi formación me permite ser un ciudadano informado acerca de los riesgos y alternativas ecológicas al desarrollo actual.</label>
                 {!!Form::select('ee_ii_iii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>4. Mi formación me permite ser un ciudadano activo en defensa del medio ambiente.</label>
                 {!!Form::select('ee_ii_iv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>5. Los diversos cursos que llevo en mi formación están actualizados y responden a necesidades sociales de mi entorno.</label>
                 {!!Form::select('ee_ii_v',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>6. Dentro de mi formación he tenido la oportunidad de relacionarme cara a cara con la pobreza.</label>
                 {!!Form::select('ee_ii_vi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>7. Dentro de mis cursos he tenido la oportunidad de participar en proyectos sociales fuera de la universidad.</label>
                 {!!Form::select('ee_ii_vii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>8. Mis profesores vinculan sus enseñanzas con los problemas sociales y ambientales de la actualidad.</label>
                 {!!Form::select('ee_ii_viii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>9. Dentro de mi formación tengo la posibilidad de conocer a especialistas en temas de desarrollo social y ambiental.</label>
                 {!!Form::select('ee_ii_ix',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>10. Dentro de mis cursos he tenido la oportunidad de hacer investigación aplicada a la solución de problemas sociales y/o ambientales.</label>
                 {!!Form::select('ee_ii_x',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
               <!-- ............................................................. -->
              <h3 align="center"><u>3. Participación social</u></h3><br>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>1. Percibo que mi Facultad se preocupa por los problemas sociales y quiere que los estudiantes seamos agentes de desarrollo.</label>
                 {!!Form::select('ee_iii_i',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>2. Percibo que mi Facultad mantiene contacto estrecho con actores clave del desarrollo social (Estado, ONG, organismos internacionales, empresas).</label>
                 {!!Form::select('ee_iii_ii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>3. La Facultad brinda a sus estudiantes y docentes oportunidades de interacción con diversos sectores sociales.</label>
                 {!!Form::select('ee_iii_iii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>4. En mi Facultad se organizan muchos foros y actividades en relación con el desarrollo, los problemas sociales y ambientales.</label>
                 {!!Form::select('ee_iii_iv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>5.  Existe en la Facultad una política explícita para no segregar el acceso a la formación académica a grupos marginados (población indígena, minoría racial, estudiantes de escasos recursos, etc.) a través de becas de estudios u otros medios.</label>
                 {!!Form::select('ee_iii_v',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>6. En mi Facultad existen iniciativas de voluntariado y la universidad nos motiva a participar de ellos.</label>
                 {!!Form::select('ee_iii_vi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>7. En el transcurso de mis estudios he podido ver que asistencialismo y desarrollo están poco relacionados.</label>
                 {!!Form::select('ee_iii_vii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>8. Desde que estoy en la Facultad he podido formar parte de grupos y/o redes con fines sociales o ambientales organizados o promovidos por mi Facultad.</label>
                 {!!Form::select('ee_iii_viii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>9. Los estudiantes que egresan de mi Facultad han recibido una formación que promueve su sensibilidad social y ambiental.</label>
                 {!!Form::select('ee_iii_ix',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>10. En el transcurso de mi vida estudiantil he podido aprender mucho sobre la realidad nacional y los problemas sociales de mi país.</label>
                 {!!Form::select('ee_iii_x',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>11. El proyecto necesita de la aplicación de conocimientos especializados para llevarse a cabo</label>
                 {!!Form::select('ee_iii_xi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>12. El proyecto es fuente de nuevos conocimientos.</label>
                 {!!Form::select('ee_iii_xii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>13. El proyecto da lugar a publicaciones (especializadas y/o de divulgación).</label>
                 {!!Form::select('ee_iii_xiii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>14. El proyecto da lugar a capacitaciones específicas para beneficio de sus actores universitarios y no universitarios.</label>
                 {!!Form::select('ee_iii_xiv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>15. El proyecto permite que sus actores comunitarios integren conocimientos especializados a su vida cotidiana.</label>
                 {!!Form::select('ee_iii_xv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>16. El proyecto es fuente de nuevas actividades académicas y aprendizaje significativo para asignaturas de diversas carreras.</label>
                 {!!Form::select('ee_iii_xvi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>17. El proyecto permite a docentes practicar el aprendizaje basado en proyectos en sus cátedras.</label>
                 {!!Form::select('ee_iii_xvii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>18. El proyecto involucra a actores externos en la evaluación de los estudiantes.</label>
                 {!!Form::select('ee_iii_xviii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>19. El proyecto permite mejorar la vida cotidiana de sus actores y/o desarrollar sus capacidades.</label>
                 {!!Form::select('ee_iii_xix',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>20. El proyecto sigue reglas éticas explícitamente formuladas y vigiladas por sus actores (código de ética, comité de ética, reportes financieros transparentes).</label>
                 {!!Form::select('ee_iii_xx',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>21. El proyecto difunde periódicamente sus alcances y resultados a la comunidad universitaria y los socios externos en forma efectiva.</label>
                 {!!Form::select('ee_iii_xxi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>22. El proyecto da lugar a nuevos aprendizajes y proyectos a través de la comunicación de sus buenas prácticas y errores.</label>
                 {!!Form::select('ee_iii_xxii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>23. El proyecto es reconocido por la universidad y otras  instituciones.</label>
                 {!!Form::select('ee_iii_xxiii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><br>

               <!-- ............................................................. -->
              <h3 align="center"><u>4. Formación profesional y ciudadana</u></h3><br>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>1.  La Facultad  me brinda una formación ética y ciudadana que me ayuda a ser una persona socialmente responsable.</label>
                 {!!Form::select('ee_iv_i',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>2. Mi formación es realmente integral, humana y profesional, y no sólo especializada.</label>
                 {!!Form::select('ee_iv_ii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>3. La Facultad me motiva para ponerme en el lugar de otros y reaccionar contra las injusticias sociales y económicas presentes en mi contexto social.</label>
                 {!!Form::select('ee_iv_iii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>4. Mi formación me permite ser un ciudadano activo en defensa del medio ambiente e informado acerca de los riesgos y alternativas ecológicas al desarrollo actual.</label>
                 {!!Form::select('ee_iv_iv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>5. Los diversos cursos que llevo en mi formación están actualizados y responden a necesidades sociales de mi entorno.</label>
                 {!!Form::select('ee_iv_v',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>6. Dentro de mi formación he tenido la oportunidad de relacionarme cara a cara con la pobreza.</label>
                 {!!Form::select('ee_iv_vi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>7. Dentro de mis cursos he tenido la oportunidad de participar en proyectos sociales fuera de la Facultad.</label>
                 {!!Form::select('ee_iv_vii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>8. Mis profesores vinculan sus enseñanzas con los problemas sociales y ambientales de la actualidad.</label>
                 {!!Form::select('ee_iv_viii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>9. Dentro de mi formación tengo la posibilidad de conocer a especialistas en temas de desarrollo social y ambiental.</label>
                 {!!Form::select('ee_iv_ix',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>10. Dentro de mis cursos he tenido la oportunidad de hacer investigación aplicada a la solución de problemas sociales y/o ambientales.</label>
                 {!!Form::select('ee_iv_x',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><br>

                      <div class="col-md-12"><br>
                        <div class="modal-footer">
                        <input type="hidden" name="encuest" value="aaa">
                        <input type="hidden" name="encuesta_id" value="{{$encuesta_id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <button class="btn btn-success btn-lg">Registrar</button>
                        </div>
                      </div>
          {!! Form::close() !!}
    </div>
  </div>
</div>
<!--Fin Cuerpo-->

@endsection
@section('script')
  @include('master.extras.tablasScript')

   <!--Scripts Select2-curso-->
  {!!Html::script('select2-4.0.3/dist/js/select2.js')!!}
  <script type="text/javascript">
    $("#cursos").select2();
  </script>
 
@endsection