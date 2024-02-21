<?php 

namespace Model;

class Servicios extends ActiveRecord {
    //nombrar o hacer el llamado a la tabla que contiene los datos 
    protected static $tabla = 'servicios_GR';
    //iterar las columnas de la base de datos
    protected static $columnasDB = ['id', 'nombre', 'u_medida', 'costo', 'pvp', 'observacion', 'fecha', 'id_usuario'];

      //atributos de clase
        public $id;
        public $nombre;
        public $u_medida;
        public $costo;
        public $pvp;
        public $observacion;
        public $fecha;
        public $id_usuario;

    //constructor de clase
    public function __construct($args =[])
    {
        $this -> id = $args['id'] ?? '';
        $this -> nombre = $args['nombre'] ?? '';
        $this -> u_medida = $args['u_medida'] ?? '';
        $this -> costo = $args['costo'] ?? '';
        $this -> pvp = $args['pvp'] ?? '';
        $this -> observacion = $args['observacion'] ?? '';
        $this -> fecha = $args['fecha'] ?? '';
        $this -> id_usuario = $args['id_usuario'] ?? '';
    }

    public function validar(){

        if(!$this->nombre){
            self::$alertas['warning'][] = "El nombre es obligatorio.";
        }
        if(!$this->u_medida){
            self::$alertas['warning'][] = "La Unidad de medida es obligatoria.";
        }
        if(!$this->costo){
            self::$alertas['warning'][] = "El costo del servicio es obligatorio.";
        }
        if(!$this->pvp){
            self::$alertas['warning'][] = "Ingresa un precio de venta.";
        }
        if(!$this->observacion){
            self::$alertas['warning'][] = "Es necesario describir el servicio.";
        }

        return self::$alertas;
    }
}