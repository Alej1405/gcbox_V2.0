<?php 

namespace Model;

class Embarques extends ActiveRecord{

    //nombrar o hacer el llamado a la tabla que contiene los datos 
    protected static $tabla = 'embarques_GR';
    //iterar las columnas de la base de datos
    protected static $columnasDB = ['id', 'wh', 'url', 'orden', 'f_embarque', 'id_cliente', 'id_carga', 'id_usuario'];

    //atributos de clase
    public $id;
    public $wh;
    public $url;
    public $orden;
    public $f_embarque;
    public $id_cliente;
    public $id_carga;
    public $id_usuario;

    public function __construct($args=[])
    {
        $this -> id = $args ['id'] ?? null;
        $this -> wh = $args ['wh'] ?? '';
        $this -> url = $args ['url'] ?? '';
        $this -> orden = $args ['orden'] ?? '';
        $this -> f_embarque = $args ['f_embarque'] ?? '';
        $this -> id_cliente = $args ['id_cliente'] ?? '';
        $this -> id_carga = $args ['id_carga'] ?? '';
        $this -> id_usuario = $args ['id_usuario'] ?? '';
    }

    
}