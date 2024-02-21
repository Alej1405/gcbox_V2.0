<?php 
    include_once __DIR__ . "/../templates/dashboard_usuario/system_head_cl.php";
    include_once __DIR__ . "/../templates/dashboard_usuario/system_menu_cl.php";
?>
<main class="main" id="main">

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
    <div class="row">
        <div class="col">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action=" " method="post">
                                <?php 
                                    include_once __DIR__ . "/../templates/alertas.php";
                                ?>
                            <!-- FORMUALRIO DE FRACCIONAMIENTO -->
                            <div class="col-20">
                                    <legend class="col-form-label pt-3">Datos del servicio:</legend>
                                    <fieldset class="row mb-3">
                                        
                                        <div class="col-md-10">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input
                                                id="nombre"
                                                name="nombre"
                                                type="text" 
                                                class="form-control"
                                                placeholder="Como se va a nombrar el servicio."
                                                value="<?php echo $servicio->nombre ?>"
                                                >
                                        </div>

                                        <div class="col-md-10 mt-2">
                                            <label for="u_medida" class="form-label">Unidad de Medida.
                                            </label>
                                            <div class="input-group">
                                                <select  class="form-select" name="u_medida" id="u_medida">
                                                    <option value="" selected>Selecciona una unidad</option></option>
                                                    <option value="l">Libras</option>
                                                    <option value="k">Kilos</option>
                                                    <option value="c">Cajas</option>
                                                    <option value="p">Paquete</option>
                                                    <option value="f">Fraccion</option>
                                                    <option value="t">Transporte</option>
                                                    <option value="i">Pick Up</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <label for="costo" class="form-label">Costo (incluido el IVA)</label>
                                            <input
                                                type="text" 
                                                class="form-control"
                                                id="costo"
                                                name="costo"
                                                value="<?php echo $servicio->costo; ?>"
                                                >
                                        </div>
                                        <div class="col-md-5 mt-2">
                                            <label for="pvp" class="form-label">PVP (incluido el IVA)</label>
                                            <input
                                                type="text" 
                                                class="form-control"
                                                id="pvp"
                                                name="pvp"
                                                value="<?php echo $servicio->pvp ?>"
                                                >
                                        </div>

                                        <div class="col-sm-10 mt-2">
                                            <label for="comentario" class="col-form-label">Descripción y normativa legal.</label>
                                            <input
                                                placeholder="Describe los detalles del servicio."
                                                type="text"
                                                id="detalle"
                                                name="observacion"
                                                class="form-control"
                                                value="<?php $servicio->observacion ?>">
                                            </input>
                                        </div>

                                        <div class="mt-4" role="group">
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                        </div>
                                    </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
        <?php if (count($servicios) === 0 ) {?>
                <p>No hay servicios registrados registradas.</p>
            <?php }else{ ?>
            <div class="col-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Servicio</th>
                        <th scope="col">PVP</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Ingreso</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($servicios as $servicio){?>
                        <tr>
                            <td><?php echo "$".$servicio->nombre; ?></td>
                            <td><?php echo "$".$servicio->pvp; ?></td>
                            <td><?php echo "$".$servicio->costo; ?></td>
                            <td><?php echo "$".$servicio->pvp - $servicio->costo; ?></td>
                        </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
    </div>
</main>