<!-- Start Create Modal Iva-->
<div class="modal fade" id="ModalCreateIva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormCreateIva" class="forms-sample">
                <div class="modal-header btn-gradient-success">
                    <h4 class="modal-title" id=""><i class="mdi mdi-calculator"> Agregar Iva</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row p-3">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="">Porcentaje</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white">%</span>
                                </div>
                                <input type="text" class="form-control porcentaje" placeholder="Porcentaje..">
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="">Fecha de Actualizacion</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white fechaActual"><i class="mdi mdi-calendar-clock"></i></span>
                                </div>
                                <input type="date" class="form-control fecha" placeholder="Fecha de Actualizacion..">
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
<!-- End Create Modal Iva -->
<!-- Start Edit Modal Iva-->
<div class="modal fade" id="ModalEditIva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormEditIva" class="forms-sample">
                <div class="modal-header btn-gradient-info">
                    <h4 class="modal-title" id=""><i class="mdi mdi-calculator"> Editar Iva</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row p-3">
                        <input type="hidden" class="identificador">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="">Porcentaje</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white">%</span>
                                </div>
                                <input type="text" class="form-control porcentaje" placeholder="Porcentaje..">
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="">Fecha de Actualizacion</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white fechaActual"><i class="mdi mdi-calendar-clock"></i></span>
                                </div>
                                <input type="date" class="form-control fecha" placeholder="Fecha de Actualizacion..">
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
<!-- End Edit Modal Iva -->
<!-- Delete Modal Iva -->
<div class="modal fade" id="ModalDeleteIva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-gradient-danger">
                <h4 class="modal-title"><i class="mdi mdi-calculator"> Borrar Iva</i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-white">
                <form id="FormDeleteIva" method="get">
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
<!-- End Delete Modal Iva -->
