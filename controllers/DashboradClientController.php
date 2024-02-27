<?php 
namespace Controllers;

use Model\Cargas;
use Model\Cliente;
use MVC\Router;

class DashboradClientController{
    public static function dashboardCliente(Router $router){
        //proteger la pagina
        isAuth();
        //proteger las cargas que pertecen al cliente
        $id = $_SESSION['id'];
        $cargas = Cargas::belongsTo('id_cliente', $id);


        $alertas = [];
        $router->render('dashboard_cliente/dashboard', [
            'titulo' => 'Dashboard',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php',
            'alertas' => $alertas,
            'cargas' => $cargas
        ]);
    }
    // cargas
    public static function cargas(Router $router){
        //proteger la pagina
        isAuth();
        $alertas = [];
        //guardar los registros.
        $cargas = new Cargas;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cargas->sincronizar($_POST);
            $cargas->id_cliente = $_SESSION['id'];
            $alertas = $cargas->validarCarga();
            if(empty($alertas)){
                $track = Cargas::where('tracking', $cargas->tracking);
                if($track){
                    Cargas::setAlerta('danger', 'El tracking ya existe o lo estas duplicando');
                    $alertas= Cargas::getAlertas();
                }else{
                    $cargas->tracking = trim($_POST['tracking']);
                    
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


        $router->render('dashboard_cliente/registro', [
            'titulo' => 'Compras',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php',
            'alertas' => $alertas
        ]);
    }

    public static function perfil(Router $router){
        $alertas = [];
        $id = $_SESSION['id'];
        $cliente = Cliente::where('id', $id);

        $router->render('dashboard_cliente/perfil', [
            'titulo' => 'Perfil',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php',
            'alertas' => $alertas,
            'cliente' => $cliente
        ]);
    }

    public static function faq(Router $router){


        $router->render('dashboard_cliente/faq', [
            'titulo' => 'F.A.Q',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php'
        ]);
    }
}