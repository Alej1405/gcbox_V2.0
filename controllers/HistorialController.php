<?php 
namespace Controllers;

use Classes\Email;
use Model\Cargas;
use Model\Cliente;
use Model\Update;

class HistorialController{
    public static function index(){
        //verificar que la carga exista en la base de datos

        $tracking = $_GET['t'];
        if (!$tracking) header('Location: /404');

        $cargas = Cargas::where('tracking', $tracking);
        if (!$cargas || $tracking !== $cargas->tracking) header('location: /404');

        //consultar todo el update de la carga
        $historial = Update::belongsTo('id_carga', $cargas->id);

        echo json_encode(['historial' => $historial]);
    }

    public static function crear(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tracking = $_POST['tracking'];
            if (!$tracking) header('location: /404');

            $carga = Cargas::where('tracking', $tracking);
            if (!$carga) header('location: /404');

            if(!$carga){
                $respuesta = [
                    'tipo' => 'alert-danger',
                    'mensaje' => 'Inconsistencias al generar el embarque, pide ayuda.'
                ];
                echo json_encode($respuesta);
                return;
            }

            $update = new Update($_POST);
            $update->f_update = date('y-m-d');
            $update->id_usuario = $_SESSION['id'];
            $update->id_carga = $carga->id;
            $resultado = $update->crear();

            $respuesta = [
                'tipo' => 'alert-success',
                'id' => $resultado['id'],
                'mensaje' => 'Embarque generado'
            ];

            header("Content-Type: application/json");
            echo json_encode($respuesta);

            if ($resultado){

                $est = estados($update->estado);
                $novedaes = $est." ".$update->comentario;

                $cliente = Cliente::where('id', $carga->id_cliente);
                $noti = new Email($cliente->correo, $cliente->nombre, $novedaes);
                $noti->notificarUpdate();

                $cel = $cliente->celular;
                $cel = substr($cel, 1);
                $celular = '+593'.$cel;
                $actual = estados($update->estado);
                $detalle = $update->comentario;
                MensajeUpdate($actual, $detalle, $celular);
            }

        }
        //verificar que la carga exista en la base de da
    }
}