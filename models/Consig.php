<?php 

namespace Model;

class Consig extends ActiveRecord{
    //nombrar o hacer el llamado a la tabla que contiene los datos 
    protected static $tabla = 'consignatarios_GR';
    //iterar las columnas de la base de datos
        protected static $columnasDB = ['id', 'nombre', 'apellido', 'cedula', 'id_usuario', 'f_registro'];

      //atributos de clase
        public $id;
        public $nombre;
        public $apellido;
        public $cedula;
        public $id_usuario;
        public $f_registro;

    //constructor de clase
        public function __construct($args =[])
        {
            $this -> id = $args['id'] ?? '';
            $this -> nombre = $args['nombre'] ?? '';
            $this -> apellido = $args['apellido'] ?? '';
            $this -> cedula = $args['cedula'] ?? '';
            $this -> id_usuario = $args['id_usuario'] ?? '';
            $this -> f_registro = $args['f_registro'] ?? '';
        
    }
    public function validar(){

        if(!$this->nombre){
            self::$alertas['warning'][] = "El nombre es obligatorio";
        }
        if(!$this->apellido){
            self::$alertas['warning'][] = "El apellido es obligatorio";
        }
        if(!$this->cedula){
            self::$alertas['warning'][] = "La cédula es obligatoria";
        }

        return self::$alertas;
    }
}