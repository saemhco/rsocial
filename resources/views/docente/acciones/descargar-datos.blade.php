@if($ds=="[]")
<span>Aún no se han subido archivos para este proyecto</span>

@else
@foreach($ds as $d)
<a href="{{url('descargar',$d->archivo)}}"  title="Click para descargar esta archivo">
<h4 style="margin-bottom: 0;"><i class="fa fa-download"> Versión {{$d->version}} </i> </h4>
</a>
                          <p style="margin: 0">Subido el {{$d->created_at}}</p>
                          <p style="margin: 0">Actualizado el {{$d->updated_at}}</p>
                          <hr>
   @endforeach()
@endif