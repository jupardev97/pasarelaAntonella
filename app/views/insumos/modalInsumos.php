<!-- Start Create Modal Insumo-->
<div class="modal fade" id="ModalCreateInsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormCreateInsumo" class="forms-sample">
                <div class="modal-header btn-gradient-success">
                    <h4 class="modal-title" id=""><i class="mdi mdi-factory"> Agregar Insumo</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row p-3">
                        <input type="hidden" class="form-control tipoInsumo">
                        <div class="form-group col-md-6">
                            <label class="">Identificador</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-barcode-scan"></i></span>
                                </div>
                                <input type="text" class="form-control identificador" placeholder="Identificador del Insumo..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-audiobook"></i></span>
                                </div>
                                <input type="text" class="form-control insumo" placeholder="Nombre del Insumo..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Cantidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-book-multiple"></i></span>
                                </div>
                                <input class="form-control cantidad" placeholder="Cantidad del Insumo.." >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Precio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-receipt"></i></span>
                                </div>
                                <input type="text" class="form-control precio" placeholder="Precio del Insumo..">
                            </div>
                        </div>
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
<!-- End Create Modal Insumo -->
<!-- Start Edit Modal Insumo-->
<div class="modal fade" id="ModalEditInsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormEditInsumo" class="forms-sample">
                <input type="hidden" class="identificador">
                <div class="modal-header btn-gradient-info">
                    <h4 class="modal-title" id=""><i class="mdi mdi-factory"> Editar Insumo</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row p-3">
                        <input type="hidden" class="form-control tipoInsumo">
                        <div class="form-group col-md-6">
                            <label class="">Identificador</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-barcode-scan"></i></span>
                                </div>
                                <input type="text" class="form-control identificador" placeholder="Identificador del Insumo.." readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-audiobook"></i></span>
                                </div>
                                <input type="text" class="form-control insumo" placeholder="Nombre del Insumo..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Cantidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-book-multiple"></i></span>
                                </div>
                                <input class="form-control cantidad" placeholder="Cantidad del Insumo.." >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Precio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-receipt"></i></span>
                                </div>
                                <input type="text" class="form-control precio" placeholder="Precio del Insumo..">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-sm btn-gradient-danger" data-dismiss="modal"><i class="mdi mdi-close-octagon">Cancelar</i></button>
                    <button type="submit" class="btn btn-sm btn-gradient-info btn-fw"><i class="mdi mdi-plus">Guardar</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Modal Insumo -->
<!-- Delete Modal Insumo -->
<div class="modal fade" id="ModalDeleteInsumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-gradient-danger">
                <h4 class="modal-title"><i class="mdi mdi-factory"> Borrar Insumo</i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-white">
                <form id="FormDeleteInsumo" method="get">
                    <div class="form-group">
                        <input type="hidden" class="identificador">
                        <button type="submit" class="col-md-12 btn btn-lg btn-gradient-danger btn-fw"><i class="mdi mdi-plus">Eliminar</i></button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-gradient-info" data-dismiss="modal"><i class="mdi mdi-close-octagon">Cancelar</i></button>
            </div>
        </div>
    </div>
</div>
<!-- End Delete Modal Insumo -->