<?php 

namespace Controllers;

use Classes\Email;
use Model\Cliente;
use Model\Usuario;
use MVC\Router;

class LoginController {

    public static function loginCliente(Router $router){

        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cliente =  new Cliente($_POST);
            $alertas = $cliente->validarLogin();

            if(empty($alertas)){
                $cliente = Cliente::where('correo', $cliente->correo);
                //debuguear($cliente->confirmado);
                if(!$cliente || !$cliente->confirmado){
                    Cliente::setAlerta('danger', 'El usuario no existe o la cuenta no esta verificada.');
                }else{
                    if (password_verify($_POST['pasword'], $cliente->pasword)){
                        //notificar el inicio de sesion al cliente;
                        //session_start();
                        $_SESSION['id'] = $cliente->id;
                        $_SESSION['nombre'] = $cliente->nombre;
                        $_SESSION['apellido'] = $cliente->apellido;
                        $_SESSION['cedula'] = $cliente->cedula;
                        $_SESSION['direccion'] = $cliente->direccion;
                        $_SESSION['provincia'] = $cliente->provincia;
                        $_SESSION['ciudad'] = $cliente->ciudad;
                        $_SESSION['cecular'] = $cliente->celular;
                        $_SESSION['correo'] = $cliente->correo;
                        $_SESSION['login'] = true;
                        $email = new Email($_SESSION['correo'], $_SESSION['nombre'], '');
                        $email -> notifyS();

                        header('Location: /dashboard');

                    }else{
                        Cliente::setAlerta('danger', 'El password es incorrecto');
                    }
                }
            }

        }

