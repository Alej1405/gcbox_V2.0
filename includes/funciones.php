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

function Mensaje ($celular){
        // pruba de envio de mensajes con la api de whatsapp
        $token = 'EAAU0bSvMRVwBO8bR0UlnlRiylK63yu6fhpxifbGcHlPIox4hxZA8vWnzeGPG4xoBjDY5EbdZCtJ9tyyGEsR9yK0Up7HoUfhADKdJmEACoNP5ui4A4SXAolXdqvTgZCfHUA4ZCra11nUdK18Gidpi1gHezdACi7pwdDizaTIs7tC45vBf6KeBbGw9PLJ07eaTYTlPyoggjb7QbNaz';
        //NUESTRO TELEFONO
        $telefono = $celular;
        //URL A DONDE SE MANDARA EL MENSAJE
        $url = 'https://graph.facebook.com/v18.0/275237909000743/messages';

        //CONFIGURACION DEL MENSAJE
        $mensaje = ''
        . '{'
            . '"messaging_product": "whatsapp", '
            . '"to": "'.$telefono.'", '
            . '"type": "template", '
            . '"template": '
            . '{'
            . '     "name": "registro",'
            . '     "language":{ "code": "es_MX" } '
            . '} '
            . '}';
        //DECLARAMOS LAS CABECERAS
        $header = array("Authorization: Bearer " . $token, "Content-Type: application/json",);
        //INICIAMOS EL CURL
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //OBTENEMOS LA RESPUESTA DEL ENVIO DE INFORMACION
        $response = json_decode(curl_exec($curl), true);
        //IMPRIMIMOS LA RESPUESTA 
        print_r($response);
        //OBTENEMOS EL CODIGO DE LA RESPUESTA
        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        //CERRAMOS EL CURL
        curl_close($curl);

        debuguear($response);
    //fin del codigo de prueba
}

function MensajeEmbarque ($celular, $tracking){
        // pruba de envio de mensajes con la api de whatsapp
        $token = 'EAAU0bSvMRVwBO8bR0UlnlRiylK63yu6fhpxifbGcHlPIox4hxZA8vWnzeGPG4xoBjDY5EbdZCtJ9tyyGEsR9yK0Up7HoUfhADKdJmEACoNP5ui4A4SXAolXdqvTgZCfHUA4ZCra11nUdK18Gidpi1gHezdACi7pwdDizaTIs7tC45vBf6KeBbGw9PLJ07eaTYTlPyoggjb7QbNaz';
        //NUESTRO TELEFONO
        $telefono = $celular;
        //URL A DONDE SE MANDARA EL MENSAJE
        $url = 'https://graph.facebook.com/v18.0/275237909000743/messages';

        //CONFIGURACION DEL MENSAJE
        $mensaje = ''
        . '{'
            . '"messaging_product": "whatsapp", '
            . '"to": "'.$telefono.'", '
            . '"type": "template", '
            . '"template": '
            . '{'
                . '"name": "embarque",'
                . ' "language":{ "code": "es_MX" }, '
                . '"components": ['
                    .'{'
                        . '"type": "body",'
                        . '"parameters": ['
                            .'{'
                                .'"type": "text",'
                                .'"text": "'.$tracking.'"'
                            .'}'
                        .']'
                    .'}'
                .']'
            . '} '
        . '}';
            // debuguear($mensaje);
        //DECLARAMOS LAS CABECERAS
        $header = array("Authorization: Bearer " . $token, "Content-Type: application/json",);
        //INICIAMOS EL CURL
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //OBTENEMOS LA RESPUESTA DEL ENVIO DE INFORMACION
        $response = json_decode(curl_exec($curl), true);
        //IMPRIMIMOS LA RESPUESTA 
        print_r($response);
        //OBTENEMOS EL CODIGO DE LA RESPUESTA
        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        //CERRAMOS EL CURL
        curl_close($curl);

        debuguear($response);
    //fin del codigo de prueba
}
