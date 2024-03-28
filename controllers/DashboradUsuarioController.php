<?php 

namespace Controllers;

use Classes\Email;
use Model\Cargas;
use Model\Cliente;
use Model\Consig;
use Model\Docs;
use Model\Embarques;
use Model\Servicios;
use Model\Update;
use MVC\Router;

class DashboradUsuarioController {
        public static function consultarEmbarques(Router $router){
        //proteger la pagina
            isAuth();
            //ver todas las cargas en proceso
            $cargas = Cargas::all();
    
            $alertas = [];
            $router->render('dashboard_usuario/embarques', [
                'titulo' => 'Procesos',
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

    // cargas registrar cargas habilitado en el cliente y en el admin
    public static function cargas(Router $router){
        //proteger la pagina
        isAuth();
        $alertas = [];
        $cargas = new Cargas;
        $clientes = Cliente::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cargas->sincronizar($_POST);
            $alertas = $cargas->validarCarga();
            if(empty($alertas)){
                //verificar que el cliente exista 
                $cliente = $cargas->id_cliente;
                $id_cliente = Cliente::where('id', $cliente);
                if(!$id_cliente){
                    Cargas::setAlerta('danger', 'Problemas con el cliente, por favor verifica');
                    $alertas= Cargas::getAlertas();
                }else{
                    //debuguear($cargas->id);
                    $cargas->f_registro = date('y-m-d');
                    $cargas->register_by = $_SESSION['id'];

                    //guardar registro
                    $resultado = $cargas->guardar();

                    //confirmar el registro
                    if($resultado){
                        $token = "Peso:". $cargas->peso." / Detalle: ".$cargas->detalle." / Tracking: ".$cargas->tracking;
                        $noti = new Email($id_cliente->correo, $id_cliente->nombre, $token);
                        $noti->registroCarga();
                        header('Location: /registro');
                    }
                }
            }
        }
        $alertas = Cargas::getAlertas();


        $router->render('dashboard_usuario/registro', [
            'titulo' => 'Procesos',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php',
            'alertas' => $alertas,
            'cargas' => $cargas,
            'clientes' => $clientes
        ]);
    }

    public static function cargasActualizar(Router $router){
        //proteger la pagina
        isAuth();
        $alertas = [];
        $cargas = Cargas::where('tracking', s($_GET['t']));
        $cliente_carga = Cliente::where('id', s($_GET['c']));
        $clientes = Cliente::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cargas->sincronizar($_POST);
            $alertas = $cargas->validarCarga();
            if(empty($alertas)){
                //verificar que el cliente exista 
                $cliente = $cargas->id_cliente;
                $id_cliente = Cliente::where('id', $cliente);
                if(!$id_cliente){
                    Cargas::setAlerta('danger', 'Problemas con el cliente, por favor verifica');
                    $alertas= Cargas::getAlertas();
                }else{


                    //guardar registro
                    $resultado = $cargas->guardar();

                    //Crear historial
                    $update = new Update();
                    $update -> estado = '18';
                    $update -> f_update = date('y-m-d');
                    $update -> comentario = 'Peso actualizado '.$cargas->peso;
                    $update -> id_usuario = $_SESSION['id'];
                    $update -> id_carga = $cargas->id;
                    $update-> guardar();

                    //confirmar el registro
                    if($resultado){
                        header('Location: /embarques');
                    }
                }
            }
        }
        $alertas = Cargas::getAlertas();


        $router->render('dashboard_usuario/registro-actualizar', [
            'titulo' => 'Procesos',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php',
            'alertas' => $alertas,
            'cargas' => $cargas,
            'clientes' => $clientes,
            'cliente_carga' => $cliente_carga
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
        $v ='';

        $consi = Consig::all();
        $cargas = Cargas::where('tracking', $tracking);
        $p = $cargas->peso;
        $cliente = Cliente::where('id', $cargas->id_cliente);
        $emb = Embarques::where('id_carga', $cargas->id);
        if($emb){
            $h = 'hidden';
        } else {
            $v = 'hidden';
        }

        

        $router->render('dashboard_usuario/carga', [
            'titulo' => 'Procesos',
            'titulo2' => 'Carga',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php',
            'alertas' => $alertas,
            'tracking' => $tracking,
            'cliente' => $cliente,
            'cargas' => $cargas,
            'emb' => $emb,
            'consi' => $consi,
            'h' => $h,
            'v' => $v,
            'p' => $p
        ]);
    }

    public static function crearEmbarque(Router $router){
        $cargas = new Cargas;
        //leer los campos desde la super global post
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tracking = s($_GET['t']);
            $carga = Cargas::where('tracking', $tracking);
            //debuguear($carga);
            if(!$carga){
                Cargas::setAlerta('danger', 'Problemas con el tracking, por favor verifica');
                $alertas= Cargas::getAlertas();
            }
            
            $embarque =  new Embarques($_POST);
            $alertas = $embarque->validarEmbarque();

            if (empty($alertas)){
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
                    
                    header("location: /embarques-carga?t=$carga->tracking");
                }
            }

        }
        $alertas = Cargas::getAlertas();


        $router->render('dashboard_usuario/embarque', [
            'titulo' => 'Procesos',
            'index' => 'noindex, nofollow',
            'description' => 'Escritorio de administracion de cuneta',
            'header' => 'system_header.php',
            'script' => 'system_scripts.php',
            'alertas' => $alertas,
            'cargas' => $cargas
        ]);

    }

    //documentos 
    public static function agregar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //validar la carga
            $tracking = s($_POST['tracking']) ?? null;
            if ($tracking === null){
                header('location: /salir');
            } 
            
            //validar la carga
            $carga = Cargas::where('tracking', $tracking);
            if(!$carga){
                header('location: /salir');
            }

            $documento =  new Docs($_POST);
            $alertas = $documento->validarDoc();
            $archivo = $_FILES['doc'];
            
            if(empty($alertas)){
                if (!$archivo['name']){
                    echo '<script language="javascript">alert("Verifica el documento que ingresaste");window.location.href="/embarques"</script>';
                }
                //crear carpeta de archivos
                $carpetaDocs = "../docs/";

                if(!is_dir($carpetaDocs)){
                    mkdir($carpetaDocs);
                }

                //generar nombre unico del archivo
                $name_doc = md5(uniqid(rand().true)).".pdf";

                //subir el archivo al servidor
                move_uploaded_file($archivo['tmp_name'], $carpetaDocs.$name_doc);

                //asignar datos a la tabla
                $documento->doc = $name_doc;
                $documento->f_registro = date('y-m-d');
                $documento->id_usuario = $_SESSION['id'];
                $documento->id_carga = $carga->id;
                $resultado = $documento->guardar();

                if($resultado){
                    header("Location: /embarques-carga?t={$tracking}");
                }

            }else{
                echo '<script language="javascript">alert("Informacion mal ingresada")</script>';
                header("Location: /embarque");
            }



        }

    }

}