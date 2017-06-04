<div class="x_content table-responsive">
                    <table  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Encuesta</th>
                          <th>Fecha</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>


                      <tbody>
                          
                      @foreach($enc as $e)
                        <tr>
                          <td>{{\Carbon\Carbon::parse($e->created_at)->format('Y').'-'.$e->semestre}}</td>
                          <td>{{$e->created_at}}</td>
                          <td>
                          @if($e->estado=='1')
                            {!!Form::open(['route'=>['adminencuesta.update', $e->id], 'method'=>'PUT'])!!} 
                              <input type="hidden" name="estado" value="0">
                              <button class="submit btn btn-success btn-xs"" title="Clic para Desactivar" 
                              onclick="javascript:return conf('Desactivar');"> 
                              Activo</button>
                            {!!Form::close() !!}
                            @else
                            {!!Form::open(['route'=>['adminencuesta.update', $e->id], 'method'=>'PUT'])!!} 
                              <input type="hidden" name="estado" value="1">
                              <button class="submit btn btn-danger btn-xs"" title="Clic para Activar" 
                              onclick="javascript:return conf('Activar');"> 
                              Inactivo</button>
                            {!!Form::close() !!}
                          @endif
                          </td>
                          <td>
                            <a href="{{url('excel',$e->id)}}" title="Descargar Excel" style="color: green; font-size:2em; padding-right: 4px;"><i id="ico-plus" class="fa fa-file-excel-o"></i></a>
                            <a href="#" title="Editar nombre" style="color: blue; font-size:2em; padding-left: 10px;"><i id="ico-plus" class="fa fa-pencil-square-o" onclick="editarencuesta('{{$e->id}}');" data-toggle="modal" data-target="#EditarEncuesta"></i></a>
                          </td>
                        </tr>    
                      @endforeach
                      </tbody>
                    </table>
</div>


<script type="text/javascript">
    function conf(msj){
    confirmar = confirm('¿Seguro que deseas '+msj+' esta encuesta?');
    return confirmar;
  }
  
</script>