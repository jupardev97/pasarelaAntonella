<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-center p-5">
              <div class="brand-logo">
                <img src="<?= ROUTE_PUBLIC ?>images/logo.png">
              </div>
              <h4>Bienvenido!</h4>
              <h6 class="font-weight-light">Ingresa tus datos para Continuar!</h6>
              <form action="<?= ROUTE_URL.'Login' ?>" method="post" class="pt-3">
                <div class="form-group">
                    <input type="text" name="cedula" class="form-control form-control-lg" id="ide_user" placeholder="Usuario">
                </div>
                <div class="form-group">
                  <input type="password"name="clave" class="form-control form-control-lg" id="pas_user" placeholder="Clave">
                </div>
                <div class="mt-3">
                    <input type="submit" value="Ingresar" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="#" class="auth-link text-black">Olvidaste tus Datos?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>