<!-- Edit Modal Cargos-->
<div class="modal fade" id="ModalEditCargo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="FormEditCargo" class="forms-sample">
                <div class="modal-header btn-gradient-info">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Cargos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                    <div class="form-group">
                        <label for="">Identificador</label>
                        <input type="text" class="form-control identificador" placeholder="Identificador del Cargo.." readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Cargo</label>
                        <input type="text" class="form-control cargo" placeholder="Cargo.." readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Horas de Trabajo</label>
                        <input type="number" class="form-control horas" min="0" placeholder="Horas de Trabajo..">
                    </div>
                    <div class="form-group">
                        <label for="">Pago por Horas de Trabajo</label>
                        <input type="text" class="form-control pago" min="0" placeholder="Pago por Hora..">
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-sm btn-gradient-danger" data-dismiss="modal"><i class="mdi mdi-close-octagon">Cancelar</i></button>
                    <button type="submit" class="btn btn-sm btn-gradient-success btn-fw"><i class="mdi mdi-plus">Guardar</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Cargos -->