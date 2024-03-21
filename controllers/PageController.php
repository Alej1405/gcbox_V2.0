<?php 

namespace Controllers;

use Classes\Email;
use Model\Pages;
use MVC\Router;

class PageController {
    public static function index(Router $router){
        //variables de informacion
        $telefono = '0999978264';
        $direccion = 'Av. General Rumiñahui e Isla Floreana';
        $correo = 'pablo@globalcargoecuador.com';
        $face = "https://www.facebook.com/profile.php?id=100064165084718&mibextid=LQQJ4d";
        $insta = "https://www.instagram.com/gcbox_593?igsh=NzQ5NGQwc2E4eG4z&utm_source=qr";
        $thre = "https://threads.net/@gcbox_593";
        $whats = "https://wa.me/message/IAVMS2G5JDZFC1";
        //definir los mensajes
        $alertas = [];
        //links generales
        $registrarC = '/crear-cuenta';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $pages = new Pages($_POST);
            $alertas = $pages->validarEmail();

            if (empty($alertas)){
                //Enviar el Email
                $email = new Email($pages->email, $pages->name, $pages->message);
                $email->enviarConfirmacion();
            }
        }
        
        $router->render('pages/index', [
            'titulo' => 'Courier Ecuador',
            'index' => 'index, follow',
            'description' => 'Optimiza tus compras en internet con Gcbox, tu aliado en Courier en Ecuador. Simplificamos el proceso, desde la compra hasta la entrega, asegurando un servicio rápido, seguro y confiable. Descubre una nueva forma de comprar globalmente con Gcbox y disfruta de la comodidad del Courier en Ecuador.',
            //variables del sistema
            'alertas' => $alertas,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
            'face' => $face,
            'insta' => $insta,
            'thre' => $thre,
            'whats' => $whats,
            //links generales
            'registrarC' => $registrarC,
            'header' => 'header_page.php',
            'script' => 'script_page.php'
        ]);
    }

    public static function blog(Router $router){
        //variables de informacion
        $telefono = '0999978264';
        $direccion = 'Av. General Rumiñahui e Isla Floreana';
        $correo = 'pablo@globalcargoecuador.com';
        $face = "https://www.facebook.com/profile.php?id=100064165084718&mibextid=LQQJ4d";
        $insta = "https://www.instagram.com/gcbox_593?igsh=NzQ5NGQwc2E4eG4z&utm_source=qr";
        $thre = "https://threads.net/@gcbox_593";
        $whats = "https://wa.me/message/IAVMS2G5JDZFC1";
        //mensajes de alerta
        $alertas = [];
        //links generales
        $registrarC = '/crear-cuenta';
        
        
        $router->render('pages/blog', [
            'titulo' => 'Blog Revista Import',
            'index' => 'index, follow',
            'description' => 'Explora las últimas noticias de importación en el blog de Gc-box, tu fuente confiable para información sobre compras en línea, descuentos en tiendas internacionales, normativa aduanera, y consejos de importación segura a través de courier desde Estados Unidos a Ecuador. Descubre oportunidades de emprendimiento, estrategias de comprar para vender, y mantente al día con las actualizaciones de la aduana en Ecuador. ¡Gc-box te guía en el emocionante mundo de las importaciones, facilitando el acceso a productos internacionales y brindándote la información necesaria para tus emprendimientos!',
            //variables del sistema
            'alertas' => $alertas,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
            'face' => $face,
            'insta' => $insta,
            'thre' => $thre,
            'whats' => $whats,
            //links generales
            'registrarC' => $registrarC,
            'header' => 'header_page.php',
            'script' => 'script_page.php'
        ]);
    }
    public static function tiendas(Router $router){
        //variables de informacion
        $telefono = '0999978264';
        $direccion = 'Av. General Rumiñahui e Isla Floreana';
        $correo = 'pablo@globalcargoecuador.com';
        $face = "https://www.facebook.com/profile.php?id=100064165084718&mibextid=LQQJ4d";
        $insta = "https://www.instagram.com/gcbox_593?igsh=NzQ5NGQwc2E4eG4z&utm_source=qr";
        $thre = "https://threads.net/@gcbox_593";
        $whats = "https://wa.me/message/IAVMS2G5JDZFC1";
        //mensajes de alerta
        $alertas = [];
        //links generales
        $registrarC = '/crear-cuenta';
        
        
        $router->render('pages/tiendas', [
            'titulo' => 'Compras en linea',
            'index' => 'index, follow',
            'description' => 'Descubre un universo de oportunidades en nuestra sección de tiendas en línea. Explora mercancías generales, compra en tiendas de Estados Unidos, sumérgete en la experiencia de comprar en China y encuentra productos para comprar y vender. Con Gc-Box, tu destino confiable para compras en línea, abre las puertas a un mundo de opciones y posibilidades comerciales. ¡Descubre, compra y expande tu negocio desde la comodidad de tu hogar!',
            //variables del sistema
            'alertas' => $alertas,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
            'face' => $face,
            'insta' => $insta,
            'thre' => $thre,
            'whats' => $whats,
            //links generales
            'registrarC' => $registrarC,
            'header' => 'header_page.php',
            'script' => 'script_page.php'
        ]);
    }

    public static function materia(Router $router){
            //variables de informacion
            $telefono = '0999978264';
            $direccion = 'Av. General Rumiñahui e Isla Floreana';
            $correo = 'pablo@globalcargoecuador.com';
            $face = "https://www.facebook.com/profile.php?id=100064165084718&mibextid=LQQJ4d";
            $insta = "https://www.instagram.com/gcbox_593?igsh=NzQ5NGQwc2E4eG4z&utm_source=qr";
            $thre = "https://threads.net/@gcbox_593";
            $whats = "https://wa.me/message/IAVMS2G5JDZFC1";
            //mensajes de alerta
            $alertas = [];
            //links generales
            $registrarC = '/crear-cuenta';
        
        $router->render('pages/materias', [
            'titulo' => 'Materia prima',
            'index' => 'index, follow',
            'description' => 'Descubre insumos de calidad y materias primas para empresas en nuestra sección de compras en línea. Con Gc-Box, tu destino confiable, compra directamente en China, elige para vender y abastece tu negocio de manera eficiente.',
            //variables del sistema
            'alertas' => $alertas,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
            'face' => $face,
            'insta' => $insta,
            'thre' => $thre,
            'whats' => $whats,
            //links generales
            'registrarC' => $registrarC,
            'header' => 'header_page.php',
            'script' => 'script_page.php'
        ]);
    }
    
    public static function emprendimiento(Router $router){

        //variables de informacion
        $telefono = '0999978264';
        $direccion = 'Av. General Rumiñahui e Isla Floreana';
        $correo = 'pablo@globalcargoecuador.com';
        $face = "https://www.facebook.com/profile.php?id=100064165084718&mibextid=LQQJ4d";
        $insta = "https://www.instagram.com/gcbox_593?igsh=NzQ5NGQwc2E4eG4z&utm_source=qr";
        $thre = "https://threads.net/@gcbox_593";
        $whats = "https://wa.me/message/IAVMS2G5JDZFC1";
        //mensajes de alerta
        $alertas = [];
        //links generales
        $registrarC = '/crear-cuenta';
        
        
        $router->render('pages/emprendimiento', [
            'titulo' => 'Comprar para vender',
            'index' => 'index, follow',
            'description' => '¡Emprende con Gc-Box! Descubre oportunidades únicas de compra en grandes cantidades para tu emprendimiento digital. Importa, vende y haz crecer tu negocio con nuestro servicio de courier. ¡El éxito está a un clic de distancia!.',
            //variables del sistema
            'alertas' => $alertas,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
            'face' => $face,
            'insta' => $insta,
            'thre' => $thre,
            'whats' => $whats,
            //links generales
            'registrarC' => $registrarC,
            'header' => 'header_page.php',
            'script' => 'script_page.php'
        ]);
    }

    public static function bodega(Router $router){
        
        //variables de informacion
        $telefono = '0999978264';
        $direccion = 'Av. General Rumiñahui e Isla Floreana';
        $correo = 'pablo@globalcargoecuador.com';
        $face = "https://www.facebook.com/profile.php?id=100064165084718&mibextid=LQQJ4d";
        $insta = "https://www.instagram.com/gcbox_593?igsh=NzQ5NGQwc2E4eG4z&utm_source=qr";
        $thre = "https://threads.net/@gcbox_593";
        $whats = "https://wa.me/message/IAVMS2G5JDZFC1";
        //mensajes de alerta
        $alertas = [];
        //links generales
        $registrarC = '/crear-cuenta';
        
        $router->render('pages/bodega', [
            'titulo' => 'Bodega Internacional',
            'index' => 'index, follow',
            'description' => 'Optimiza tus envíos con nuestro servicio de bodegaje en Estados Unidos y China. Desde Miami, somos tu solución en courier para Ecuador. ¡Consolidación de compras y logística sin límites a solo un clic de distancia!',
            //variables del sistema
            'alertas' => $alertas,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
            'face' => $face,
            'insta' => $insta,
            'thre' => $thre,
            'whats' => $whats,
            //links generales
            'registrarC' => $registrarC,
            'header' => 'header_page.php',
            'script' => 'script_page.php'
        ]);
    }

    public static function politicas(Router $router){
        
        //variables de informacion
        $telefono = '0999978264';
        $direccion = 'Av. General Rumiñahui e Isla Floreana';
        $correo = 'pablo@globalcargoecuador.com';
        $face = "https://www.facebook.com/profile.php?id=100064165084718&mibextid=LQQJ4d";
        $insta = "https://www.instagram.com/gcbox_593?igsh=NzQ5NGQwc2E4eG4z&utm_source=qr";
        $thre = "https://threads.net/@gcbox_593";
        $whats = "https://wa.me/message/IAVMS2G5JDZFC1";
        //mensajes de alerta
        $alertas = [];
        //links generales
        $registrarC = '/crear-cuenta';
        
        $router->render('pages/politicas', [
            'titulo' => 'Politicas del servicio y Uso de datos',
            'index' => 'index, follow',
            'description' => 'Revisa nuestras politicas de servicio asi como el uso de datos',
            //variables del sistema
            'alertas' => $alertas,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
            'face' => $face,
            'insta' => $insta,
            'thre' => $thre,
            'whats' => $whats,
            //links generales
            'registrarC' => $registrarC,
            'header' => 'header_page.php',
            'script' => 'script_page.php'
        ]);
    }

    public static function especifico(Router $router){
        
        //variables de informacion
        $telefono = '0999978264';
        $direccion = 'Av. General Rumiñahui e Isla Floreana';
        $correo = 'operaciones@gc-box.com';
        $face = "https://www.facebook.com/profile.php?id=100064165084718&mibextid=LQQJ4d";
        $insta = "https://www.instagram.com/gcbox_593?igsh=NzQ5NGQwc2E4eG4z&utm_source=qr";
        $thre = "https://threads.net/@gcbox_593";
        $whats = "https://wa.me/message/IAVMS2G5JDZFC1";
        //mensajes de alerta
        $alertas = [];
        //links generales
        $registrarC = '/crear-cuenta';
        
        $router->render('pages/emprendimiento', [
            'titulo' => 'Repuestos',
            'index' => 'index, follow',
            'description' => '¡Emprende con Gc-Box! Descubre oportunidades únicas de compra en grandes cantidades para tu emprendimiento digital. Importa, vende y haz crecer tu negocio con nuestro servicio de courier. ¡El éxito está a un clic de distancia!.',
            //variables del sistema
            'alertas' => $alertas,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
            'face' => $face,
            'insta' => $insta,
            'thre' => $thre,
            'whats' => $whats,
            //links generales
            'registrarC' => $registrarC,
            'header' => 'header_page.php',
            'script' => 'script_page.php'
        ]);
    }
    public static function sitemap(Router $router){
        
        $router->render('pages/sitemap');
    }
}