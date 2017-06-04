@extends('master.docente')
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
     {!! Form::open(['route' => 'docentencuesta.store', 'method' => 'POST', 'class'=>'form-horizontal form-label-left']) !!} 

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
                  1. Estoy satisfecho con el nivel de remuneración que brinda la Facultad.
                </label>
                {!!Form::select('ed_i_i',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div>
              <hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <label>2. Estoy satisfecho con los beneficios sociales y profesionales que brinda la Facultad.</label>
                {!!Form::select('ed_i_ii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>3. Dentro de la universidad se promueve el trabajo en equipo y la solidaridad.</label>
                  {!!Form::select('ed_i_iii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>4. Existe un buen clima laboral entre el  personal.</label>
                  {!!Form::select('ed_i_iv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>5. La Facultad brinda facilidades para el desarrollo personal y profesional de sus empleados.</label>
                  {!!Form::select('ed_i_v',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>6. Hay equidad de género en las instancias de gobierno de la Facultad.</label>
                  {!!Form::select('ed_i_vi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>7. No existe discriminación en el acceso al empleo, ni por género, religión, raza, orientación política o sexual.</label>
                  {!!Form::select('ed_i_vii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label>8. La Facultad es socialmente responsable con su personal no docente.</label>
                  {!!Form::select('ed_i_viii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>9. La Facultad es ambientalmente responsable.</label>
                {!!Form::select('ed_i_ix',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>10. Existe una política institucional para la protección del medio ambiente en el campus.</label>
                {!!Form::select('ed_i_x',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>11. El personal recibe una capacitación en temas ambientales por parte de la Facultad.</label>
                {!!Form::select('ed_i_xi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>12. La organización de la vida en el campus permite a las personas adquirir hábitos ecológicos adecuados.</label>
                 {!!Form::select('ed_i_xii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>13. Las autoridades de la Facultad han sido elegidas en forma democrática y transparente.</label>
                 {!!Form::select('ed_i_xiii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>14. Me siento escuchado como ciudadano y puedo participar activamente  en la vida institucional.</label>
                 {!!Form::select('ed_i_xiv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>15.   En la Facultad hay libertad sindical.</label>
                 {!!Form::select('ed_i_xv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>16. La Facultad me informa adecuadamente acerca de todas las decisiones institucionales que me conciernen y afectan.</label>
                 {!!Form::select('ed_i_xvi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>17. Se brinda periódicamente información económico-financiera al personal de la Facultad.</label>
                 {!!Form::select('ed_i_xvii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>18. Percibo coherencia entre los principios que declara la Facultad y lo que se practica en el campus.</label>
                 {!!Form::select('ed_i_xviii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>19. La comunicación y el marketing de la Facultad se llevan a cabo en forma socialmente responsable.</label>
                 {!!Form::select('ed_i_xix',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>20. La Facultad busca utilizar sus campañas de marketing para promover valores y temas de responsabilidad social.</label>
                 {!!Form::select('ed_i_xx',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <!-- ............................................................. -->

              <h3 align="center"><u>2. Formación profesional y ciudadana</u></h3> <br>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>1. La Facultad brinda a los estudiantes una formación ética y ciudadana que los ayuda a ser personas socialmente responsables.</label>
                 {!!Form::select('ed_ii_i',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>2. He tenido reuniones con colegas para examinar los aspectos de responsabilidad social ligados a la carrera que enseño.</label>
                 {!!Form::select('ed_ii_ii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>3. Percibo que los estudiantes están bien informados acerca de las injusticias sociales y los riesgos ecológicos del mundo   actual.</label>
                 {!!Form::select('ed_ii_iii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>4. Los diversos cursos que dicto están actualizados y responden a necesidades sociales del entorno.</label>
                 {!!Form::select('ed_ii_iv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>5. En los cursos a mi cargo los estudiantes tienen que hacer actividades que impactan positivamente en el entorno social.</label>
                 {!!Form::select('ed_ii_v',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>6. Vinculo a menudo los contenidos temáticos enseñados con los problemas sociales y ambientales de la actualidad.</label>
                 {!!Form::select('ed_ii_vi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>7. He tenido la oportunidad de vincular cursos a mi cargo con proyectos sociales fuera de la universidad.</label>
                 {!!Form::select('ed_ii_vii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>8. He participado en actividades de voluntariado solidario con colegas y alumnos.</label>
                 {!!Form::select('ed_ii_viii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>9. En mi especialidad hemos tenido reuniones con actores sociales externos para discutir la pertinencia social del currículo.</label>
                 {!!Form::select('ed_ii_ix',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>10. Hemos tenido reuniones con egresados de la especialidad para discutir  la adecuación del currículo a las demandas sociales  actuales.</label>
                 {!!Form::select('ed_ii_x',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
               <!-- ............................................................. -->
              <h3 align="center"><u>3. Gestión social del conocimiento</u></h3><br>

              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>1. La Facultad cuenta con líneas de investigación orientadas al desarrollo social y la sostenibilidad ambiental.</label>
                 {!!Form::select('ed_iii_i',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>2. Los temas de investigación son definidos en consulta con los intereses de los grupos externos involucrados.</label>
                 {!!Form::select('ed_iii_ii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>3. Durante la investigación existen procesos de consulta con los usuarios de los resultados a través de entrevistas, reuniones comunitarias u otros dispositivos.</label>
                 {!!Form::select('ed_iii_iii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>4.   Los grupos externos involucrados en la investigación participan de  su evaluación final, cuyos resultados se integran al documento.</label>
                 {!!Form::select('ed_iii_iv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>5. Los problemas multidimensionales son investigados de manera interdisciplinaria.</label>
                 {!!Form::select('ed_iii_v',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>6. Los equipos interdisciplinarios de investigación incorporan en su proceso a actores no universitarios.</label>
                 {!!Form::select('ed_iii_vi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>7. En la Facultad existen dispositivos de capacitación transdisciplinaria para docentes e investigadores.</label>
                 {!!Form::select('ed_iii_vii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>8. La Facultad establece alianzas y sinergias con otros actores (gobierno, empresas, u ONG) para elaborar políticas de conocimiento, líneas de investigación o campos de formación adecuados a los requerimientos sociales.</label>
                 {!!Form::select('ed_iii_viii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>9. La Facultad cuenta con sistemas de promoción de investigaciones socialmente útiles.</label>
                 {!!Form::select('ed_iii_ix',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>10. La Facultad cuenta con dispositivos regulares para el seguimiento de las políticas públicas, así como la identificación y análisis de los grandes temas de la sociedad.</label>
                 {!!Form::select('ed_iii_x',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>11.  En la Facultad se promueve y estimula el diálogo entre investigadores y decisores políticos.</label>
                 {!!Form::select('ed_iii_xi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>12. La  Facultad  cuenta con medios específicos de difusión y transferencia de conocimientos a la ciudadanía.</label>
                 {!!Form::select('ed_iii_xii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>13.  La Facultad promueve la divulgación científica y la difusión del saber a públicos marginados de la academia.</label>
                 {!!Form::select('ed_iii_xiii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>14. La Facultad investiga las necesidades de conocimiento pertinente de los grupos sociales más excluidos y trata de   satisfacerlas.</label>
                 {!!Form::select('ed_iii_xiv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>15. La Facultad promueve la capacitación de diversos grupos sociales para la investigación y producción de conocimientos    propios.</label>
                 {!!Form::select('ed_iii_xv',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>16.  La Facultad promueve la incorporación permanente de resultados  de investigación, estudios de caso y metodologías en los   currículos.</label>
                 {!!Form::select('ed_iii_xvi',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>17. Los estudiantes de pregrado deben obligatoriamente practicar la investigación en varios cursos de su formación.</label>
                 {!!Form::select('ed_iii_xvii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>18. Los proyectos y programas de investigación incorporan sistemática- mente a los alumnos.</label>
                 {!!Form::select('ed_iii_xviii',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>19. Los investigadores de la Facultad disponen de tiempo y recursos para atender a los alumnos que lo desean.</label>
                 {!!Form::select('ed_iii_xix',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12 col-xs-12"><br>
                <label>20. La Facultad promueve un código de ética de la ciencia y de los científicos, así como la vigilancia ciudadana de la actividad científica.</label>
                 {!!Form::select('ed_iii_xx',$respuestas,null,['required','class'=>'form-control unidad','style'=>'width: 100%','placeholder' => 'Seleccione'])!!}
                </div>
              </div><hr>

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