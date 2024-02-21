<?php 
namespace Model;

class Pages extends ActiveRecord {
    //propiedades de la clase
    public $name;
    public $email;
    public $subject;
    public $message;

    // constructor de la clase
    public function __construct($args =[])
    {
        $this->name =$args ['name'] ?? '';
        $this->email = $args ['email'] ?? '';
        $this->subject = $args ['subject'] ?? '';
        $this->message = $args ['message'] ?? '';
    }

    //validar usuario
    public function validarEmail(){
        if(!$this->email){
            self::$alertas['danger'] [] = 'El email es obligatorio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertas['danger'] [] = 'EMAIL, NO VALIDO';
        }
        if(!$this->name){
            self::$alertas['danger'] [] = 'Por favor dejanos tu nombre.';
        }
        if(!$this->subject){
            self::$alertas['danger'] [] = 'El asunto es obligarotio.';
        }
        if(!$this->message){
            self::$alertas['danger'] [] = 'Describe lo que requieres de nosotros.';
        }
        if (strlen($this->message) < 6){
            self::$alertas['warning'][]='El mensaje debe contener al menos 30 caracteres.';
        }
        return self::$alertas;
    }

}