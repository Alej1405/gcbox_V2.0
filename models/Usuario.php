<?php 
namespace Model;

class Usuario extends ActiveRecord{
    //nombrar o hacer el llamado a la tabla que contiene los datos 
    protected static $tabla = 'usuarios_GR';

    //iterar las columnas de la base de datos
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'cedula', 'direccion', 'provincia', 'ciudad', 'referencia', 'celular', 'telefono', 'correo', 'pasword', 'promocion', 'token', 'confirmado'];

    // atributos de la clase
    public $id;
    public $nombre;
    public $apellido;
    public $cedula;
    public $direccion;
    public $provincia;
    public $ciudad;
    public $referencia;
    public $celular;
    public $telefono;
    public $correo;
    public $pasword;
    public $pasword2;
    public $promocion;
    public $token;
    public $confirmado;

    // Constructor de la clase
    public function __construct($args =[])
    {

        $this -> id = $args['id'] ?? '';
        $this -> nombre = $args['nombre'] ?? '';
        $this -> apellido = $args['apellido'] ?? '';
        $this -> cedula = $args['cedula'] ?? '';
        $this -> direccion = $args['direccion'] ?? '';
        $this -> provincia = $args['provincia'] ?? '';
        $this -> ciudad = $args['ciudad'] ?? '';
        $this -> referencia = $args['referencia'] ?? '';
        $this -> celular = $args['celular'] ?? '';
        $this -> telefono = $args['telefono'] ?? '';
        $this -> correo = $args['correo'] ?? '';
        $this -> pasword = $args['pasword'] ?? '';
        $this -> pasword2 = $args['pasword2'] ?? '';
        $this -> promocion = $args['promocion'] ?? '';
        $this -> token = $args['token'] ?? '';
        $this -> confirmado = $args['confirmado'] ?? 0;
    }

    public function validarUsuario(){

        if(!$this->nombre){
            self::$alertas['warning'][] = "El nombre es obligatorio";
        }
        if(!$this->apellido){
            self::$alertas['warning'][] = "El apellido es obligatorio";
        }
        if(!$this->cedula){
            self::$alertas['warning'][] = "El número de cedula es obligatorio";
        }
        if(!$this->correo){
            self::$alertas['warning'][] = "El correo es obligatorio";
        }
        if(!filter_var($this->correo, FILTER_VALIDATE_EMAIL)){
            self::$alertas['danger'][] = "El correo no es valido";
        }
        if(!$this->celular){
            self::$alertas['warning'][] = "El número de celular es obligatorio";
        }
        if(!$this->pasword){
            self::$alertas['warning'][] = "Es necesario crear una contraseña";
        }
        if(strlen($this->pasword) < 6){
            self::$alertas['danger'][] = "El password no puede tener menos de 6 caracteres";
        }
        if($this->pasword !== $this->pasword2){
            self::$alertas['danger'][] = "Los pasword no coinciden";
        }
        
        return self::$alertas;
    }

    public function validarEmailUsiario(){
        if(!$this->correo){
            self::$alertas['danger'] [] = 'El correo es obligatorio';
        }
        if(!filter_var($this->correo, FILTER_VALIDATE_EMAIL)){
            self::$alertas['danger'] [] = 'EMAIL, NO VALIDO';
        }
        return self::$alertas;
    }

    //hashpasword
    public function hashPasswordUsuario(){
        $this->pasword = password_hash($this->pasword, PASSWORD_BCRYPT);
    }

    //generar un token
    public function crearTokenUsuario(){
        $this->token = md5(uniqid());
    }

    //validar password
    public function validarPasswordUsuario(){
        if (!$this->pasword){
            self::$alertas['warning'][]='Ingresa un pasword';
        }
        if (strlen($this->pasword) < 6){
            self::$alertas['warning'][]='El password debe contener 6 caracteres';
        }
        if($this->pasword !== $this->pasword2){
            self::$alertas['danger'][] = "Los pasword no coinciden";
        }
        return self::$alertas;
    }

        //validar el login de usuarios
        public function validarLoginUsuario(){
            if (!$this->correo){
                self::$alertas['warning'][]='El usuario o correo es obligatorio';
            }
            if(!filter_var($this->correo, FILTER_VALIDATE_EMAIL)){
                self::$alertas['danger'] [] = 'EMAIL, NO VALIDO';
            }
            return self::$alertas;
        }
}