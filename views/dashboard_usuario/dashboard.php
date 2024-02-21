<?php 
    include_once __DIR__ . "/../templates/dashboard_usuario/system_head_cl.php";
    include_once __DIR__ . "/../templates/dashboard_usuario/system_menu_cl.php";
?>
<main id="main" class="dashboad">

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
        
        <!-- Right side columns -->
        <div class="col-lg-4">
        <a class="btn btn-light" href="/registrar-compra" role="button">Registrar compras</a>
        </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->