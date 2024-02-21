<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function confirmarCuenta(){
        //configutarion
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['EMAIL_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['EMAIL_USER'];                     //SMTP username
        $mail->Password   = $_ENV['EMAIL_PASS'];                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = $_ENV['EMAIL_PORT']; 

        //destinatario
        $mail->setFrom('gerencia@mashacorp.com', 'Gc-Box by Masha Both');
        $mail->addAddress($this->email, $this->nombre);     //Add a recipient
        //$mail->addAddress('lineas1405@gmail.com', 'Verificacion');                //Name is optional
        $mail->addReplyTo('operaciones@gc-box.com','Operaciones Gc-box');
        //debuguear($mail);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Gc-Box nuevo mensaje desde la web";
        
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Tu cuenta se a creado de forma correcta </p>";
        $contenido .= "<p>Haz click aqui: <a href='https://gc-box.com/confirmar?token=".$this->token."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no creaste esta cuenta, no hagas caso a este correo, las cuentas no verificadas se auto eliminan</p>";
        $contenido .= '</html>';


        $mail->Body = $contenido; 
        //debuguear("hola...");

        $mail->CharSet = 'UTF-8';
        $mail->send();
    }

    public function enviarConfirmacion(){
        //configutarion
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['EMAIL_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['EMAIL_USER'];                     //SMTP username
        $mail->Password   = $_ENV['EMAIL_PASS'];                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = $_ENV['EMAIL_PORT']; 

        //destinatario
        $mail->setFrom('gerencia@mashacorp.com', 'Gc-Box by Masha Both');
        $mail->addAddress('operaciones@gc-box.com', 'Alejandro');     //Add a recipient
        //$mail->addAddress('lineas1405@gmail.com', 'Verificacion');                //Name is optional
        $mail->addReplyTo($this->email, $this->nombre);
        //debuguear($mail);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Gc-Box nuevo mensaje desde la web";
        
        $contenido = '<html>';
        $contenido .= "<p><strong>El lead " . $this->nombre . "</strong> Ha enviado el siguiente mensaje</p>";
        $contenido .= "<p>" . $this->token . "</p>";
        $contenido .= "<p>Ponte en contacto con el</p>";
        $contenido .= '</html>';


        $mail->Body = $contenido; 
        //debuguear("hola...");

        $mail->CharSet = 'UTF-8';
        $mail->send();
    }

    public function enviarInstrucciones(){
        //configutarion
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['EMAIL_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['EMAIL_USER'];                     //SMTP username
        $mail->Password   = $_ENV['EMAIL_PASS'];                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = $_ENV['EMAIL_PORT']; 

        //destinatario
        $mail->setFrom('gerencia@mashacorp.com', 'Gc-Box by Masha Both');
        $mail->addAddress($this->email, $this->nombre);     //Add a recipient
        //$mail->addAddress('lineas1405@gmail.com', 'Verificacion');                //Name is optional
        $mail->addReplyTo('pablo@globalcargoecuador.com', 'Alejandro');
        //debuguear($mail);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Restablecer password";
        
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Al parecer olvidaste tu password, sigue el enlace para poder restablecerlo</p>";
        $contenido .= "<p>Presiona aquí: <a href='".$_ENV['PROJECT_URL']."/restablecer?token=" . $this->token . "'>Restablecer Password</a></p>";
        $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar este mensaje</p>";
        $contenido .= '</html>';


        $mail->Body = $contenido; 
        //debuguear("hola...");

        $mail->CharSet = 'UTF-8';
        $mail->send();
    }

    public function notifyS(){
        //configutarion
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['EMAIL_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['EMAIL_USER'];                     //SMTP username
        $mail->Password   = $_ENV['EMAIL_PASS'];                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = $_ENV['EMAIL_PORT']; 

        //destinatario
        $mail->setFrom('gerencia@mashacorp.com', 'Gc-Box by Masha Both');
        $mail->addAddress($this->email, $this->nombre);     //Add a recipient
        //$mail->addAddress('lineas1405@gmail.com', 'Verificacion');                //Name is optional
        $mail->addReplyTo('operaciones@gc-box.com', 'Alejandro');
        //debuguear($mail);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Al parecer iniciaste sesion";
        
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Te confirmamos el ingreso correcto a tu casilla </p>";
        $contenido .= "<p>Si no fuiste tu, reportalo enseguida respondiendo este correo o en el siguiente link</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://wa.me/message/IAVMS2G5JDZFC1'>Reportar inicio de sesion dudoso</a></p>";
        $contenido .= '</html>';


        $mail->Body = $contenido; 
        //debuguear("hola...");

        $mail->CharSet = 'UTF-8';
        $mail->send();
    }

    public function confirmarEmbarque(){
        //configutarion
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['EMAIL_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['EMAIL_USER'];                     //SMTP username
        $mail->Password   = $_ENV['EMAIL_PASS'];                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = $_ENV['EMAIL_PORT']; 

        //destinatario
        $mail->setFrom('gerencia@mashacorp.com', 'Gc-Box by Masha Both');
        $mail->addAddress($this->email, $this->nombre);     //Add a recipient
        //$mail->addAddress('lineas1405@gmail.com', 'Verificacion');                //Name is optional
        $mail->addReplyTo('operaciones@gc-box.com', 'Operaciones-embarques');
        //debuguear($mail);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $this->token;

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Confirmamos el embarque exitoso de tu carga. </p>";
        $contenido .= "<p>Por favor, autoriza esto leyendo el documento adjunto y respondiendo este correo con el siguiente texto.</p>";
        $contenido .= "<p>YO ".$this->nombre .", con CI: (AGREGA TU NUMERO DE CEDULA) He leido y estoy de acuerdo con lo expuesto en el contrato adjunto en el presente correo, autorizo a Gc-Box continuar con el proceso de importacion .</p>";
        $contenido .= "<p>Recuerda que este proceso es necesario para validar y continuar, sin este paso el proceso no podra continuar.</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://wa.me/message/IAVMS2G5JDZFC1'>si necesitas mas informacion.</a></p>";
        $contenido .= '</html>';

        $mail->Body = $contenido; 
        //debuguear("hola...");

        $mail->addAttachment('../docs/Acta.pdf', 'Contrato');
        

        $mail->CharSet = 'UTF-8';
        $mail->send();
    }

    public function confirmarGuia(){
        //configutarion
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['EMAIL_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['EMAIL_USER'];                     //SMTP username
        $mail->Password   = $_ENV['EMAIL_PASS'];                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = $_ENV['EMAIL_PORT']; 

        //destinatario
        $mail->setFrom('gerencia@mashacorp.com', 'Gc-Box by Masha Both');
        $mail->addAddress($this->email, $this->nombre);     //Add a recipient
        //$mail->addAddress('lineas1405@gmail.com', 'Verificacion');                //Name is optional
        $mail->addReplyTo('operaciones@gc-box.com', 'Operaciones-embarques');
        //debuguear($mail);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $this->token;

        $contenido = '<html>';
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> Se agrego una guia a tu proceso. </p>";
        $contenido .= "<p>Se genero una guia a tu proceso de importacion, el proceso va bien..</p>";
        $contenido .= "<p>Estamos para servirte, recuerda que para contactarnos, puedes responder este correo o en link escribirnos directamente.</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://wa.me/message/IAVMS2G5JDZFC1'>si necesitas mas informacion.</a></p>";
        $contenido .= '</html>';

        $mail->Body = $contenido; 
        //debuguear("hola...");

        $mail->CharSet = 'UTF-8';
        $mail->send();
    }

    public function notificarUpdate(){
        //configutarion
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['EMAIL_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['EMAIL_USER'];                     //SMTP username
        $mail->Password   = $_ENV['EMAIL_PASS'];                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = $_ENV['EMAIL_PORT']; 

        //destinatario
        $mail->setFrom('gerencia@mashacorp.com', 'Gc-Box by Masha Both');
        $mail->addAddress($this->email, $this->nombre);     //Add a recipient
        //$mail->addAddress('lineas1405@gmail.com', 'Verificacion');                //Name is optional
        $mail->addReplyTo('operaciones@gc-box.com', 'Operaciones-embarques');
        //debuguear($mail);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Actualizacion de importacion';

        $contenido = '<html>';
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> Estamos procesando tu carga, aqui tienes algunas novedaes. </p>";
        $contenido .= "<p>Actualmente tu carga se encuentra en el siguiente paso: <strong>".$this->token."</strong>.</p>";
        $contenido .= "<p>Estamos para servirte, recuerda que para contactarnos, puedes responder este correo o en link escribirnos directamente.</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://wa.me/message/IAVMS2G5JDZFC1'>si necesitas mas informacion.</a></p>";
        $contenido .= '</html>';

        $mail->Body = $contenido; 
        //debuguear("hola...");

        $mail->CharSet = 'UTF-8';
        $mail->send();
    }
}