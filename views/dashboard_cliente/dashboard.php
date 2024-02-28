<?php 
    include_once __DIR__ . "/../templates/dashboard_cliente/system_head_cl.php";
?>
<?php
    include_once __DIR__ . "/../templates/dashboard_cliente/system_menu_cl.php";
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Hola, <?php echo $nombre;?>!!</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    Bienvenido/a, Estamos para ayudarte.
                </li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
<hr>
    <section class="section dashboard P">
        <h6>Importaciones en proceso.</h6>
        <?php if (count($cargas) === 0 ) {?>
                <p>No tienes importaciones en transito o registradas.</p>
            <?php }else{ ?>
                <div class="row">
                        <?php foreach ($cargas as $carga){ ?>
                        <!-- consulta de la base de datos -->
                            <div class="col">
                                <div class="col-10">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <i class="ri-box-3-line"></i>
                                                <?php echo $carga->tracking; ?>
                                            </h5>
                                            <!-- <h6 class="card-subtitle mb-2 text-muted">Arribo UIO</h6> -->
                                            <p>
                                                <?php echo $carga -> detalle; ?><br>
                                                Tienda:
                                                <?php echo $carga -> origen; ?><br>
                                                Fecha de Registro:
                                                <?php echo $carga -> f_registro; ?>
                                                Peso:
                                                <?php if ($carga -> peso == 0){?>
                                                    Sin reporte en Miami
                                                <?php }else { echo $carga -> peso; }?>
                                            </p>
                                            <a href="#" class="card-link">
                                                <i class="ri-file-history-fill"></i>
                                            </a>
                                            <a href="#" class="card-link">Pagar</a>
                                            <a href="#" class="card-link">
                                                <i class="ri-file-download-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- End Cargas en proceso -->
                        <?php }?>
                    </div>
            <?php } ?>
        <!-- Right side columns -->
        <div class="col-lg-4">
        <a class="btn btn-light" href="/registrar-compra" role="button">Registrar compras</a>
        </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->