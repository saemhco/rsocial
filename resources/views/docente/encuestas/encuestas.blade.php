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
      <h2>Encuestas <a href="{{url('docentencuesta/create')}}" class="btn btn-round btn-success" {{$disabled}} onclick="{{$estado}}">Nuevo</a></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <!--Menu multiple-->
      <div class="" role="tabpanel" data-example-id="togglable-tabs" id="vernotas">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">1. </a>
          </li>
          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">2. </a>
          </li>
          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">3. </a>
          </li>
         </ul>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="profile-tab">
              <!-- start user projects -->
              <div class="table-responsive">
                 <span><b><u>Campus responsable</u></b></span><br>
                 <div class="x_content table-responsive">
                    <table  id="" class="table table-striped table-bordered datatable-buttons">
                      <thead>
                        <tr>
                          <th>Semestre
                          </th>
                          <th>1. Estoy satisfecho con el nivel de remuneración que brinda la Facultad.
                          </th>
                          <th>2. Estoy satisfecho con los beneficios sociales y profesionales que brinda la Facultad.</th>
                          <th>3. Dentro de la universidad se promueve el trabajo en equipo y la solidaridad.</th>
                          <th>4. Existe un buen clima laboral entre el  personal.</th>
                          <th>5. La Facultad brinda facilidades para el desarrollo personal y profesional de sus empleados.</th>
                          <th>6. Hay equidad de género en las instancias de gobierno de la Facultad</th>
                          <th>7. No existe discriminación en el acceso al empleo, ni por género, religión, raza, orientación política o sexual.</th>
                          <th>8. La Facultad es socialmente responsable con su personal no docente.</th>
                          <th>9.   La Facultad es ambientalmente responsable.</th>
                          <th>10. Existe una política institucional para la protección del medio ambiente en el campus.</th>
                          <th>11. El personal recibe una capacitación en temas ambientales por parte de la Facultad.</th>
                          <th>12. La organización de la vida en el campus permite a las personas adquirir hábitos ecológicos adecuados.</th>
                          <th>13. Las autoridades de la Facultad han sido elegidas en forma democrática y transparente.</th>
                          <th>14. Me siento escuchado como ciudadano y puedo participar activamente  en la vida institucional.</th>
                          <th>15. En la Facultad hay libertad sindical.</th>
                          <th>16. La Facultad me informa adecuadamente acerca de todas las decisiones institucionales que me conciernen y afectan.</th>
                          <th>17. Se brinda periódicamente información económico-financiera al personal de la Facultad</th>
                          <th>18. Percibo coherencia entre los principios que declara la Facultad y lo que se practica en el campus.</th>
                          <th>19. La comunicación y el marketing de la Facultad se llevan a cabo en forma socialmente responsable.</th>
                          <th>20. La Facultad busca utilizar sus campañas de marketing para promover valores y temas de responsabilidad social.</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($mes as $me)
                        <tr>
                          <td>{{\Carbon\Carbon::parse($me->created_at)->format('Y').'-'.$me->encuesta->semestre}}</td>
                          <td>{{$respuestas[$me->ed_i_i]}}</td>
                          <td>{{$respuestas[$me->ed_i_ii]}}</td>
                          <td>{{$respuestas[$me->ed_i_iii]}}</td>
                          <td>{{$respuestas[$me->ed_i_iv]}}</td>
                          <td>{{$respuestas[$me->ed_i_v]}}</td>
                          <td>{{$respuestas[$me->ed_i_vi]}}</td>
                          <td>{{$respuestas[$me->ed_i_vii]}}</td>
                          <td>{{$respuestas[$me->ed_i_viii]}}</td>
                          <td>{{$respuestas[$me->ed_i_ix]}}</td>
                          <td>{{$respuestas[$me->ed_i_x]}}</td>
                          <td>{{$respuestas[$me->ed_i_xi]}}</td>
                          <td>{{$respuestas[$me->ed_i_xii]}}</td>
                          <td>{{$respuestas[$me->ed_i_xiii]}}</td>
                          <td>{{$respuestas[$me->ed_i_xiv]}}</td>
                          <td>{{$respuestas[$me->ed_i_xv]}}</td>
                          <td>{{$respuestas[$me->ed_i_xvi]}}</td>
                          <td>{{$respuestas[$me->ed_i_xvii]}}</td>
                          <td>{{$respuestas[$me->ed_i_xviii]}}</td>
                          <td>{{$respuestas[$me->ed_i_xix]}}</td>
                          <td>{{$respuestas[$me->ed_i_xx]}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- end user projects -->
            </div>
            <div role="tabpanel" class="tab-pane fade table-responsive" id="tab_content2" aria-labelledby="profile-tab">
                <!-- start user projects -->
                <div class="table-responsive">
                 <span><b><u>Formación profesional y ciudadana</u></b></span><br>
                 <div class="x_content table-responsive">
                    <table  id="" class="table table-striped table-bordered datatable-buttons">
                      <thead>
                        <tr>
                          <th>Semestre</th>
                          <th>1. La Facultad brinda a los estudiantes una formación ética y ciudadana que los ayuda a ser personas socialmente responsables.</th>
                          <th>2. He tenido reuniones con colegas para examinar los aspectos de responsabilidad social ligados a la carrera que enseño.</th>
                          <th>3. Percibo que los estudiantes están bien informados acerca de las injusticias sociales y los riesgos ecológicos del mundo   actual.</th>
                          <th>4. Los diversos cursos que dicto están actualizados y responden a necesidades sociales del entorno.</th>
                          <th>5. En los cursos a mi cargo los estudiantes tienen que hacer actividades que impactan positivamente en el entorno social.</th>
                          <th>6. Vinculo a menudo los contenidos temáticos enseñados con los problemas sociales y ambientales de la actualidad.</th>
                          <th>7. He tenido la oportunidad de vincular cursos a mi cargo con proyectos sociales fuera de la universidad.</th>
                          <th>8. He participado en actividades de voluntariado solidario con colegas y alumnos.</th>
                          <th>9. En mi especialidad hemos tenido reuniones con actores sociales externos para discutir la pertinencia social del currículo.</th>
                          <th>10. Hemos tenido reuniones con egresados de la especialidad para discutir  la adecuación del currículo a las demandas sociales  actuales.</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($mes as $me)
                        <tr>
                          <td>{{\Carbon\Carbon::parse($me->created_at)->format('Y').'-'.$me->encuesta->semestre}}</td>
                          <td>{{$respuestas[$me->ed_ii_i]}}</td>
                          <td>{{$respuestas[$me->ed_ii_ii]}}</td>
                          <td>{{$respuestas[$me->ed_ii_iii]}}</td>
                          <td>{{$respuestas[$me->ed_ii_iv]}}</td>
                          <td>{{$respuestas[$me->ed_ii_v]}}</td>
                          <td>{{$respuestas[$me->ed_ii_vi]}}</td>
                          <td>{{$respuestas[$me->ed_ii_vii]}}</td>
                          <td>{{$respuestas[$me->ed_ii_viii]}}</td>
                          <td>{{$respuestas[$me->ed_ii_ix]}}</td>
                          <td>{{$respuestas[$me->ed_ii_x]}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- end user projects -->
            </div>
            <div role="tabpanel" class="tab-pane fade table-responsive" id="tab_content3" aria-labelledby="profile-tab">
                <!-- start user projects -->
              <div class="table-responsive">
                 <span><b><u>Gestión social del conocimiento encuesta para docentes investigadores</u></b></span><br>
                 <div class="x_content table-responsive">
                    <table  id="" class="table table-striped table-bordered datatable-buttons">
                      <thead>
                        <tr>
                          <th>Semestre</th>
                          
                          <th>1. La Facultad cuenta con líneas de investigación orientadas al desarrollo social y la sostenibilidad ambiental.</th>
                          <th>2. Los temas de investigación son definidos en consulta con los intereses de los grupos externos involucrados.</th>
                          <th>3. Durante la investigación existen procesos de consulta con los usuarios de los resultados a través de entrevistas, reuniones comunitarias u otros dispositivos.</th>
                          <th>4.   Los grupos externos involucrados en la investigación participan de  su evaluación final, cuyos resultados se integran al documento.</th>
                          <th>5. Los problemas multidimensionales son investigados de manera interdisciplinaria.</th>
                          <th>6.   Los equipos interdisciplinarios de investigación incorporan en su proceso a actores no universitarios.</th>
                          <th>7. En la Facultad existen dispositivos de capacitación transdisciplinaria para docentes e investigadores.</th>
                          <th>8. La Facultad establece alianzas y sinergias con otros actores (gobierno, empresas, u ONG) para elaborar políticas de conocimiento, líneas de investigación o campos de formación adecuados a los requerimientos sociales.</th>
                          <th>9. La Facultad cuenta con sistemas de promoción de investigaciones socialmente útiles.</th>
                          <th>10. La Facultad cuenta con dispositivos regulares para el seguimiento de las políticas públicas, así como la identificación y análisis de los grandes temas de la sociedad.</th>
                          <th>11.  En la Facultad se promueve y estimula el diálogo entre investigadores y decisores políticos.</th>
                          <th>12. La  Facultad  cuenta con medios específicos de difusión y transferencia de conocimientos a la ciudadanía.</th>
                          <th>13.  La Facultad promueve la divulgación científica y la difusión del saber a públicos marginados de la academia.</th>
                          <th>14. La Facultad investiga las necesidades de conocimiento pertinente de los grupos sociales más excluidos y trata de   satisfacerlas.</th>
                          <th>15. La Facultad promueve la capacitación de diversos grupos sociales para la investigación y producción de conocimientos    propios.</th>
                          <th>16.  La Facultad promueve la incorporación permanente de resultados  de investigación, estudios de caso y metodologías en los   currículos.</th>
                          <th>17. Los estudiantes de pregrado deben obligatoriamente practicar la investigación en varios cursos de su formación.</th>
                          <th>18. Los proyectos y programas de investigación incorporan sistemática- mente a los alumnos.</th>
                          <th>19. Los investigadores de la Facultad disponen de tiempo y recursos para atender a los alumnos que lo desean.</th>
                          <th>20. La Facultad promueve un código de ética de la ciencia y de los científicos, así como la vigilancia ciudadana de la actividad científica.</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($mes as $me)
                        <tr>
                          <td>{{\Carbon\Carbon::parse($me->created_at)->format('Y').'-'.$me->encuesta->semestre}}</td>
                          <td>{{$respuestas[$me->ed_iii_i]}}</td>
                          <td>{{$respuestas[$me->ed_iii_ii]}}</td>
                          <td>{{$respuestas[$me->ed_iii_iii]}}</td>
                          <td>{{$respuestas[$me->ed_iii_iv]}}</td>
                          <td>{{$respuestas[$me->ed_iii_v]}}</td>
                          <td>{{$respuestas[$me->ed_iii_vi]}}</td>
                          <td>{{$respuestas[$me->ed_iii_vii]}}</td>
                          <td>{{$respuestas[$me->ed_iii_viii]}}</td>
                          <td>{{$respuestas[$me->ed_iii_ix]}}</td>
                          <td>{{$respuestas[$me->ed_iii_x]}}</td>
                          <td>{{$respuestas[$me->ed_iii_xi]}}</td>
                          <td>{{$respuestas[$me->ed_iii_xii]}}</td>
                          <td>{{$respuestas[$me->ed_iii_xiii]}}</td>
                          <td>{{$respuestas[$me->ed_iii_xiv]}}</td>
                          <td>{{$respuestas[$me->ed_iii_xv]}}</td>
                          <td>{{$respuestas[$me->ed_iii_xvi]}}</td>
                          <td>{{$respuestas[$me->ed_iii_xvii]}}</td>
                          <td>{{$respuestas[$me->ed_iii_xviii]}}</td>
                          <td>{{$respuestas[$me->ed_iii_xix]}}</td>
                          <td>{{$respuestas[$me->ed_iii_xx]}}</td>
                        </tr>
                        @endforeach()
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- end user projects -->
            </div>
          </div>
      </div>
      <!--Fin de menu multiple: foro y notas-->
    </div>
  </div>
</div>
<!--Fin Cuerpo-->

@endsection
@section('script')
  @include('master.extras.tablasScript')

  <script type="text/javascript">
  //Informacion
     
  </script>

  <!--Scripts Select2-curso-->
  {!!Html::script('select2-4.0.3/dist/js/select2.js')!!}
 
@endsection