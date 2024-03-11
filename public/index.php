<?php 

require_once __DIR__ . '/../includes/app.php';


use Controllers\DashboradClientController;
use Controllers\DashboradUsuarioController;
use Controllers\embarqueController;
use Controllers\GuiaController;
use Controllers\HistorialController;
use Controllers\LoginController;
use Controllers\PageController;
use MVC\Router;

$router = new Router();

// paginas del sitio web navegancion
    //pagina de inicio o index 
    $router->get('/', [PageController::class, 'index']);
    $router->post('/', [PageController::class, 'index']);
    $router->get('/blog', [PageController::class, 'blog']);
    $router->get('/blog/compras/tiendas', [PageController::class, 'tiendas']);
    $router->get('/blog/compras/materia-prima', [PageController::class, 'materia']);
    $router->get('/blog/compras/emprendimiento', [PageController::class, 'emprendimiento']);
    $router->get('/blog/compras/compras-especificas', [PageController::class, 'especifico']);
    $router->get('/servicios/bodega-internacional', [PageController::class, 'bodega']);
    $router->get('/servicios/encomiendas', [PageController::class, 'encomiendas']);
    $router->get('/politicas-del-servicio-y-privacidad', [PageController::class, 'politicas']);
    $router->get('/sitemap', [PageController::class, 'sitemap']);
//fin de la navegacion de las paginas.
//inicio de backent
    //login y manejo de cuentas
    $router->get('/crear-cuenta', [LoginController::class, 'crearCliente']);
    $router->post('/crear-cuenta', [LoginController::class, 'crearCliente']);
    $router->get('/usuarios', [LoginController::class, 'crearUsuario']);
    $router->post('/usuarios', [LoginController::class, 'crearUsuario']);
    
    //recuperar pasword
    $router->get('/recuperar', [LoginController::class, 'recuperar']);
    $router->post('/recuperar', [LoginController::class, 'recuperar']);

    //restablecer
    $router->get('/restablecer', [LoginController::class, 'restablecer']);
    $router->post('/restablecer', [LoginController::class, 'restablecer']);
    
    //confirmacion de cuenta
    $router->get('/cuenta-creada', [LoginController::class, 'mensaje']);
    $router->get('/confirmar', [LoginController::class, 'confirmar']);
    
    //iniciar sesion
    $router->get('/login', [LoginController::class, 'loginCliente']);
    $router->post('/login', [LoginController::class, 'logincliente']);
    $router->get('/login-usuario', [LoginController::class, 'loginUsuario']);
    $router->post('/login-usuario', [LoginController::class, 'loginUsuario']);

    //generales del sistema
    $router->get('/salir', [LoginController::class, 'logout']);

//navegacion del dashborad del cliente
    //ingreso al dashboard
    $router->get('/dashboard', [DashboradClientController::class, 'dashboardCliente']);

    //registrar compras
    $router->get('/registrar-compra', [DashboradClientController::class, 'cargas']);
    $router->post('/registrar-compra', [DashboradClientController::class, 'cargas']);

    //navegacion de perfil
    $router->get('/dashboard-perfil', [DashboradClientController::class, 'perfil']);
    $router->get('/dashboard-perfil', [DashboradClientController::class, 'perfil']);

    //navegacion preguntas frecuentes
    $router->get('/dashboard-faq', [DashboradClientController::class, 'faq']);

    //navegacion contactos
    $router->get('/registrar-compra', [DashboradClientController::class, 'cargas']);

//navegacion usuarios adinistrador del sistema y personal de apoyo
    //ingreso dashboard usuario
    $router->get('/dashboard-u', [DashboradUsuarioController::class, 'dashboardUsuario']);

    //navegacion Usuarios
    $router->get('/registro', [DashboradUsuarioController::class, 'cargas']);
    $router->post('/registro', [DashboradUsuarioController::class, 'cargas']);
    $router->get('/registro-actualizar', [DashboradUsuarioController::class, 'cargasActualizar']);
    $router->post('/registro-actualizar', [DashboradUsuarioController::class, 'cargasActualizar']);
    
    //navegacion Consignatarios
    $router->get('/consignatarios', [DashboradUsuarioController::class, 'consignatarios']);
    $router->post('/consignatarios', [DashboradUsuarioController::class, 'consignatarios']);
    
    //navegacion Consignatarios
    $router->get('/servicios', [DashboradUsuarioController::class, 'servicios']);
    $router->post('/servicios', [DashboradUsuarioController::class, 'servicios']);
    
    //navegacion por cada carga
    $router->get('/embarques-carga', [DashboradUsuarioController::class, 'carga']);
    $router->post('/embarques-carga', [DashboradUsuarioController::class, 'carga']);

    //consultar los embarques
    $router->get('/embarques', [DashboradUsuarioController::class, 'consultarEmbarques']);
    $router->get('/crear/embarque', [DashboradUsuarioController::class, 'crearEmbarque']);
    $router->post('/crear/embarque', [DashboradUsuarioController::class, 'crearEmbarque']);

    //enlaces de documentos 
    $router->post('/cargas-doc', [DashboradUsuarioController::class, 'agregar']);

    //API para los embarques
    $router->get('/api/embarque', [EmbarqueController::class, 'index']);
    $router->post('/api/embarque/actualizar', [EmbarqueController::class, 'actualizar']);
    $router->post('/api/embarque/eliminar', [EmbarqueController::class, 'eliminar']);
    
    //API para las guias
    $router->get('/api/guia', [GuiaController::class, 'index']);
    $router->post('/api/guia', [GuiaController::class, 'crear']);
    $router->post('/api/guia/actualizar', [GuiaController::class, 'actualizar']);
    $router->post('/api/guia/eliminar', [GuiaController::class, 'eliminar']);

    //API para el historial
    $router->get('/api/historial', [HistorialController::class, 'index']);
    $router->post('/api/historial', [HistorialController::class, 'crear']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();