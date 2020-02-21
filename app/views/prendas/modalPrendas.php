<!-- Start Create Modal Prenda-->
<div class="modal fade" id="ModalCreatePrenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormCreatePrenda" class="forms-sample">
                <div class="modal-header btn-gradient-success">
                    <h4 class="modal-title" id=""><i class="mdi mdi-factory"> Agregar Prenda</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row p-3">
                        <input type="hidden" class="form-control tipoPrenda">
                        <div class="form-group col-md-6">
                            <label class="">Identificador</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-barcode-scan"></i></span>
                                </div>
                                <input type="text" class="form-control identificador" placeholder="Identificador del Prenda..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-audiobook"></i></span>
                                </div>
                                <input type="text" class="form-control prenda" placeholder="Nombre del Prenda..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Cantidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-book-multiple"></i></span>
                                </div>
                                <input class="form-control cantidad" placeholder="Cantidad del Prenda.." >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Precio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-receipt"></i></span>
                                </div>
                                <input type="text" class="form-control precio" placeholder="Precio del Prenda..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Color</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-book-open-variant"></i></span>
                                </div>
                                <input type="text" class="form-control color" placeholder="Color del Prenda..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""><?= utf8_encode('Descripción') ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-comment-text"></i></span>
                                </div>
                                <textarea class="form-control descripcion" placeholder="<?= utf8_encode('Descripción') ?> del Prenda.."></textarea>
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
<!-- End Create Modal Prenda -->
<!-- Start Edit Modal Prenda-->
<div class="modal fade" id="ModalEditPrenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormEditPrenda" class="forms-sample">
                <input type="hidden" class="identificador">
                <div class="modal-header btn-gradient-info">
                    <h4 class="modal-title" id=""><i class="mdi mdi-factory"> Editar Prenda</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row p-3">
                        <input type="hidden" class="form-control tipoPrenda">
                        <div class="form-group col-md-6">
                            <label class="">Identificador</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-barcode-scan"></i></span>
                                </div>
                                <input type="text" class="form-control identificador" placeholder="Identificador del Prenda.." readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-audiobook"></i></span>
                                </div>
                                <input type="text" class="form-control prenda" placeholder="Nombre del Prenda..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Cantidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-book-multiple"></i></span>
                                </div>
                                <input class="form-control cantidad" placeholder="Cantidad del Prenda.." >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Precio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-receipt"></i></span>
                                </div>
                                <input type="text" class="form-control precio" placeholder="Precio del Prenda..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Color</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-book-open-variant"></i></span>
                                </div>
                                <input type="text" class="form-control color" placeholder="Color del Prenda..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""><?= utf8_encode('Descripción') ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-comment-text"></i></span>
                                </div>
                                <textarea class="form-control descripcion" placeholder="<?= utf8_encode('Descripción') ?> del Prenda.."></textarea>
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
<!-- End Edit Modal Prenda -->
<!-- Delete Modal Prenda -->
<div class="modal fade" id="ModalDeletePrenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-gradient-danger">
                <h4 class="modal-title"><i class="mdi mdi-factory"> Borrar Prenda</i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-white">
                <form id="FormDeletePrenda" method="get">
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
<!-- End Delete Modal Prenda -->