
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tipos de Insumos Registrados</h4>
            <p class="card-description">
                Tabla de Control de los Tipos de Insumo
            </p>
            <table class="table table-bordered table-striped">
                <thead class='' style="text-align: center; background-color: crimson; color: #fff;">
                    <tr>
                        <th>
                            Identificador
                        </th>
                        <th>
                            Tipo de Insumo
                        </th>
                        <th>
                            Estado del Insumo
                        </th>
                        <th>
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['tipoInsumo'] as $result):
                            if($result->est_tip == 0){
                                $estado = 'Inactivo';
                            }else{
                                $estado = 'Activo';
                            }
                        ?>
                        <tr>
                            <td><?= $result->ide_tip ?></td>
                            <td><?= $result->tip_ins ?></td>
                            <td><?= $estado ?></td>
                            <td>
                                <button type="button" class="btn btn-gradient-info btn-rounded btn-icon">
                                    <i class="mdi mdi-lead-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <button type="button" class="btn btn-gradient-success btn-fw"><i class="mdi mdi-plus">Agregar</i></button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


