<?php
//desarrollo
// $db = new mysqli('localhost', 'root', '', 'mashacor_grupo_revilla');

//produccion
$db = new mysqli('localhost', 'mashacor_root', 'pablo_1405', 'mashacor_grupo_revilla');

if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
