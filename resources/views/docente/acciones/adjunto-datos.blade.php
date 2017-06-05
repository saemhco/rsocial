<style>
     .a{
     	  margin-top: 5px;
        font-size: 1.2em;
        opacity: 0.7;
        transition: 0.5s;
        font-family: cursive;
     }
     .a:hover{
        opacity: 1;
        font-size: 1.3em;
     }
      #texto{
        color: blue;
      }
      #excel{
        color: green;
      }
      #imagen{
        color: red;
      }
</style>

@if($py->registro_participacion!='')
<a href="{{url('rp_descargar',$py->registro_participacion)}}" id="texto" class="a"><i class="fa fa-file-text-o"></i> Registro de participantes</a><br><br>
@endif
@if($py->sat_inv_excel!='')
<a href="{{url('excel_descargar',$py->sat_inv_excel)}}" id="excel" class="a"><i class="fa fa-file-excel-o"></i> Tabla de satisfación de involucrados</a><br><br>
@endif
@if($py->evidencias!='')
<a href="{{url('evidencia_descargar',$py->evidencias)}}" id="imagen" class="a"><i class="fa fa-file-image-o"></i> Evidencias</a>
@endif