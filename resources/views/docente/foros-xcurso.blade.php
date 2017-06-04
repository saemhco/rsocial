              @foreach($foros as $foro)
              <div class="col-xs-2 col-sm-2 col-md-1  col-md-offset-1 col-lg-1 col-lg-offset-1">
                <br><br><img src="{{URL::to('images/'.$foro->user->foto)}}" width="100%">
              </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 post-preview">
                    <a href="{{url('foros',$foro->id)}}">
                        <h2 class="post-title">
                            {{$foro->titulo}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{$foro->proyecto->curso->curso}} / {{$foro->proyecto->titulo}}
                        </h3>
                    </a>
                    <?php
                        $fecha=\Carbon\Carbon::parse($foro->created_at);
                        switch ($fecha->format('m')) {
                                  case '01': $mes="Ene"; break;
                                  case '02': $mes="Feb"; break;
                                  case '03': $mes="Mar"; break;
                                  case '04': $mes="Abr"; break;
                                  case '05': $mes="May"; break;
                                  case '06': $mes="Jun"; break;
                                  case '07': $mes="Jul"; break;
                                  case '08': $mes="Ago"; break;
                                  case '09': $mes="Sep"; break;
                                  case '10': $mes="Oct"; break;
                                  case '11': $mes="Nov"; break;
                                  case '12': $mes="Dic"; break;
                                  default: $mes=""; break;
                            }
                      ?>
                    <p class="post-meta">Publicado por <a href="#">{{$foro->user->nombres}}, {{$foro->user->apellidos}}</a> {{'el '.$fecha->format('d').' de '.$mes.' de '.$fecha->format('Y').' ~ '.$fecha->format('h:i:s A')}}</p>
                  <hr>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                  <br>
                  <a href="#" id="editar" title="Editar" data-toggle="modal" data-target="#EditarForo" onclick="cargarModalEd('{{$foro->id}}')">
                    <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <a href="#" id="eliminar" title="Eliminar">
                      <i class="fa fa-trash"></i>
                    </a>
                </div>
                @endforeach