  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('/build/img/illustration-registro.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header ">
                  <h4 class="font-weight-bolder">Registrarse</h4>
                  <p class="mb-0">Ingresa tus datos y un password para registrarte.</p>
                </div>

                <?php 
                    include_once __DIR__ . "/../templates/alertas.php";
                ?>

                <div class="card-body">
                  <form role="form" method="POST" action="/crear-cuenta">
                    <div class="input-group input-group-outline mb-3">
                      <label for = "nombre" class="form-label">Nombre</label>
                      <input
                        onfocus="focused(this)"
                        onfocusout="defocused(this)"
                        autocomplete = "off"
                        type = "text" 
                        class = "form-control"
                        id = "nombre"
                        name = "nombre"
                        value="<?php echo $usuario->nombre ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input
                        autocomplete = "off"
                        type="email" 
                        class="form-control"
                        id = "email"
                        name = "email"
                        value="<?php echo $usuario->email ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label for = "celular" class="form-label">Celular</label>
                      <input
                        autocomplete = "off"
                        type="number"
                        class="form-control"
                        id = "celular"
                        name = "celular"
                        value="<?php echo $usuario->celular ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label for = "password" class="form-label">Password</label>
                      <input
                        autocomplete = "off"
                        type="password" 
                        class="form-control"
                        id = "password"
                        name = "password">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label for = "password" class="form-label">Repite el password</label>
                      <input
                        autocomplete = "off"
                        type="password" 
                        class="form-control"
                        id = "password2"
                        name = "password2">
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                      <input
                        class="form-check-input" 
                        type="checkbox" 
                        value="1" 
                        id="flexCheckDefault"
                        name="terminos"
                        checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        Estoy de acuerdo con <a href="#" class="text-dark font-weight-bolder">Terminos y condiciones</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0">Registrar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Ya tienes una cuenta?
                    <a href="/login" class="text-success text-gradient font-weight-bold">Ingresa aqui.</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>