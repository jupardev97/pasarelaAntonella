<!-- Start Create Modal Proveedor-->
<div class="modal fade" id="ModalCreateProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormCreateProveedor" class="forms-sample">
                <div class="modal-header btn-gradient-success">
                    <h4 class="modal-title" id=""><i class="mdi mdi-factory"> Agregar Proveedor</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row p-3">
                        <div class="form-group col-md-6">
                            <label class="">Rif</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-contacts menu-icon"></i></span>
                                </div>
                                <input type="text" class="form-control rif" placeholder="Rif del Proveedor..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-contacts menu-icon"></i></span>
                                </div>
                                <input type="text" class="form-control nombre" placeholder="Nombre del Proveedor..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Direccion</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-city"></i></span>
                                </div>
                                <textarea class="form-control direccion" placeholder="Direccion del Proveedor.." ></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Correo Electronico</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white">@</span>
                                </div>
                                <input type="text" class="form-control correo" placeholder="Correo Electronico..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Numero de Telefono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-cellphone-basic"></i></span>
                                </div>
                                <input type="tel" class="form-control telefono" placeholder="Numero Telefonico..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tipo de Proveedor</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-factory"></i></span>
                                </div>
                                <input type="text" class="form-control tipoProveedor" placeholder="Tipo de Proveedor..">
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
<!-- End Create Modal Proveedor -->
<!-- Start Edit Modal Proveedor-->
<div class="modal fade" id="ModalEditProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormEditProveedor" class="forms-sample">
                <input type="hidden" class="identificador">
                <div class="modal-header btn-gradient-info">
                    <h4 class="modal-title" id=""><i class="mdi mdi-factory"> Editar Proveedor</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row p-3">
                        <div class="form-group col-md-6">
                            <label class="">Rif</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-contacts menu-icon"></i></span>
                                </div>
                                <input type="text" class="form-control rif" placeholder="Rif del Proveedor.." readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-contacts menu-icon"></i></span>
                                </div>
                                <input type="text" class="form-control nombre" placeholder="Nombre del Proveedor..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Direccion</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-city"></i></span>
                                </div>
                                <textarea class="form-control direccion" placeholder="Direccion del Proveedor.." ></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Correo Electronico</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white">@</span>
                                </div>
                                <input type="text" class="form-control correo" placeholder="Correo Electronico..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Numero de Telefono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-cellphone-basic"></i></span>
                                </div>
                                <input type="tel" class="form-control telefono" placeholder="Numero Telefonico..">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tipo de Proveedor</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-factory"></i></span>
                                </div>
                                <input type="text" class="form-control tipoProveedor" placeholder="Tipo de Proveedor..">
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
<!-- End Edit Modal Proveedor -->
<!-- Delete Modal Proveedor -->
<div class="modal fade" id="ModalDeleteProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-gradient-danger">
                <h4 class="modal-title"><i class="mdi mdi-factory"> Borrar Proveedor</i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-white">
                <form id="FormDeleteProveedor" method="get">
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
<!-- End Delete Modal Proveedor -->

