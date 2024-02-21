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
                <?php echo $titulo; ?>
            </li>
        </ol>
    </nav>
</div>


<div class="row">
        <div class="col">
            <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="card-title text-center pb-0 fs-4">Registro de consignatarios.</h5>
                                <p class="text-center small">Para registrar un consignatario es importante tener el consentimiendo de la persona, siempre y cuando no sea cliente..</p>
                            </div>
                                <form action=" " method="post">
                                    <?php 
                                        include_once __DIR__ . "/../templates/alertas.php";
                                    ?>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                        <input 
                                        class="form-control" 
                                        type="text"
                                        placeholder="Nombre" 
                                        id="nombre"
                                        name="nombre"
                                        value = <?php echo s($consignatario->nombre)?>>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                        <input 
                                        type = "text"
                                        class="form-control" 
                                        placeholder="apellido" 
                                        id="apellido"
                                        name="apellido"
                                        value = <?php echo s($consignatario->apellido)?>>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                        <input 
                                        type = "num"
                                        class="form-control" 
                                        placeholder="Num. Cédula" 
                                        maxlength="10"
                                        id="cedula"
                                        name="cedula"
                                        value = <?php echo s($consignatario->cedula)?>
                                        >
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                    </div>
                                </form><!-- End Horizontal Form -->
                        </div>
                    </div>
            </div>
        </div>
        <div class="col">
        <?php if (count($consignatarios) === 0 ) {?>
                <p>No hay servicios registrados registradas.</p>
            <?php }else{ ?>
            <div class="col-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Cedula</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($consignatarios as $remitente){?>
                        <tr>
                            <td><?php echo $remitente->nombre; ?></td>
                            <td><?php echo $remitente->apellido; ?></td>
                            <td><?php echo $remitente->cedula; ?></td>
                        </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
    </div>


</main>