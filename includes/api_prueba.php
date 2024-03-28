<?php
//TOKEN QUE NOS DA FACEBOOK
$token = 'EAAU0bSvMRVwBO8bR0UlnlRiylK63yu6fhpxifbGcHlPIox4hxZA8vWnzeGPG4xoBjDY5EbdZCtJ9tyyGEsR9yK0Up7HoUfhADKdJmEACoNP5ui4A4SXAolXdqvTgZCfHUA4ZCra11nUdK18Gidpi1gHezdACi7pwdDizaTIs7tC45vBf6KeBbGw9PLJ07eaTYTlPyoggjb7QbNaz';
//NUESTRO TELEFONO
$telefono = '+593963539438';
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
        . '     "name": "prueba enviando desde el sistema",'
        . '     "language":{ "code": "en_US" } '
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
?>