<?php
    foreach($alertas as $key => $alerta):
        foreach($alerta as $mensaje):
?>
    <div class="alert alert-<?php echo $key ?> show" role="alert">
        <span class="alert-text"><?php echo $mensaje ?></span>
    </div>
<?php
        endforeach;
    endforeach;
?>