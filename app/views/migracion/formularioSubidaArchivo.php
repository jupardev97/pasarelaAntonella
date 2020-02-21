<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Migración de Datos</h4>
            <p class="card-description">
                Suba el Archivo de Texto que va a ser Provesado
            </p>
            <form id="formFileSubmit" enctype="multipart/form-data" class="forms-sample" action="<?= ROUTE_URL ?>Migracion" method="post" >
                <div class="form-group">
                    <label>Archivo</label>
                    <div class="input-group col-xs-12">
                        <input type="file" name="archivo" class="form-control col-12" placeholder="Subir Archivo">
                    </div>
                </div>
                <input type="submit" class="btn btn-gradient-primary mr-2" value="Subir">
            </form>
        </div>
    </div>
</div>