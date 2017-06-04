@if(Session::has('verde'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>¡Éxito!</b> {{ Session::get('verde')}}
            </div>
@elseif(Session::has('rojo'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>¡Error!</b> {{ Session::get('rojo')}}
            </div>
@elseif(Session::has('azul'))
            <div class="alert alert-info alert-dismissible fade in" role="alert" align="rigth">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <b>¡Exito!</b> {{ Session::get('azul')}}
            </div>
@elseif(Session::has('naranja'))
            <div class="alert alert-warning alert-dismissible fade in" role="alert" align="rigth">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <b>¡Advertencia!</b> {{ Session::get('naranja')}}
            </div>
@endif
@if($errors->has())
            <div class="alert alert-warning alert-dismissible fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>¡Advertencia!</b>
                <ul>
                  @foreach($errors->all() as $error)
                    <li><span>{{$error}}</span></li>
                  @endforeach()
                </ul>
            </div>
@endif