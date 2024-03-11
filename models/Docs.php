<?php 

namespace Model;

class Docs extends ActiveRecord{

    protected static $tabla = 'documentos_GR';
    protected static $columnasDB = ['id', 'doc', 'tipo', 'detalle', 'id_usuario', 'id_carga'];

    //atributos del modelo
    public $id;
    public $doc;
    public $tipo;
    public $detalle;
    public $id_usuario;
    public $id_carga;

    //constructor
    public function __construct($args = [])
    {
        $this -> id = $args['id'] ?? null;
        $this -> doc = $args['doc'] ?? '';
        $this -> tipo = $args['tipo'] ?? '';
        $this -> detalle = $args['detalle'] ?? '';
        $this -> id_usuario = $args['id_usuario'] ?? '';
        $this -> id_carga = $args['id_carga'] ?? '';
        
    }

    //validaciones
    public function validarDoc(){
        if (!$this->tipo){
            self::$alertas['danger'] [] = "Registra el tipo de documento";
        }
        if (!$this->detalle){
            self::$alertas['danger'] [] = "Explica por que subes el documento";
        }
        return self::$alertas;
    }


}