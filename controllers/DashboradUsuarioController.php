<?php 

namespace Controllers;

use Model\Cargas;
use Model\Cliente;
use Model\Consig;
use Model\Embarques;
use Model\Servicios;
use MVC\Router;

class DashboradUsuarioController {
        public static function consultarEmbarques(Router $router){
            //proteger la pagina
            isAuth();
            
            //ver todas las cargas en proceso
            $cargas = Cargas::all();
    
            $alertas = [];
            $router->render('dashboard_usuario/embarques', [
                'titulo' => 'Embarques',
                'index' => 'noindex, nofollow',
                'description' => 'Escritorio de administracion de cuneta',
                'header' => 'system_header.php',
                'script' => 'system_scripts.php',
                'alertas' => $alertas,
                'cargas' => $cargas
            ]);
        }

        public static function dashboardUsuario(Router $router){
            //proteger la pagina
            isAuth();
            
            //ver todas las cargas en proceso
            $cargas = Cargas::all();
    
            $alertas = [];
            $router->render('dashboard_usuario/dashboard', [
                'titulo' => 'Dashboard',
                'index' => 'noindex, nofollow',
                'description' => 'Escritorio de administracion de cuneta',
                'header' => 'system_header.php',
                'script' => 'system_scripts.php',
                'alertas' => $alertas,
                'cargas' => $cargas
            ]);
        }

        // cargas registrar cargas solamente desde el lado del cliente
    public static function cargas(Router $router){
        //proteger la pagina
        isAuth();

        $alertas = [];
        //guardar los registros.
        $cargas = new Cargas();
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cargas->sincronizar($_POST);
            $alertas = $cargas->validarCarga();
            if(empty($alertas)){
                debuguear($cargas->tracking);
                $track = Cargas::where('tracking', $cargas->tracking);
                debuguear($track);
                if($track){
                    Cargas::setAlerta('danger', 'El tracking ya existe o lo estas duplicando');
                    $alertas= Cargas::getAlertas();
                }else{
                    $cargas->id_cliente = $_SESSION['id'];
                    $cargas->f_registro = date('y-m-d');
                    $cargas->register_by = $_SESSION['id'];

                    //debuguear($cargas);

                    //guardar registro
                    $resultado = $cargas->guardar();

                    //confirmar el registro
                    if($resultado){
                        header('Location: /dashboard');
                    }
                }
            }
        }
        $alertas = Cargas::getAlertas();


        $router->render('dashboard_usuario/registro', [
            'titulo' => 'Compras',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php',
            'alertas' => $alertas
        ]);
    }

    public static function consignatarios(Router $router){
        isAuth();
        $consignatarios = Consig::all();
        $consignatario = new Consig;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $consignatario->sincronizar($_POST);
            $alertas = $consignatario->validar();
            if(empty($alertas)){
                $consignatario->id_usuario = $_SESSION['id'];
                $consignatario->f_registro = date('y-m-d');

                //guardar el registro
                $resultado = $consignatario->guardar();
                if($resultado){
                    header('Location: /consignatarios');
                }
            }
        }
        $alertas = Consig::getAlertas();


        $router->render('dashboard_usuario/consignatario', [
            'titulo' => 'Consignatarios',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php',
            'alertas' => $alertas,
            'consignatario' => $consignatario,
            'consignatarios' => $consignatarios
        ]);
    }

    public static function servicios(Router $router){
        isAuth();
        //consultar todos los servicios
        $servicios = Servicios::all();

        //crear uno nuevo
        $servicio = new Servicios;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $servicio->sincronizar($_POST);
            $alertas = $servicio-> validar();
            if(empty($alertas)){

                //agregando la fecha y el usuario id
                $servicio->fecha = date('y-m-d');
                $servicio->id_usuario = $_SESSION['id'];

                $resultado = $servicio->guardar();
                if($resultado){
                    header('Location: /servicios');
                }
            }
        }
        $alertas = Consig::getAlertas();


        $router->render('dashboard_usuario/servicios', [
            'titulo' => 'Servicios',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php',
            'alertas' => $alertas,
            'servicios' => $servicios,
            'servicio' => $servicio
        ]);
    }

    //vista de general de la carga
    public static function carga(Router $router){
        isAuth();

        $tracking = s($_GET['t']); 
        $alertas =[];
        $h = '';

        $cargas = Cargas::where('tracking', $tracking);
        $cliente = Cliente::where('id', $cargas->id_cliente);
        $emb = Embarques::where('id_carga', $cargas->id);
        if($emb){
            $h = 'hidden';
        }

        $router->render('dashboard_usuario/carga', [
            'titulo' => 'Embarques',
            'titulo2' => 'Carga',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php',
            'alertas' => $alertas,
            'tracking' => $tracking,
            'cliente' => $cliente,
            'cargas' => $cargas,
            'h' => $h
        ]);
    }

}