        $alertas = Cliente::getAlertas();


        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesion',
            'index' => 'noindex, nofollow',
            'description' => 'Creacion de Cuentas para clientes, inicia en el emocionante mundo de la importacion',
            'header' => 'header_log.php',
            'script' => 'script_sys.php',
            'alertas' => $alertas
        ]);
    }

    public static function logout(Router $router){
        $router->render('auth/logout');
    }

    public static function crearCliente(Router $router){
        //variables del siste
        $alertas = [];
        //instanciando la clase de cliente
        $cliente = new Cliente;

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            //debuguear($_POST);
            //sincronizar los valores 
            $cliente->sincronizar($_POST);
            //validar el formulario
            $alertas = $cliente->validarCliente();
            if(empty($alertas)){
                //verfificar si el cliente existe
                $clienteExiste = Cliente::where('correo', $cliente->correo);
                    if ($clienteExiste){
                        Cliente::setAlerta('danger', 'El correo ya se encuentra registrado');
                        $alertas = Cliente::getAlertas();
                    }else{
                        //guardar el cliente
                        $cliente->hashPassword();
                        
                        //eliminar el pasword2
                        unset($cliente->pasword2);
                        
                        //generar token
                        $cliente->crearToken();
                        
                        //guardar el cliente
                        $resultado = $cliente->crear();
                        
                        //enviar correo
                            $email = new Email($cliente->correo, $cliente->nombre, $cliente->token);
                            $email->confirmarCuenta();
                        if($resultado){
                            header('location: /cuenta-creada');
                        }
                    }

            }
        }

        //crear un cliente
        $router->render('auth/crearCliente', [
            'titulo' => 'Crear cuenta',
            'index' => 'noindex, nofollow',
            'description' => 'Creacion de Cuentas para clientes, inicia en el emocionante mundo de la importacion',
            'alertas' => $alertas,
            'header' => 'header_sys.php',
            'script' => 'script_sys.php',
            //varialbes y procesos
            'cliente' => $cliente

        ]);
    }

    public static function crearUsuario(Router $router){

    }

    public static function recuperar(Router $router){
        $alertas =[];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cliente = new Cliente($_POST);
            $alertas = $cliente->validarEmail();

            if(empty($alertas)){
                //buscar el usuario
                $cliente = Cliente::where('correo', $cliente->correo);
                if($cliente && $cliente->confirmado){
                    //generar un nuevo token 
                    $cliente->crearToken();
                    $cliente->confirmado = 0;
                    unset($cliente->password2);
                    
                    //actualizar el usuario
                    $cliente->actualizar();

                    //enviar el usuario
                    $email = new Email( $cliente->correo, $cliente->nombre, $cliente->token);

                    //imprimir la alerta
                    Cliente::setAlerta('success', 'Hemos enviado las instrucciones a tu email.');
                    $email->enviarInstrucciones();

                }else{
                    Cliente::setAlerta('danger', 'El usuario no existe o no esta confirmado.');
                    
                }
                $alertas = Cliente::getAlertas();
            }
        }
        $router->render('auth/recuperar', [
            'titulo' => 'Validar cuenta',
            'index' => 'noindex, nofollow',
            'description' => 'Creacion de Cuentas para clientes, inicia en el emocionante mundo de la importacion',
            'alertas' => $alertas,
            'header' => 'header_log.php',
            'script' => 'script_sys.php'
        ]);

    }

    public static function restablecer(Router $router){

        $alertas = [];
        $token = s($_GET['token']);
        $mostrar = true;

        if(!$token) header('location: /');

        //identificar el usuario
        $cliente =Cliente::where('token', $token);

        if(empty($cliente)){
            Cliente::setAlerta('warning', 'Token no encontrado');
            $mostrar = false;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            //agregar el nuevo pasword
            $cliente->sincronizar($_POST);

            //validar el pasword
            $alertas = $cliente->validarPassword();


            if(empty($alertas)){
                //hashear el nuevo password
                $cliente->hashPassword();
                unset($cliente->pasword2);

                //eliminar el token 
                $cliente->token = '';
                //eliminar el token 
                $cliente->confirmado = 1;

                //guardar el usuario
                $resultado = $cliente->actualizar();

                //redireccionar
                if($resultado){
                    header('Location: /');
                }
            }

        }

        $alertas = Cliente::getAlertas();

        $router->render('auth/restablecer', [
            'titulo' => 'Cambiar Password',
            'index' => 'noindex, nofollow',
            'description' => 'Creacion de Cuentas para clientes, inicia en el emocionante mundo de la importacion',
            'alertas' => $alertas,
            'header' => 'header_log.php',
            'script' => 'script_sys.php',
            'mostrar' => $mostrar
        ]);
    }

    public static function mensaje(Router $router){
        $router->render('auth/mensaje', [
            'titulo' => 'Validar cuenta',
            'index' => 'noindex, nofollow',
            'description' => 'Creacion de Cuentas para clientes, inicia en el emocionante mundo de la importacion',
            'header' => 'header_sys.php',
            'script' => 'script_sys.php'
        ]);

    }

    public static function confirmar(Router $router){

        $tok = s($_GET['token']);

        if(!$tok) header('location: /');

        //encontrar el cliente
        $cliente = Cliente::where('token', $tok);
        if(empty($cliente)){
            //no se encontro la cuenta
            Cliente::setAlerta('danger', 'Token no valido, cuenta no verificada');
        }else{
            //confirmar la cuenta
            $cliente->confirmado = 1;
            $cliente->token = '';
            $cliente->guardar();
            Cliente::setAlerta('success', 'Cuenta verificada, tu regstro a finalizado');
            $direccion = new Email($cliente->correo, $cliente->nombre, 'Casilla activada con exito');
            $direccion->activCasilla();

        }

        $alertas = Cliente::getAlertas();

        $router->render('auth/confirmar', [
            'titulo' => 'Validar cuenta',
            'index' => 'noindex, nofollow',
            'description' => 'Creacion de Cuentas para clientes, inicia en el emocionante mundo de la importacion',
            'alertas' => $alertas,
            'header' => 'header_sys.php',
            'script' => 'script_sys.php',
            //varialbes y procesos
            'cliente' => $cliente
        ]);
    }

    // ============== CONTROL DE AUTH DE USUARIO ================//

    public static function crearUsuasio(Router $router){
        //variables del siste
        $alertas = [];
        //instanciando la clase de cliente
        $cliente = new Cliente;

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            //debuguear($_POST);
            //sincronizar los valores 
            $cliente->sincronizar($_POST);
            //validar el formulario
            $alertas = $cliente->validarCliente();
            if(empty($alertas)){
                //verfificar si el cliente existe
                $clienteExiste = Cliente::where('correo', $cliente->correo);
                    if ($clienteExiste){
                        Cliente::setAlerta('danger', 'El correo ya se encuentra registrado');
                        $alertas = Cliente::getAlertas();
                    }else{
                        //guardar el cliente
                        $cliente->hashPassword();
                        
                        //eliminar el pasword2
                        unset($cliente->pasword2);
                        
                        //generar token
                        $cliente->crearToken();
                        
                        //guardar el cliente
                        $resultado = $cliente->crear();
                        
                        //enviar correo
                            $email = new Email($cliente->correo, $cliente->nombre, $cliente->token);
                            $email->confirmarCuenta();
                        if($resultado){
                            header('location: /cuenta-creada');
                        }
                    }

            }
        }
    }

    //INICIAR SESION DESDE EL LADO DEL USUARIO 
    public static function loginUsuario(Router $router){
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario =  new Usuario($_POST);
            $alertas = $usuario->validarLoginUsuario();

            if(empty($alertas)){
                $usuario = Usuario::where('correo', $usuario->correo);
                //debuguear($usuario->confirmado);
                if(!$usuario || !$usuario->confirmado){
                    Usuario::setAlerta('danger', 'El usuario no existe o la cuenta no esta verificada.');
                }else{
                    if (password_verify($_POST['pasword'], $usuario->pasword)){
                        //notificar el inicio de sesion al usuario;
                        //session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['apellido'] = $usuario->apellido;
                        $_SESSION['cedula'] = $usuario->cedula;
                        $_SESSION['direccion'] = $usuario->direccion;
                        $_SESSION['provincia'] = $usuario->provincia;
                        $_SESSION['ciudad'] = $usuario->ciudad;
                        $_SESSION['cecular'] = $usuario->celular;
                        $_SESSION['correo'] = $usuario->correo;
                        $_SESSION['login'] = true;
                        $email = new Email($_SESSION['correo'], $_SESSION['nombre'], '');
                        $email -> notifyS();

                        header('Location: /dashboard-u');

                    }else{
                        Usuario::setAlerta('danger', 'El password es incorrecto');
                    }
                }
            }

        }

        $alertas = Usuario::getAlertas();


        $router->render('auth/loginUsuario', [
            'titulo' => 'Iniciar Sesion',
            'index' => 'noindex, nofollow',
            'description' => 'Creacion de Cuentas para clientes, inicia en el emocionante mundo de la importacion',
            'header' => 'header_log.php',
            'script' => 'script_sys.php',
            'alertas' => $alertas
        ]);
    }
}