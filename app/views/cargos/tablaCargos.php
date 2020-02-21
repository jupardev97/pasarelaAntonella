<div class="card">
    <div class="card-body">
        <h4 class="card-title">Tabla de Control <small class="text-muted">Cargos</small> </h4>
        <hr>
        <div  class="content table-responsive">
            <table id="tblCargos" class="table table-striped table-hover">
                <thead class='btn-gradient-primary' style="text-align:center;">
                    <tr>
                        <th>
                            Identificador
                        </th>
                        <th>
                            Cargo
                        </th>
                        <th>
                            Horas de Trabajo
                        </th>
                        <th>
                            Pago por Hora
                        </th>
                        <th>
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($data['cargos']['reg']):
                        foreach ($data['cargos']['data'] as $obj):
                            ?>
                            <tr>
                                <td class="identificador"><?= $obj->ide_car ?></td>
                                <td class="cargo"><?= $obj->tip_car ?></td>
                                <td class="horas"><?php echo ($obj->hor_tra) ? ($obj->hor_tra) : 'Sin Registrar'; ?></td>
                                <td class="pago"><?php echo ($obj->pag_hor) ? ($obj->pag_hor . ' Bsf') : 'Sin Registrar'; ?></td>
                                <td>
                                    <button type="button" class="btn btn-gradient-info btn-rounded btn-icon btnEditCargo" data-toggle="modal" data-target="#ModalEditCargo">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
</div>

