<!-- Start Create Modal Trabajadores-->
<div class="modal fade" id="ModalCreateTrabajador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormCreateTrabajador" class="forms-sample">
                <div class="modal-header btn-gradient-success">
                    <h4 class="modal-title" id=""><i class="mdi mdi-account-card-details"> Agregar Trabajador</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row p-3">
                        <div class="form-group col-md-6">
                            <label class="">Cedula</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-contacts menu-icon"></i></span>
                                </div>
                                <input type="text" class="form-control cedula" placeholder="Cedula del Trabajador.." pattern="([0-9]+){7}" maxlength="8" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nombres y Apellidos</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-contacts menu-icon"></i></span>
                                </div>
                                <input type="text" class="form-control nombresApellidos" placeholder="Nombres y Apellidos.." pattern="([a-zA-ZáéíóúñÁÉÍÓÚ\s]+){3}" maxlength="30" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Direccion</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-city"></i></span>
                                </div>
                                <textarea class="form-control direccion" placeholder="Direccion del Trabajador.." ></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Correo Electronico</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white">@</span>
                                </div>
                                <input type="email" class="form-control correo" placeholder="Correo Electronico.." pattern="^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)" maxlength="30">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Numero de Telefono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-cellphone-basic"></i></span>
                                </div>
                                <input type="tel" class="form-control telefono" placeholder="Numero Telefonico.." pattern="([0-9]){11,15}" maxlength="15">
                            </div>
                        </div>
                        <div class="form-group col-md-6 divClave hidde">
                            <label for="">Clave</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-success text-white"><i class="mdi mdi-lock-open"></i></span>
                                </div>
                                <input type="password" class="form-control clave" placeholder="Clave.." pattern="([0-9A-Za-z]){6}" maxlength="10">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Cargo</label>
                            <select class="form-control cargo">
                                <!--<option value="administrador" >Administrador</option>
                                <option value="vendedor(a)" >Vendedor(a)</option>-->
                                
                                <?php
                                    foreach( $data['cargos'] as $cargo ):
                                ?>
                                    <option value="<?= $cargo->ide_car ?>" ><?= ucfirst($cargo->tip_car) ?></option>
                                <?php    
                                    endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-sm btn-gradient-danger" data-dismiss="modal"><i class="mdi mdi-close-octagon">Cancelar</i></button>
                    <button type="button" class="btn btn-sm btn-gradient-primary toggleClave"><i class="mdi mdi-lock-open">Clave</i></button>
                    <button type="submit" class="btn btn-sm btn-gradient-success btn-fw"><i class="mdi mdi-plus">Guardar</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Create Modal Trabajadores -->
<!-- Start Info Modal Trabajadores-->
<div id="ModalInfoTrabajador" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header btn-gradient-primary">
                <h4 class="modal-title" id=""><i class="mdi mdi-account-card-details"> Informacion del Trabajador</i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-white">
                <div class="row">
                    <div class="col-xm-12 col-md-12 col-lg-6">
                        <div class="card border-primary">
                            <div class="card-header text-light btn-gradient-primary">Datos Personales</div>
                            <div class="card-body">
                                <ul class="list-ticked infoTrabajador">
                                    <li>Cedula
                                        <ul class="list-arrow">
                                            <li class="cedula"></li>
                                        </ul>
                                    </li>
                                    <li>Nombres y Apellidos
                                        <ul class="list-arrow">
                                            <li class="nombre"></li>
                                        </ul>
                                    </li>
                                    <li>Direccion
                                        <ul class="list-arrow">
                                            <li class="direccion"></li>
                                        </ul>
                                    </li>
                                    <li>Correo
                                        <ul class="list-arrow">
                                            <li class="correo"></li>
                                        </ul>
                                    </li>
                                    <li>Telefono
                                        <ul class="list-arrow">
                                            <li class="telefono"></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xm-12 col-md-12 col-lg-6">
                        <div class="card border-primary">
                            <div class="card-header text-light btn-gradient-primary">Datos Laborales</div>
                            <div class="card-body">
                                <ul class="list-ticked infoTrabajador">
                                    <li>Cargo
                                        <ul class="list-arrow">
                                            <li class="cargo"></li>
                                        </ul>
                                    </li>
                                    <li>Horas de Trabajo
                                        <ul class="list-arrow">
                                            <li class="horas"></li>
                                        </ul>
                                    </li>
                                    <li>Pago  por Horas
                                        <ul class="list-arrow">
                                            <li class="pago"></li>
                                        </ul>
                                    </li>
                                    <li>Sueldo
                                        <ul class="list-arrow">
                                            <li class="sueldo"></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-gradient-primary" data-dismiss="modal">Regresar</i></button>
            </div>
        </div>
    </div>
