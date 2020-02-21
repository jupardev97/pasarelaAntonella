
<div id="panelInfoPrendas" class="row mb-5">
    <div class="col-md-8 m-0 mb-4">
        <div class="card">
            <div class="card-header p-3 btn-gradient-info">
                <div class="row">
                    <div class="col-10">
                        <h4 id="tituloPrenda" class="text-light h3"></h4>
                    </div>
                    <div class="col-2">
                        <button type="button" class="close btnFadeInfoPrenda">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Identificador</h4>
                        <p id="identificadorPrenda" class="h6 lead pl-4 text-grey"></p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Prenda</h4>
                        <p id="nombrePrenda" class="h6 lead pl-4 text-grey"></p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Precio</h4>
                        <p id = "precioPrenda" class="h6 lead pl-4 text-grey"></p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Cantidad</h4>
                        <p id="cantidadPrenda" class="h6 lead pl-4 text-grey"></p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">color</h4>
                        <p id="colorPrenda" class="h6 lead pl-4 text-grey"></p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <h4 class="h5"><?= utf8_encode('Descripción') ?></h4>
                        <p id="descripcionPrenda" class="h6 lead pl-4 text-grey"></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Identificador Tipo Prenda</h4>
                        <p id="identificadorTipoPrenda" class="h6 lead pl-4 text-grey"></p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <h4 class="h5">Tipo Prenda</h4>
                        <p id="TipoPrenda" class="h6 lead pl-4 text-grey"></p>
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
                <button type="button" class="btn btn-gradient-info mt-2 btnEditModalPrenda" data-toggle="modal" data-target="#ModalEditPrenda"><i class="mdi mdi-lead-pencil"><span class="d-none d-lg-inline">  Editar</span></i></button>
                <button type="button" class="btn btn-gradient-danger mt-2 btnDeleteModalPrenda" data-toggle="modal" data-target="#ModalDeletePrenda"><i class="mdi mdi-delete"><span class="d-none d-lg-inline">Eliminar</span></i></button>
            </div>
        </div>
    </div>
</div>
