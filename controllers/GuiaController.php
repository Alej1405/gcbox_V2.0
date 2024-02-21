<?php 

namespace Controllers;

use Classes\Email;
use Model\Cargas;
use Model\Cliente;
use Model\Guia;
use Model\Update;

class GuiaController {
    public static function index(){
        //recibir el parametro general de consultas y validar que exista, caso contrario enviar 404
        $tracking = $_GET['t'];
        If (!$tracking) header('Location: /404');

        $carga = Cargas::where('tracking', $tracking); 
        if (!$carga || $tracking !== $carga->tracking) header('Location: /404');
        
        //consultar las guias agregadas
        $guias = Guia::belongsTo('id_carga', $carga->id);

        //mostrar las tareas en json
        echo json_encode(['guias' => $guias]);
    }
    
    public static function crear(){
        //leer los campos desde la super global post
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Headers: content-type");
            header("Access-Control-Allow-Methods: OPTIONS,GET,PUT,POST,DELETE");

            //comprobar la tracking o token de la carga.
            $tracking = $_POST['tracking'];
            $carga = Cargas::where('tracking', $tracking);
            echo json_encode($carga);
            exit;

            if (!$carga->tracking === $tracking){
                $respuesta = [
                    'tipo' => 'alert-danger',
                    'mensaje' => 'Inconsistencias al agregar la guia, pide ayuda.'
                ];
                echo json_encode($respuesta);
                return;
            }

            //agregamos la guia
            $guia = new Guia($_POST);
            $guia->f_registro =  date('y-m-d');
            $guia->id_carga = $carga->id;
            $guia->id_usuario = $_SESSION['id'];
            $resultado = $guia->guardar();

            if ($resultado){
                $cliente = Cliente::where('id', $carga->id_cliente);
                $noti = new Email($cliente->correo, $cliente->nombre, 'Guia agregada.');
                $noti->confirmarGuia();            
            }

            //guardando el update
            $update = new Update();
            $update->estado = '2';
            $update->f_update =  date('y-m-d') ;
            $update->comentario = 'Guia agregada, ';
            $update->id_usuario = $_SESSION['id'];
            $update->id_carga = $carga->id;
            $update->crear();

            $respuesta = [
                'tipo' => 'alert-success',
                'id' => $resultado['id'],
                'mensaje' => 'Guia agregada correctamente'
            ];
            echo json_encode($respuesta);

        }

    }
    public static function actualizar(){
        //leer los campos desde la super global post
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

    }
    public static function elimar(){
        //leer los campos desde la super global post
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

    }
}