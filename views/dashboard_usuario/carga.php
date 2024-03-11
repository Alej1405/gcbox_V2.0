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
                    <h5 class="card-title">Detalles generales</h5>
                      <ul>
                        <li><strong>Cliente:</strong> <?php echo $cliente->nombre." ".$cliente->apellido; ?></li>
                        <li><strong>Tracking:</strong> <?php echo $cargas->tracking; ?></li>
                        <li><strong>Tienda u Origen:</strong> <?php echo $cargas->origen ?></li>
                        <li><strong>Detalle:</strong> <?php echo $cargas->detalle ?></li>
                        <li><strong>Fecha de Registro:</strong> <?php echo $cargas->f_registro ?></li>
                        <li><strong>Valor en factura:</strong> <?php echo $cargas->factura; ?></li>
                        <li><strong>Fecha del embarque:</strong> <?php echo $cliente->nombre." ".$cliente->apellido; ?></li>
                        <li><strong>Observacion del embarque:</strong> <?php echo $emb->comentario; ?></li>
                      </ul>
                    <?php }else{?>
                      <h5 class="card-title">Embarcar</h5>
                      <?php if(!$p == 0){?>
                        <div class="row">
                            <a class="btn btn-primary" href="/crear/embarque?t=<?php echo $cargas->tracking?>">embarcar</a>
                        </div>
                      <?php } else { echo 'Peso no registrado'; }?>
                    <?php }; ?>
                        

                </div>

                <!-- informacion de las guias -->
                <div class="container text-center tab-pane fade pt-3 profile-settings" id="profile-settings">
                  <div class="row justify-content-start">
                    <div class="col-5">
                      <form class="row p-0 align-self-center" action="/api/guia" method="post">
                        <label class="form-label">Ingresa lo siguiente:</label>
                          <div class="col-md-12">
                              <input
                                  autocomplete="off"
                                  readonly
                                  class="form-control" 
                                  type="text"
                                  placeholder="Ingresa el numero de guia" 
                                  id="tracking"
                                  name="tracking"
                                  value="<?php echo $cargas->tracking ?>"
                                  >
                          </div>
                          <div class="col-md-12 mt-2">
                              <input
                                  autocomplete="off"
                                  class="form-control" 
                                  type="text"
                                  placeholder="Ingresa el numero de guia" 
                                  id="guia"
                                  name="guia"
                                  >
                          </div>
                          <div class="col-md-12 mt-2">
                              <input
                                  autocomplete="off"
                                  class="form-control" 
                                  type="text"
                                  placeholder="observaciones" 
                                  id="observaciones"
                                  name="observaciones"
                                  >
                          </div>
                          <div class="col-md-12 mt-2">
                              <select class="form-select" name="id_consignatario" id="id_consignatario">
                                <option value=" ">--- Selecciona un consignatario ---</option>
                                <?php foreach($consi as $con){ ?>
                                  <option value="<?php echo $con -> id ?>"><?php echo $con -> nombre." ".$con->apellido ?></option>
                                <?php } ?>
                              </select>
                          </div>

                          <div class="col-12 mt-2">
                              <input class="btn btn-primary w-100" value="Embarcar" type="submit">
                          </div>

                      </form>
                    </div>
                    <div class="col-7">
                      <h6><strong>Guias registradas</strong></h6>
                      <div class="">
                        <ul class="lista-guias list-group list-group-flush" id="lista-guias">
                        </ul>
                      </div>
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
                  <form  action="/cargas-doc" method="post" enctype="multipart/form-data">
                  <?php 
                                    include_once __DIR__ . "/../templates/alertas.php";
                                ?>
                  <div class="row mb-3">
                      <label for="doc" class="col-md-4 col-lg-3 col-form-label">Tracking</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="tracking" readonly type="text" class="form-control" id="tracking" value="<?php echo $tracking ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Tipo de documento" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select" name="tipo" id="tipo">
                          <option value="">--- Selecciona que documento es---</option>
                          <option value="1">Factura de Compra</option>
                          <option value="2">Factura de Servicios</option>
                          <option value="3">Liquidacion Aduana</option>
                          <option value="4"> D A S </option>
                          <option value="5">Otros </option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="doc" class="col-md-4 col-lg-3 col-form-label">Documento</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="doc" type="file" class="form-control" id="doc">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="detalle" class="col-md-4 col-lg-3 col-form-label">Observacion</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="detalle" type="password" class="form-control" id="detalle">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar Documento</button>
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