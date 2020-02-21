<!-- Edit Modal -->
<div class="modal fade" id="ModalEditTipoInsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="FormEditTipoInsumo" class="forms-sample">
                <div class="modal-header btn-gradient-info">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Tipo de Insumo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body btn-light">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Identificador</label>
                        <input type="text" class="form-control ide_tip_ins" disabled placeholder="Identificador del Tipo del Insumo">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tipo de Insumo</label>
                        <input type="text" class="form-control nom_tip_ins" placeholder="Tipo de Insumo">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Estado del Insumo</label>
                        <select class="form-control est_tip_ins">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer btn-light">
                    <button type="button" class="btn btn-sm btn-gradient-danger" data-dismiss="modal"><i class="mdi mdi-close-octagon">Cancelar</i></button>
                    <button type="button" class="btn btn-sm btn-gradient-success btn-fw"><i class="mdi mdi-plus">Guardar</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->
<!-- Create Modal -->
<div class="modal fade" id="ModalCreateTipoInsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="forms-sample">
                <div class="modal-header btn-gradient-success">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar Tipo de Insumo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body btn-light">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tipo de Insumo</label>
                        <input type="text" class="form-control nom_tip_ins" placeholder="Tipo de Insumo">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Estado del Insumo</label>
                        <select class="form-control est_tip_ins">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer btn-light">
                    <button type="button" class="btn btn-sm btn-gradient-danger" data-dismiss="modal"><i class="mdi mdi-close-octagon">Cancelar</i></button>
                    <button type="button" class="btn btn-sm btn-gradient-success btn-fw"><i class="mdi mdi-plus">Guardar</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Create Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="ModalDeleteTipoInsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header btn-gradient-danger">
                    <h5 class="modal-title" id="exampleModalLabel">Borrar Tipo de Insumo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body btn-light">
                    <form id="FormDesactiveTipoInsumo" method="get">
                        <input type="hidden" id="DesactiveTipoInsumo" value="Desactivate">
                        <button type="submit" class="col-md-12 btn btn-lg btn-gradient-primary btn-fw"><i class="mdi mdi-plus">Desactivar</i></button>
                    </form>
                    <form id="FormDeleteTipoInsumo" method="get">
                        <input type="hidden" id="DeleteTipoInsumo" value="Delete">
                        <button type="submit" class="col-md-12 btn btn-lg btn-gradient-danger btn-fw"><i class="mdi mdi-plus">Eliminar</i></button>
                    </form>
                </div>
                <div class="modal-footer btn-light">
                    <button type="button" class="btn btn-sm btn-gradient-info" data-dismiss="modal"><i class="mdi mdi-close-octagon">Cancelar</i></button>

                </div>
        </div>
    </div>
</div>
<!-- End Delete Modal -->
