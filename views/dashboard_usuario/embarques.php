<?php

use Model\Cliente;

    include_once __DIR__ . "/../templates/dashboard_usuario/system_head_cl.php";
    include_once __DIR__ . "/../templates/dashboard_usuario/system_menu_cl.php";
?>
<main id="main" class="dashboad">
    <div class="pagetitle">
    <h1><?php echo $titulo?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="/dashboard-u">Escritorio</a>
                </li>
                <li class="breadcrumb-item active">
                    <?php echo $titulo ?>
                </li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
<hr>
<section class="section dashboard P">
<h6>Cargas en proceso o embarcadas.</h6>
        <?php if (count($cargas) === 0 ) {?>
                <p>No hay cargas registradas o en proceso.</p>
            <?php }else{ ?>
                <div class="row">
                    <?php foreach($cargas as $carga){?>
                        <!-- consulta de la base de datos -->
                            <div class="col">
                                <div class="col-10">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body border-primary">
                                            <h5 class="card-title">
                                                <a href="/embarques-carga?t=<?php echo $carga->tracking?>">    
                                                    <i class="ri-box-3-line"></i>
                                                    <?php echo $carga->tracking?>
                                                </a>
                                            </h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Arribo UIO</h6>
                                            <p>
                                                <?php 
                                                    $cliente= Cliente::where('id', $carga->id_cliente);
                                                ?>
                                                    Cliente: <?php echo $cliente->nombre." ".$cliente->apellido ?>
                                                <br>
                                                    Tienda: <?php echo $carga->origen ?>
                                                <br>
                                                    Peso: <?php echo $carga->peso ?>
                                                <br>
                                                    Fecha de Registro: <?php echo $carga->f_registro ?>
                                            </p>
                                            <button
                                                type="button"
                                                class="btn btn-light"
                                                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                            Actualizar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- End Cargas en proceso -->
                        <?php }?>
                    </div>
                <?php } ?>

    
</section>
