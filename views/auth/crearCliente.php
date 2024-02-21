
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">
                                    <img class="logo2" src="../img/logo_gcbox.png" alt="">
                                    Crea tu cuenta!
                                </h1>
                            </div>
                            <form class="user" action="/crear-cuenta" method="POST">

                                <?php 
                                    include_once __DIR__ . "/../templates/alertas.php";
                                ?>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input
                                            autocomplete="off"
                                            type="text"
                                            class="form-control form-control-user"
                                            id="nombre"
                                            placeholder="Nombre"
                                            name="nombre"
                                            maxlength="150"
                                            value="<?php echo $cliente->nombre;?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input
                                            autocomplete="off"
                                            type="text"
                                            class="form-control form-control-user"
                                            id="apellido"
                                            placeholder="Apellido"
                                            name="apellido"
                                            maxlength="150"
                                            value="<?php echo $cliente->apellido;?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input
                                            autocomplete="off"
                                            type="number"
                                            class="form-control form-control-user"
                                            id="cedula"
                                            placeholder="Número de cédula"
                                            name="cedula"
                                            maxlength="10"
                                            value="<?php echo $cliente->cedula;?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input
                                            autocomplete="off"
                                            type="text"
                                            class="form-control form-control-user"
                                            id="provincia"
                                            placeholder="En qué provincia vives..?"
                                            name="provincia"
                                            maxlength="150"
                                            value="<?php echo $cliente->provincia;?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input
                                            autocomplete="off"
                                            type="text"
                                            class="form-control form-control-user"
                                            id="ciudad"
                                            placeholder="Cual es tu ciudad...?"
                                            name="ciudad"
                                            maxlength="150"
                                            value="<?php echo $cliente->ciudad;?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input
                                            autocomplete="off"
                                            type="text"
                                            class="form-control form-control-user"
                                            id="referencia"
                                            placeholder="Mas o menos por que sector..?"
                                            name="referencia"
                                            maxlength="250"
                                            value="<?php echo $cliente->referencia;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input
                                        autocomplete="off"
                                        type="text"
                                        class="form-control form-control-user"
                                        id="direccion"
                                        placeholder="En que direccion entregamos tus cosas...?"
                                        name="direccion"
                                        maxlength="250"
                                        value="<?php echo $cliente->direccion;?>">
                                </div>
                                <div class="form-group">
                                    <input
                                        autocomplete="off"
                                        type="email"
                                        class="form-control form-control-user"
                                        id="correo"
                                        placeholder="Correo, recuerda que sera tu usuario"
                                        name="correo"
                                        maxlength="250"
                                        value="<?php echo $cliente->correo;?>">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input
                                            autocomplete="off"
                                            type="number"
                                            class="form-control form-control-user"
                                            id="celular"
                                            placeholder="Nos dejas tu numero de celular"
                                            name="celular"
                                            maxlength="10"
                                            value="<?php echo $cliente->celular;?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input
                                            autocomplete="off"
                                            type="number"
                                            class="form-control form-control-user"
                                            id="telefono"
                                            placeholder="Tabién un telefono fijo (opcional)"
                                            name="telefono"
                                            maxlength="10"
                                            value="<?php echo $cliente->telefono;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input
                                        autocomplete="off"
                                        type="text"
                                        class="form-control form-control-user"
                                        id="promocion"
                                        placeholder="Tienes algún codigo de promoción (opcional)"
                                        name="promocion"
                                        maxlength="10"
                                        value="<?php echo $cliente->promocion;?>">
                                </div>
                                <div class="form-group">
                                    <input
                                        autocomplete="off"
                                        type="password"
                                        class="form-control form-control-user"
                                        id="pasword"
                                        placeholder="Crea una contraseña segura. Solo numeros"
                                        name="pasword">
                                </div>
                                <div class="form-group">
                                    <input
                                        autocomplete="off"
                                        type="password"
                                        class="form-control form-control-user"
                                        id="pasword2"
                                        placeholder="Por favor confirma tu pasword"
                                        name="pasword2">
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck" name="terminos">
                                        <label class="form-check-label" for="gridCheck">
                                            Estoy de acuerdo con <a href="/politicas-del-servicio-y-privacidad" class="text-dark font-weight-bolder" target="_blank">Terminos y condiciones</a>
                                        </label>
                                    </div>
                                </div>
                                <hr>

                                <button class="btn btn-primary btn-user btn-block">
                                    Registrar una nueva cuenta
                                </button>
                                    <a class="btn btn-danger btn-user btn-block link"  href="/">
                                        Salir sin registrarme
                                    </a>
                                    <hr>
                                    <a class="btn btn-info btn-user btn-block link"  href="/recuperar">
                                        Recuperar Cuenta
                                    </a>
                                    <a class="btn btn-primary btn-user btn-block link" href="/login">
                                        Iniciar Sesion
                                    </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small link" href="/politicas-del-servicio-y-privacidad" target="_blank"> Cuales son las politicas?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p class="p_final">
            En Gc-box tratamos de reducir al máximo el uso del papel, en nuestra plataforma podrás encontrar toda la documentación que necesitas. También queremos reducir la huella de carbono, si quieres ser parte de esto pregunta por nuestra entrega ecológica.
        </p>
    </div>