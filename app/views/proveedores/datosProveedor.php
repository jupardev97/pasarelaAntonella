<div id="divDatosProveedor" class="card mt-5 cardDatosProveedor">
    <div class="card-header p-3 btn-gradient-primary">
        <div class="row">
            <div class="col-10">
                <h4 class="text-light h3">Datos de <span id="nombreProveedor"></span></h4>
            </div>
            <div class="col-2">
                <button type="button" class="close btnReturnTableProveedor">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row datosProveedor">
            <div class="col-md-6">
                <h4 class="h5 text-primary">Rif</h4>
                <p class="h6 lead rif"></p>
            </div>
            <div class="col-md-6 mt-2">
                <h4 class="h5 text-primary">Nombre</h4>
                <p class="h6 lead nombre"></p>
            </div>
            <div class="col-md-6 mt-2">
                <h4 class="h5 text-primary">Tipo de Proveedor</h4>
                <p class="h6 lead tipoProveedor"></p>
            </div>
            <div class="col-md-6 mt-2">
                <h4 class="h5 text-primary">Direccion</h4>
                <p class="h6 lead direccion"></p>
            </div>
            <div class="col-md-6 mt-2">
                <h4 class="h5 text-primary">Telefono</h4>
                <p class="h6 lead telefono"></p>
            </div>
            <div class="col-md-6 mt-2">
                <h4 class="h5 text-primary">Correo</h4>
                <p class="h6 lead correo"></p>
            </div>
        </div>
    </div>
    
    
    <div class="card-footer bg-white text-center">
        <button type="button" class="btn btn-gradient-info mt-2 btnEditModalProveedor" data-toggle="modal" data-target="#ModalEditProveedor"><i class="mdi mdi-lead-pencil"><span class="d-none d-lg-inline">Editar</span></i></button>
        <button type="button" class="btn btn-gradient-primary mt-2 btnMostrarCompras">$<i class=""><span class="d-none d-lg-inline">Compras</span></i></button>
        <button type="button" class="btn btn-gradient-danger mt-2 btnDeleteModalProveedor" data-toggle="modal" data-target="#ModalDeleteProveedor"><i class="mdi mdi-delete"><span class="d-none d-lg-inline">Eliminar</span></i></button>
    </div>
</div>

<div id="divBusquedaCompras" class="card mt-5 cardDatosProveedor">
    <div class="card-header p-3 btn-gradient-primary">
        <div class="row">
            <div class="col-10">
                <h4 class="text-light h3">Compras del Proveedor</h4>
            </div>
            <div class="col-2">
                <button type="button" class="close btnMostrarCompras">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <!--
                <select class="form-control bg-primary bg-gradient-primary text-white estado">
                    <option value="todas" >Mostrar Todas sus Ventas</option>
                    <option value="fecha" >Fecha</option>
                </select>
                -->
            </div>
        </div>
            <form class="">
                   <div class="col-md-12">
                    <h4 class="h5 text-primary">Criterio de Busqueda</h4>
                </div>
                    <div class="form-group col-12">  
                        <div class="input-group">
                            <input type="text" class="form-control Proveedor" placeholder="Busqueda..">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-gradient-primary input-group-text buscar text-white"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </div>
            </form>
    </div>
</div>
<div id="divFacturas" class="row mt-5 cardDatosProveedor">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <!--<img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />-->
                <h4 class="font-weight-normal mb-3">Factura
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">001</h2>
                <h6 class="card-text">Monto: 25002 BS</h6>
                <h6 class="card-text">fecha: 2019-02-12</h6>
                <h6 class="card-text">Productos: 5</h6>
            </div>
            <div class="card-footer text-right">
                <button type="button" class="btn btn-gradient-success buscar btn-rounded btn-icon btnInfoCompra">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <!--<img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />-->
                <h4 class="font-weight-normal mb-3">Factura
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">003</h2>
                <h6 class="card-text">Monto: 25002 BS</h6>
                <h6 class="card-text">fecha: 2019-02-12</h6>
                <h6 class="card-text">Productos: 5</h6>
            </div>
            <div class="card-footer text-right">
                <button type="button" class="btn btn-gradient-success buscar btn-rounded btn-icon btnInfoCompra">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <!--<img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />-->
                <h4 class="font-weight-normal mb-3">Factura
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">002</h2>
                <h6 class="card-text">Monto: 25002 BS</h6>
                <h6 class="card-text">fecha: 2019-02-12</h6>
                <h6 class="card-text">Productos: 5</h6>
            </div>
            <div class="card-footer text-right">
                <button type="button" class="btn btn-gradient-success buscar btn-rounded btn-icon btnInfoCompra">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>
        </div>
    </div>
</div>
