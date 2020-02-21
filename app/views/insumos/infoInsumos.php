<div id="panelInfoInsumos" class="row mb-5">
    <div class="col-md-8 m-0 mb-4">
        <div class="card">
            <div class="card-header p-3 btn-gradient-info">
                <div class="row">
                    <div class="col-10">
                        <h4 id="tituloInsumo" class="text-light h3"></h4>
                    </div>
                    <div class="col-2">
                        <button type="button" class="close btnFadeInfoInsumo">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Identificador</h4>
                        <p id="identificadorInsumo" class="h6 lead pl-4 text-grey"></p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Insumo</h4>
                        <p id="nombreInsumo" class="h6 lead pl-4 text-grey"></p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Precio</h4>
                        <p id = "precioInsumo" class="h6 lead pl-4 text-grey"></p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Cantidad</h4>
                        <p id="cantidadInsumo" class="h6 lead pl-4 text-grey"></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Identificador Tipo Insumo</h4>
                        <p id="identificadorTipoInsumo" class="h6 lead pl-4 text-grey"></p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Tipo Insumo</h4>
                        <p id="TipoInsumo" class="h6 lead pl-4 text-grey"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 m-0">
        <div class="card">
            <div class="card-header p-3 btn-gradient-primary">
                <h4 class="h3">Opciones</h4>
            </div>
            <div class="card-footer bg-white text-center">
                <button type="button" class="btn btn-gradient-info mt-2 btnEditModalInsumo" data-toggle="modal" data-target="#ModalEditInsumo"><i class="mdi mdi-lead-pencil"><span class="d-none d-lg-inline">  Editar</span></i></button>
                <button type="button" class="btn btn-gradient-danger mt-2 btnDeleteModalInsumo" data-toggle="modal" data-target="#ModalDeleteInsumo"><i class="mdi mdi-delete"><span class="d-none d-lg-inline">Eliminar</span></i></button>
            </div>
        </div>
    </div>
</div>
