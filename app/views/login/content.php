<div class="content-login container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100">
        <div class="login p-5">
                <h1 class="title text-danger">Iniciar Sesion</h1>
                <hr class="btn-danger">
                <form action="<?= ROUTE_URL . 'Login' ?>" method="post" class="pt-3">
                    <div class="form-group">
                        <label class="text-danger">Cedula</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-danger text-white"><i class="mdi mdi-account"></i></span>
                            </div>
                            <input type="text" class="form-control" name="cedula" class="form-control" placeholder="Cedula..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-danger">Clave</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-danger text-white"><i class="mdi mdi-lock"></i></span>
                            </div>
                            <input type="password" name="clave" class="form-control" placeholder="Clave..">
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <input type="submit" value="Ingresar" class="btn btn-gradient-danger font-weight-medium auth-form-btn">
                    </div>
                </form>
        </div>
    </div>
</div>