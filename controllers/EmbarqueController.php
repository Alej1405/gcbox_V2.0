<?php 

namespace Controllers;

use Classes\Email;
use Model\Cargas;
use Model\Cliente;
use Model\Embarques;
use Model\Update;
use MVC\Router;

class EmbarqueController {

    public static function index(){
        //consultar que la carga exista
        $tracking = $_GET['t'];
        if(!$tracking) header('location: /404');

        //consultar los datos de la carga
        $carga = Cargas::where('tracking', $tracking);
        if(!$carga) header('location: /404');

        //crear la respuesta en json
        $embarque = Embarques::belongsTo('id_carga', $carga->id);
        echo json_encode(['embarque', $embarque]);


    }

    

    public static function actualizar(){
        //leer los campos desde la super global post
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

    }

    public static function eliminar(){
        //leer los campos desde la super global post
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

    }
}