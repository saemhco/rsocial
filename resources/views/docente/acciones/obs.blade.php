<style type="text/css">
  .info-p{
    font-size: 1.3em;  
  }
  .info-p>b{
     color: #151272;
  }

</style>

                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">{{$p->titulo}}</h4>
                        </div>
                        <div class="modal-body">
                          <label>Observación / Revición:</label> 
                          <p style="margin-left: 10px;">{{$p->obs}}</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>

                      </div>
                    </div>