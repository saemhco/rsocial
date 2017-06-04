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
      <h2>Encuestas <a href="{{url('estudiantencuesta/create')}}" class="btn btn-round btn-success" {{$disabled}} onclick="{{$estado}}">Nuevo</a></h2>
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
          <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">4. </a>
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
                          <th>Semestre</th>
                          <th>Cursos</th>
                          <th>1. En la Facultad las relaciones interpersonales son en general de respeto y cordialidad.</th>
                          <th>2. Percibo que hay un buen clima laboral entre los trabajadores de la Facultad.</th>
                          <th>3.   Entre profesores y estudiantes hay un trato de respeto y colaboración.</th>
                          <th>4. No percibo discriminación por género, raza, nivel socioeconómico u orientación política o sexual.</th>
                          <th>5.   Hay equidad de género en el acceso a los puestos directivos.</th>
                          <th>6. Me siento escuchado como ciudadano, puedo participar en la vida institucional.</th>
                          <th>7. La Facultad está organizada para recibir a estudiantes con necesidades des especiales.</th>
                          <th>8. La Facultad toma medidas para la protección del medio ambiente en el campus.</th>
                          <th>9.   He adquirido hábitos ecológicos desde que estoy en la Facultad.</th>
                          <th>10. Percibo que el personal de la Facultad recibe una capacitación y directivas para el cuidado del medio ambiente en el campus.</th>
                          <th>11. Los procesos para elegir a las autoridades son transparentes y democráticos.</th>
                          <th>12. Las autoridades toman las grandes decisiones en forma democrática y consensuada.</th>
                          <th>13. Los estudiantes tienen una participación adecuada en las instancias de gobierno.</th>
                          <th>14. En la Facultad reina la libertad de expresión y participación para todo el personal docente, no docente y estudiantes.</th>
                          <th>15. Se me informa de modo transparente acerca de todo lo que me concierne y afecta en la Facultad.</th>
                          <th>16. Los mensajes publicitarios que difunde la Facultad son elaborados con criterios éticos y de responsabilidad  social.</th>
                          <th>17. La Facultad nos invita a mantener buenas relaciones con las demás facultades y universidades con las cuales compite.</th>
                          <th>18. La Facultad busca utilizar sus campañas de marketing para promover valores y temas de responsabilidad social.</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($mes as $me)
                        <tr>
                          <td>{{\Carbon\Carbon::parse($me->created_at)->format('Y').'-'.$me->encuesta->semestre}}</td>
                          <td><ul>
                              <?php $cursos=\App\Cursoee::where('encuesta_id',$me->id)->get();?>
                              @foreach($cursos as $cd)
                                <li style="padding-left: 0">{{$cd->curso->curso}}</li>
                              @endforeach
                              </ul>
                          </td>
                          <td>{{$respuestas[$me->ee_i_i]}}</td>
                          <td>{{$respuestas[$me->ee_i_ii]}}</td>
                          <td>{{$respuestas[$me->ee_i_iii]}}</td>
                          <td>{{$respuestas[$me->ee_i_iv]}}</td>
                          <td>{{$respuestas[$me->ee_i_v]}}</td>
                          <td>{{$respuestas[$me->ee_i_vi]}}</td>
                          <td>{{$respuestas[$me->ee_i_vii]}}</td>
                          <td>{{$respuestas[$me->ee_i_viii]}}</td>
                          <td>{{$respuestas[$me->ee_i_ix]}}</td>
                          <td>{{$respuestas[$me->ee_i_x]}}</td>
                          <td>{{$respuestas[$me->ee_i_xi]}}</td>
                          <td>{{$respuestas[$me->ee_i_xii]}}</td>
                          <td>{{$respuestas[$me->ee_i_xiii]}}</td>
                          <td>{{$respuestas[$me->ee_i_xiv]}}</td>
                          <td>{{$respuestas[$me->ee_i_xv]}}</td>
                          <td>{{$respuestas[$me->ee_i_xvi]}}</td>
                          <td>{{$respuestas[$me->ee_i_xvii]}}</td>
                          <td>{{$respuestas[$me->ee_i_xviii]}}</td>
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
                          <th>Cursos</th>
                          <th>La Facultad me brinda una formación ética y ciudadana que me ayuda a ser una persona socialmente responsable.</th>
                          <th>2. Mi formación es realmente integral, humana y profesional.</th>
                          <th>3. Mi formación me permite ser un ciudadano informado acerca de los riesgos y alternativas ecológicas al desarrollo actual.</th>
                          <th>4. Mi formación me permite ser un ciudadano activo en defensa del medio ambiente.</th>
                          <th>5. Los diversos cursos que llevo en mi formación están actualizados y responden a necesidades sociales de mi entorno.</th>
                          <th>6. Dentro de mi formación he tenido la oportunidad de relacionarme cara a cara con la pobreza.</th>
                          <th>7. Dentro de mis cursos he tenido la oportunidad de participar en proyectos sociales fuera de la universidad.</th>
                          <th>8. Mis profesores vinculan sus enseñanzas con los problemas sociales y ambientales de la actualidad.</th>
                          <th>9. Dentro de mi formación tengo la posibilidad de conocer a especialistas en temas de desarrollo social y ambiental.</th>
                          <th>10. Dentro de mis cursos he tenido la oportunidad de hacer investigación aplicada a la solución de problemas sociales y/o ambientales.</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($mes as $me)
                        <tr>
                          <td>{{\Carbon\Carbon::parse($me->created_at)->format('Y').'-'.$me->encuesta->semestre}}</td>
                          <td><ul>
                              <?php $cursos=\App\Cursoee::where('encuesta_id',$me->id)->get();?>
                              @foreach($cursos as $cd)
                                <li style="padding-left: 0">{{$cd->curso->curso}}</li>
                              @endforeach
                              </ul>
                          </td>
                          <td>{{$respuestas[$me->ee_ii_i]}}</td>
                          <td>{{$respuestas[$me->ee_ii_ii]}}</td>
                          <td>{{$respuestas[$me->ee_ii_iii]}}</td>
                          <td>{{$respuestas[$me->ee_ii_iv]}}</td>
                          <td>{{$respuestas[$me->ee_ii_v]}}</td>
                          <td>{{$respuestas[$me->ee_ii_vi]}}</td>
                          <td>{{$respuestas[$me->ee_ii_vii]}}</td>
                          <td>{{$respuestas[$me->ee_ii_viii]}}</td>
                          <td>{{$respuestas[$me->ee_ii_ix]}}</td>
                          <td>{{$respuestas[$me->ee_ii_x]}}</td>
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
                 <span><b><u>Participación social</u></b></span><br>
                 <div class="x_content table-responsive">
                    <table  id="" class="table table-striped table-bordered datatable-buttons">
                      <thead>
                        <tr>
                          <th>Semestre</th>
                          
                          <th>1. Percibo que mi Facultad se preocupa por los problemas sociales y quiere que los estudiantes seamos agentes de desarrollo.</th>
                          <th>2. Percibo que mi Facultad mantiene contacto estrecho con actores clave del desarrollo social (Estado, ONG, organismos internacionales, empresas).</th>
                          <th>3. La Facultad brinda a sus estudiantes y docentes oportunidades de interacción con diversos sectores sociales.
                          </th>
                          <th>4. En mi Facultad se organizan muchos foros y actividades en relación con el desarrollo, los problemas sociales y ambientales.</th>
                          <th>5.  Existe en la Facultad una política explícita para no segregar el acceso a la formación académica a grupos marginados (población indígena, minoría racial, estudiantes de escasos recursos, etc.) a través de becas de estudios u otros medios.</th>
                          <th>6. En mi Facultad existen iniciativas de voluntariado y la universidad nos motiva a participar de ellos.</th>
                          <th>7. En el transcurso de mis estudios he podido ver que asistencialismo y desarrollo están poco relacionados.</th>
                          <th>8. Desde que estoy en la Facultad he podido formar parte de grupos y/o redes con fines sociales o ambientales organizados o promovidos por mi Facultad.</th>
                          <th>9. Los estudiantes que egresan de mi Facultad han recibido una formación que promueve su sensibilidad social y ambiental.</th>
                          <th>10. En el transcurso de mi vida estudiantil he podido aprender mucho sobre la realidad nacional y los problemas sociales de mi país.</th>
                          <th>11. El proyecto necesita de la aplicación de conocimientos especializados para llevarse a cabo,</th>
                          <th>12. El proyecto es fuente de nuevos conocimientos.</th>
                          <th>13. El proyecto da lugar a publicaciones (especializadas y/o de divulgación)</th>
                          <th>14. El proyecto da lugar a capacitaciones específicas para beneficio de sus actores universitarios y no universitarios</th>
                          <th>15. El proyecto permite que sus actores comunitarios integren conocimientos especializados a su vida cotidiana</th>
                          <th>16. El proyecto es fuente de nuevas actividades académicas y aprendizaje significativo para asignaturas de diversas carreras</th>
                          <th>17. El proyecto permite a docentes practicar el aprendizaje basado en proyectos en sus cátedras</th>
                          <th>18. El proyecto involucra a actores externos en la evaluación de los estudiantes</th>
                          <th>19. El proyecto permite mejorar la vida cotidiana de sus actores y/o desarrollar sus capacidades</th>
                          <th>20. El proyecto sigue reglas éticas explícitamente formuladas y vigiladas por sus actores (código de ética, comité de ética, reportes financieros transparentes)</th>
                          <th>21. El proyecto difunde periódicamente sus alcances y resultados a la comunidad universitaria y los socios externos en forma efectiva</th>
                          <th>22 El proyecto da lugar a nuevos aprendizajes y proyectos a través de la comunicación de sus buenas prácticas y errores,</th>
                          <th>23.   El proyecto es reconocido por la universidad y otras  instituciones.</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($mes as $me)
                        <tr>
                          <td>{{\Carbon\Carbon::parse($me->created_at)->format('Y').'-'.$me->encuesta->semestre}}</td>
                          <td><ul>
                              <?php $cursos=\App\Cursoee::where('encuesta_id',$me->id)->get();?>
                              @foreach($cursos as $cd)
                                <li style="padding-left: 0">{{$cd->curso->curso}}</li>
                              @endforeach
                              </ul>
                          </td>
                          <td>{{$respuestas[$me->ee_iii_i]}}</td>
                          <td>{{$respuestas[$me->ee_iii_ii]}}</td>
                          <td>{{$respuestas[$me->ee_iii_iii]}}</td>
                          <td>{{$respuestas[$me->ee_iii_iv]}}</td>
                          <td>{{$respuestas[$me->ee_iii_v]}}</td>
                          <td>{{$respuestas[$me->ee_iii_vi]}}</td>
                          <td>{{$respuestas[$me->ee_iii_vii]}}</td>
                          <td>{{$respuestas[$me->ee_iii_viii]}}</td>
                          <td>{{$respuestas[$me->ee_iii_ix]}}</td>
                          <td>{{$respuestas[$me->ee_iii_x]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xi]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xii]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xiii]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xiv]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xv]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xvi]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xvii]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xviii]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xix]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xxi]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xxii]}}</td>
                          <td>{{$respuestas[$me->ee_iii_xxiii]}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- end user projects -->
            </div>

            <div role="tabpanel" class="tab-pane fade table-responsive" id="tab_content4" aria-labelledby="profile-tab">
                <!-- start user projects -->
              <div class="table-responsive">
                 <span><b><u>Formación profesional y ciudadana</u></b></span><br>
                 <div class="x_content table-responsive">
                    <table  id="" class="table table-striped table-bordered datatable-buttons">
                      <thead>
                        <tr>
                          <th>Semestre</th>
                          <th>Cursos</th>
                          <th>1.  La Facultad  me brinda una formación ética y ciudadana que me ayuda a ser una persona socialmente responsable.</th>
                          <th>2. Mi formación es realmente integral, humana y profesional, y no sólo especializada.</th>
                          <th>3. La Facultad me motiva para ponerme en el lugar de otros y reaccionar contra las injusticias sociales y económicas presentes en mi contexto social.</th>
                          <th>4. Mi formación me permite ser un ciudadano activo en defensa del medio ambiente e informado acerca de los riesgos y alternativas ecológicas al desarrollo actual.</th>
                          <th>5. Los diversos cursos que llevo en mi formación están actualizados y responden a necesidades sociales de mi entorno.</th>
                          <th>6. Dentro de mi formación he tenido la oportunidad de relacionarme cara a cara con la pobreza.</th>
                          <th>7. Dentro de mis cursos he tenido la oportunidad de participar en proyectos sociales fuera de la Facultad.</th>
                          <th>8. Mis profesores vinculan sus enseñanzas con los problemas sociales y ambientales de la actualidad.</th>
                          <th>9. Dentro de mi formación tengo la posibilidad de conocer a especialistas en temas de desarrollo social y ambiental.</th>
                          <th>10. Dentro de mis cursos he tenido la oportunidad de hacer investigación aplicada a la solución de problemas sociales y/o ambientales.</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($mes as $me)
                        <tr>
                          <td>{{\Carbon\Carbon::parse($me->created_at)->format('Y').'-'.$me->encuesta->semestre}}</td>
                          <td><ul>
                              <?php $cursos=\App\Cursoee::where('encuesta_id',$me->id)->get();?>
                              @foreach($cursos as $cd)
                                <li style="padding-left: 0">{{$cd->curso->curso}}</li>
                              @endforeach
                              </ul>
                          </td>
                          <td>{{$respuestas[$me->ee_iv_i]}}</td>
                          <td>{{$respuestas[$me->ee_iv_ii]}}</td>
                          <td>{{$respuestas[$me->ee_iv_iii]}}</td>
                          <td>{{$respuestas[$me->ee_iv_iv]}}</td>
                          <td>{{$respuestas[$me->ee_iv_v]}}</td>
                          <td>{{$respuestas[$me->ee_iv_vi]}}</td>
                          <td>{{$respuestas[$me->ee_iv_vii]}}</td>
                          <td>{{$respuestas[$me->ee_iv_viii]}}</td>
                          <td>{{$respuestas[$me->ee_iv_ix]}}</td>
                          <td>{{$respuestas[$me->ee_iv_x]}}</td>
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