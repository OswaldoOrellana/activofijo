<div class="modal modal-danger fade in" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$ru->CodRubro}}"
    style="(display:block;padding-right:17px;)"
    >
    {{Form::Open(array('action'=> array('RubroController@destroy',$ru->CodRubro),'method'=>'delete'))}}
    <div class="modal-dialog" >
        <div class="modal-content">
            
            <div class="model-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> x </span>
                </button>
                <h4 class="modal-title">Eliminar Rubro</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea Eliminar el Rubro</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>