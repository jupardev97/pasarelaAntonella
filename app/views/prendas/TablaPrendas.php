<div id="cardTablaPrenda" class="card mb-5 hidde">
    <div class="card-header p-3 btn-gradient-primary">
        <div class="row">
                <div class="col-10">
                        <h4 class="card-title text-white">Tabla de Control <small class="nombrePrenda"></small></h4>
                </div>
        <div class="col-2">
                <button type="button" class="close btnCloseTablePrenda">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div  class="content table-responsive">
            <table id="tblPrenda" class="table table-striped table-hover">
                <thead class='btn-gradient-danger' style="text-align:center;">
                    <tr>
                        <th>
                            Identificador
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            cantidad
                        </th>
                        <th>
                            Precio
                        </th>
                        <th>
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <button type="button" id="btnModalCreatePrenda" class="btn btn-gradient-danger btn-fw" data-toggle="modal" data-target="#ModalCreatePrenda"><i class="mdi mdi-plus">Agregar</i></button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