</div>
<!-- End Info Modal Trabajadores -->
<!-- Start Edit Modal Trabajadores-->
<div class="modal fade" id="ModalEditTrabajador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="FormEditTrabajador" class="forms-sample">
                <div class="modal-header btn-gradient-info">
                    <h4 class="modal-title" id=""><i class="mdi mdi-account-card-details"> Agregar Trabajador</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row p-3">
                        <div class="form-group col-md-12 col-lg-6">
                            <label class="">Cedula</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-contacts menu-icon"></i></span>
                                </div>
                                <input type="text" class="form-control cedula" placeholder="Cedula del Trabajador.." readonly pattern="([0-9]+){7}" maxlength="8">
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="">Nombres y Apellidos</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-contacts menu-icon"></i></span>
                                </div>
                                <input type="text" class="form-control nombre" placeholder="Nombres y Apellidos.." pattern="([a-zA-ZáéíóúñÁÉÍÓÚ\s]+){3}" maxlength="30" required>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="">Direccion</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-city"></i></span>
                                </div>
                                <textarea class="form-control direccion" placeholder="Direccion del Trabajador.." ></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="">Correo Electronico</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white">@</span>
                                </div>
                                <input type="email" class="form-control correo" placeholder="Correo Electronico.." pattern="^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)" maxlength="30">
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="">Numero de Telefono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-cellphone-basic"></i></span>
                                </div>
                                <input type="tel" class="form-control telefono" placeholder="Numero Telefonico.." pattern="([0-9]){11,15}" maxlength="15">
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-6 divClave hidde">
                            <label for="">Clave</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-info text-white"><i class="mdi mdi-lock-open"></i></span>
                                </div>
                                <input type="password" class="form-control clave" placeholder="Clave.." pattern="([0-9A-Za-z]){6}" maxlength="10">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Cargo</label>
                            <select class="form-control cargo">
                                <!--<option value="administrador" >Administrador</option>
                                <option value="vendedor(a)" >Vendedor(a)</option>-->  
                                <?php
                                    foreach( $data['cargos'] as $cargo ):
                                ?>
                                    <option value="<?= $cargo->ide_car ?>" ><?= ucfirst($cargo->tip_car) ?></option>
                                <?php    
                                    endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-sm btn-gradient-danger" data-dismiss="modal"><i class="mdi mdi-close-octagon">Cancelar</i></button>
                    <button type="button" class="btn btn-sm btn-gradient-primary toggleClave"><i class="mdi mdi-lock-open">Clave</i></button>
                    <button type="submit" class="btn btn-sm btn-gradient-info btn-fw"><i class="mdi mdi-plus">Guardar</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Modal Trabajadores -->
<!-- Delete Modal Trabajadores -->
<div class="modal fade" id="ModalDeleteTrabajador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-gradient-danger">
                <h4 class="modal-title"><i class="mdi mdi-account-card-details"> Borrar Trabajador</i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-white">
                <form id="FormDeleteTrabajador" method="get">
                    <div class="form-group">
                        <input type="hidden" class="cedula">
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
<!-- End Delete Modal Trabajadores -->
