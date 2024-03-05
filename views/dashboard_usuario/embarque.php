<?php 
    include_once __DIR__ . "/../templates/dashboard_usuario/system_head_cl.php";
?>
<?php
    include_once __DIR__ . "/../templates/dashboard_usuario/system_menu_cl.php";
?>
<main id="main" class="main">

<div class="pagetitle">
    <h1><?php echo $titulo?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="/dashboard-u">Escritorio</a>
            </li>
            <li class="breadcrumb-item active">
                Registro de Embarque
            </li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->
        <section class="flex-column">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                        <form class="row mt-2" action=" " method="post">
                        <h5 class="card-title text-center pb-0 fs-4">
                                    Registrar y notificar embarque.
                                </h5>
                            <?php 
                                include_once __DIR__ . "/../templates/alertas.php";
                            ?>
                            <label class="form-label">Ingresa lo siguiente:</label>
                                <div class="col-md-12 mt-2">
                                    <input
                                        autocomplete="off"
                                        class="form-control" 
                                        type="text"
                                        placeholder="Orden de embarque" 
                                        id="orden"
                                        name="orden"
                                        >
                                </div>
                                <div class="col-md-12 mt-2">
                                    <input
                                        autocomplete="off"
                                        class="form-control" 
                                        type="text"
                                        placeholder="Warehouse" 
                                        id="wh"
                                        name="wh"
                                        >
                                </div>
                                <div class="col-md-12 mt-2">
                                    <input
                                        autocomplete="off"
                                        class="form-control" 
                                        type="text"
                                        placeholder="Observacion" 
                                        id="comentario"
                                        name="comentario"
                                        >
                                </div>
                                <div class="col-12 mt-2">
                                    <input class="btn btn-primary w-100" value="Embarcar" type="submit">
                                </div>

                            </form>
                        </div>
                    </div>
                </div> 
            </div> 
        </section>
</main><!-- End #main -->