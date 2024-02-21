<?php 

namespace Model;

class Guia extends ActiveRecord{
        //llamado a la tabla 
        protected static $tabla = 'guias_GR';
        //iterar las columnas de la tabla
        protected static $columnasDB = ['id', 'guia', 'observaciones', 'f_registro', 'id_usuario', 'id_consignatario', 'id_carga'];
    
        //atributos de la clase
    
        public $id;
        public $guia;
        public $observaciones;
        public $f_registro;
        public $id_usuario;
        public $id_consignatario;
        public $id_carga;
    
        //construcctor de la clase
        public function __construct($args =[])
        {
            $this -> id = $args['id']?? '';
            $this -> guia = $args['guia'] ?? '';
            $this -> observaciones = $args['observaciones'] ?? '';
            $this -> f_registro = $args ['f_registro'] ?? '';
            $this -> id_usuario = $args ['id_usuario'] ?? '';
            $this -> id_consignatario = $args ['id_consignatario'] ?? '';
            $this -> id_carga = $args ['id_carga'] ?? '';
        }
}