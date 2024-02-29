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
                Registro de compras
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
                            <form class="row p-2 m-2 w-60" action=" " method="post">
                                
                                <h5 class="card-title text-center pb-0 fs-4">
                                    Registrar Carga.
                                </h5>
                                <?php 
                                    include_once __DIR__ . "/../templates/alertas.php";
                                ?>
                                <!-- Información ingresada por el usuario -->
                                <label class="form-label">Informacion de la carga:</label>
                                    
                                    <div class="col-md-12">
                                        <input
                                            autocomplete="off"
                                            class="form-control" 
                                            type="text"
                                            placeholder="Nuevo tracking" 
                                            id="tracking"
                                            name="tracking"
                                            >
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <input
                                            autocomplete="off"
                                            type = "text"
                                            class="form-control" 
                                            placeholder="Donde lo compraste...?" 
                                            id="origen"
                                            name="origen">
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <input
                                            autocomplete="off"
                                            type = "text"
                                            class="form-control" 
                                            placeholder="Que producto vamos a registrar...?" 
                                            id="detalle"
                                            name="detalle">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <input
                                            autocomplete="off"
                                            type = "text"
                                            class="form-control" 
                                            placeholder="Cual es el valor de la compra...?" 
                                            id="factura"
                                            name="factura">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <select class="form-select" name="id_cliente" id="id_cliente">
                                            <option value=" ">--- seleccionar un cliente ---</option>
                                            <?php foreach ($clientes as $cliente){ ?>
                                                <option value="<?php echo $cliente->id ?>"><?php echo $cliente->nombre." ".$cliente->apellido?></option>
                                            <?php }?>
                                        </select>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <input class="btn btn-primary w-100" value="Guardar" type="submit"></input>
                                    </div>
                                    <div class="col-12">
                            </form>
                        </div>
                    </div>
                </div> 
            </div> 
        </section>
</main><!-- End #main -->