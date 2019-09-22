<div class="modal modal-danger fade in" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$ubi->CodUbicacion}}"
    style="(display:block;padding-right:17px;)"
    >
    {{Form::Open(array('action'=> array('UbicacionController@destroy',$ubi->CodUbicacion),'method'=>'delete'))}}
    <div class="modal-dialog" >
        <div class="modal-content">
            
            <div class="model-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> x </span>
                </button>
                <h4 class="modal-title">Eliminar Ubicacion</h4>
            </div>
            <div class="modal-body">
                <p>CONFIRME SI DESEA ELIMINAR LA UBICACION</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>