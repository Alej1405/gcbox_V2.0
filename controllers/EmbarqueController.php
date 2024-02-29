<?php 

namespace Controllers;

use Classes\Email;
use Model\Cargas;
use Model\Cliente;
use Model\Embarques;
use Model\Update;

class embarqueController {

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

    public static function crear(){
        //leer los campos desde la super global post
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tracking = $_POST['tracking'];
            $carga = Cargas::where('tracking', $tracking);
            if(!$carga){
                header('location: /dashboard-u');
            }

            $embarque =  new Embarques($_POST);

            //generando el embarque
            $embarque->url = md5(uniqid());
            $embarque->f_embarque = date('y-m-d');
            $embarque->id_cliente = $carga->id_cliente;
            $embarque->id_carga = $carga->id;
            $embarque->id_usuario = $_SESSION['id'];
            $resultado = $embarque->guardar();

            //guardando el update
            $update = new Update();
            $update->estado = '1';
            $update->f_update =  date('y-m-d') ;
            $update->comentario = 'Embarque solicitado, se espera confirmacion';
            $update->id_usuario = $_SESSION['id'];
            $update->id_carga = $carga->id;
            $update->guardar();

            if ($resultado){
                $cliente = Cliente::where('id', $carga->id_cliente);
                $noti = new Email($cliente->correo, $cliente->nombre, 'Embarque Solicitado');
                $noti->confirmarEmbarque();
                
                header('location: /embarques');
            }

        }

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