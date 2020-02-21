<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= WEB_NAME ?> / <?= $data['nombrePagina'] ?></title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="<?= ROUTE_URL ?>vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="<?= ROUTE_URL ?>vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" type="text/css" href="<?= ROUTE_URL ?>DataTables/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?= ROUTE_URL ?>alertify/css/alertify.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?= ROUTE_URL ?>alertify/css/themes/bootstrap.min.css"/>
        <!-- endinject -->
        <!-- inject:css -->
        <link rel="stylesheet" href="<?= ROUTE_URL ?>css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="<?= ROUTE_URL ?>images/favicon.png" />
    </head>
    <body>
        <div class="container-scroller">
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo " href="#"><img class="h-100" src="<?= ROUTE_URL ?>images/logo.png"/></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="count-symbol bg-danger"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                <h6 class="p-3 mb-0">Actividad</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-success">
                                            <i class="mdi mdi-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject font-weight-normal mb-1">Compras de Hoy</h6>
                                        <p class="text-gray ellipsis mb-0">
                                            Ventas Diarias
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-warning">
                                            <i class="mdi mdi-settings"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject font-weight-normal mb-1">Opciones</h6>
                                        <p class="text-gray ellipsis mb-0">
                                            Actualiza Inventario
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-info">
                                            <i class="mdi mdi-link-variant"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject font-weight-normal mb-1">Gestion de Cuentas</h6>
                                        <p class="text-gray ellipsis mb-0">
                                            Administrar
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <h6 class="p-3 mb-0 text-center">12/12/2019</h6>
                            </div>
                        </li>
                        <li class="nav-item d-none d-lg-block full-screen-link">
                            <a class="nav-link">
                                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                            </a>
                        </li>
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <div class="nav-profile-img">
                                    <img src="<?= ROUTE_URL ?>images/faces-clipart/pic-2.png">
                                    <span class="availability-status online"></span>             
                                </div>
                                <div class="nav-profile-text">
                                    <p class="mb-1 text-black"><?= $data['nombres'] ?></p>
                                </div>
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="mdi mdi-cached mr-2 text-success"></i>
                                    Editar Cuenta
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= ROUTE_URL ?>Login/cerrarSesion">
                                    <i class="mdi mdi-logout mr-2 text-primary"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <div class="container-fluid page-body-wrapper">
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROUTE_URL ?>Inicio">
                                <span class="menu-title">Inicio</span>
                                <i class="mdi mdi-home menu-icon text-danger"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-insumos" aria-expanded="false" aria-controls="ui-basic">
                                <span class="menu-title">Inventario</span>
                                <i class="menu-arrow text-danger"></i>
                                <i class="mdi mdi-audiobook menu-icon text-danger"></i>
                            </a>
                            <div class="collapse" id="ui-insumos">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="<?= ROUTE_URL ?>Insumo">Insumos</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= ROUTE_URL ?>Prenda">Prendas</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= ROUTE_URL ?>TipoInsumo">Tipo de Insumo</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= ROUTE_URL ?>TipoPrenda">Tipo de Prendas</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-compras" aria-expanded="false" aria-controls="ui-basic">
                                <span class="menu-title">Compras</span>
                                <i class="menu-arrow text-danger"></i>
                                <i class="mdi mdi-clipboard-text menu-icon text-danger"></i>
                            </a>
                            <div class="collapse" id="ui-compras">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="<?= ROUTE_URL ?>Proveedor">Proveedores</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="">Compra Insumos</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="">Compra Prendas</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-ventas" aria-expanded="false" aria-controls="ui-basic">
                                <span class="menu-title">Ventas</span>
                                <i class="menu-arrow text-danger"></i>
                                <i class="mdi mdi-barcode-scan menu-icon text-danger"></i>
                            </a>
                            <div class="collapse" id="ui-ventas">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="">Control Clientes</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="">Venta</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= ROUTE_URL ?>Iva">Iva</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php if( $data['cargo'] == 'administrador' ): ?>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-personal" aria-expanded="false" aria-controls="ui-basic">
                                <span class="menu-title">Personal</span>
                                <i class="menu-arrow text-danger"></i>
                                <i class="mdi mdi-contacts menu-icon text-danger"></i>
                            </a>
                            <div class="collapse" id="ui-personal">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="<?= ROUTE_URL ?>Trabajador">Trabajador</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= ROUTE_URL ?>Cargo">Cargos</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="menu-title">Pedidos</span>
                                <i class="mdi mdi-table-large menu-icon text-danger"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="menu-title">Reportes</span>
                                <i class="mdi mdi-chart-bar menu-icon text-danger"></i>
                            </a>
                        </li>
                        
                        
                         <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-Mantenimiento" aria-expanded="false" aria-controls="ui-basic">
                                <span class="menu-title">Mantenimiento</span>
                                <i class="menu-arrow text-danger"></i>
                                <i class="mdi mdi-clipboard-text menu-icon text-danger"></i>
                            </a>
                            <div class="collapse" id="ui-Mantenimiento">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="<?= ROUTE_URL ?>Migraciones">Migracion</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= ROUTE_URL ?>Migraciones/respaldo">Respaldo</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= ROUTE_URL ?>Migraciones/restaurar">Restaurar</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="main-panel">
                    <div class="content-wrapper fondo">