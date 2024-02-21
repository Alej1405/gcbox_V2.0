<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function esUltimo(string $actual, string $proximo): bool {

    if($actual !== $proximo) {
        return true;
    }
    return false;
}

// Función que revisa que el usuario este autenticado
function isAuth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

function isAdmin() : void {
    if(!isset($_SESSION['admin'])) {
        header('Location: /');
    }
}

function rol($rol){
$rol = $_SESSION['rol'];
        switch($rol){
            case 1:
                $rol = "Adinistrador";
                break;
            case 2:
                $rol = "Usuario";
                break;
            case 0:
                $rol = "Cliente";
                break;
        }
        return $rol;
    }

function estados($estado){
    switch ($estado){
        case 1:
            $estado = "Embarcado";
            break;
        case 2:
            $estado = "Guia Generada";
            break;
        case 3:
            $estado = "Embarque Confirmado";
            break;
        case 4:
            $estado = "Carga en Transito";
            break;
        case 5:
            $estado = "Arribo UIO";
            break;
        case 6:
            $estado = "Inicio Aduana";
            break;
        case 7:
            $estado = "En espera de canal de aforo";
            break;
        case 8:
            $estado = "Aforo asignado";
            break;
        case 9:
            $estado = "Salida autorizada";
            break;
        case 10:
            $estado = "Enviado a provincia";
            break;
        case 11:
            $estado = "Despacho programado";
            break;
        case 12:
            $estado = "En transito";
            break;
        case 13:
            $estado = "En hold";
            break;
        case 14:
            $estado = "Entregado";
            break;
        case 15:
            $estado = "Embarque sin autorizacion";
            break;
        case 16:
            $estado = "Embarque con retraso en aduana";
            break;
        case 17:
            $estado = "Retraso";
            break;
    }
return($estado);
}
