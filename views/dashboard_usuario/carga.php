<?php 
    include_once __DIR__ . "/../templates/dashboard_usuario/system_head_cl.php";
    include_once __DIR__ . "/../templates/dashboard_usuario/system_menu_cl.php";
?>
<main id="main" class="main">
<div class="pagetitle">
    <h1><?php echo $titulo2 . " - " .$tracking?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item ">
                <a href="/dashboard-u">Escritorio</a>
            </li>
            <li class="breadcrumb-item ">
                <a href="/embarques">Embarques</a>
            </li>
            <li class="breadcrumb-item ">
                Carga - <?php echo $tracking; ?>
            </li>
        </ol>
    </nav>
</div>
    <div class="col-xl-8 mt-2">
        <div class="card">
            <div class="card-body pt-3">
                <!-- opciones de folder -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                    <!-- Embarque -->
                    <li class="nav-item">
                        <button
                            class="nav-link active"
                            data-bs-toggle="tab"
                            data-bs-target="#profile-overview"
                            id="emb">
                                Embarcar
                        </button>
                    </li>

                    <!-- Guias -->
                    <li class="nav-item">
                        <button
                            <?php echo $v ?>
                            class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#profile-settings"
                            id="guia">
                            Guias
                        </button>
                    </li>

                    <!-- Historial -->
                    <li class="nav-item">
                        <button
                            <?php echo $v ?>
                            class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#profile-settings"
                            id="his">
                            Historial
                        </button>
                    </li>

                    <!-- Documentos -->
                    <li class="nav-item">
                        <button
                            class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#profile-change-password"
                            id="doc">
                            Documentos
                        </button>
                    </li>

                </ul>
            
            <div class="tab-content pt-2">

                <!-- informacion botos Generar embarque -->
                <div class="tab-pane fade profile-overview show active" id="profile-overview">
                    <h5 class="card-title">Generar embarque</h5>
                    <?php if($h) {?>
                            <p class="small fst-italic">El embarque ha sido genedaro y confirmado.</p>
                        <?php }else{?>
                            <p class="small fst-italic">Al confimar el embarque el cliente aceptara el contrato menciona que debe responder el correo.</p>
                    <?php }?>

                    <?php if ($h){?>
                    <h5 class="card-title">Detalles de la carga</h5>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Tracking</div>
                            <div class="col-lg-9 col-md-8"><?php echo $cargas->tracking; ?></div>
                        <div class="col-lg-3 col-md-4 label">Tienda u Origen</div>
                            <div class="col-lg-9 col-md-8"><?php echo $cargas->origen ?></div>
                        <div class="col-lg-3 col-md-4 label">Detalle</div>
                            <div class="col-lg-9 col-md-8"><?php echo $cargas->detalle ?></div>
                        <div class="col-lg-3 col-md-4 label">Fecha de Registro</div>
                            <div class="col-lg-9 col-md-8"><?php echo $cargas->f_registro ?></div>
                        <div class="col-lg-3 col-md-4 label">Valor en factura</div>
                            <div class="col-lg-9 col-md-8"><?php echo $cargas->factura; ?></div>
                    </div>
                    <?php }else{?>
                      <h5 class="card-title">Embarcar</h5>
                      <?php if(!$p){?>
                        <div class="row">
                            <form action="" method="post"></form>
                        </div>
                      <?php } else { echo 'Peso no registrado'; }?>
                    <?php }; ?>
                        

                </div>

                <!-- informacion de las guias -->
                <div class="tab-pane fade pt-3 profile-settings" id="profile-settings">
                  <div class="text-center">
                    <button type="button" class="btn btn-success btn-sm" id="guias">Agregar Guias</button>
                  </div>
                  <div class="row mb-3">
                    <h6><strong>Guias registradas</strong></h6>
                    <div class="col-md-8 col-lg-9">
                      <ul class="lista-guias list-group list-group-flush" id="lista-guias">
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- FIN DE informacion de las guias -->

                <!-- Area del Historial -->
                <div class="tab-pane fade pt-3 profile-history" id="profile-history">
                  <div class="row mb-3">
                    <h3 for="fullName" class="col-md-4 col-lg-3 col-form-label">Acciones Realizadas</h3>
                    <div class="col-md-8 col-lg-9">
                      <div class="hisrotial" id="contenedor-historial">
                        <ul class="lista-historial list-group list-group-flush" id="lista-historial"></ul>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary actualizar-estado" id="actualizar-estado">Actualizar</button>
                  </div>
                  
                </div>
                <!-- FIN DE HISTORIAL -->

                <!-- agregar o descargar documentos -->
                <div class="tab-pane fade pt-3 profile-change-password" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>
                <!-- FIN DE DOCUMENTOS -->

            </div><!-- End Bordered Tabs -->

            </div>
        </div>

        </div>

</main>
<script src="/build/js/embarque.js"></script>
<script src="/build/js/datoscarga.js"></script>
<script src="/build/js/guias.js"></script>
<script src="/build/js/history.js"></script>