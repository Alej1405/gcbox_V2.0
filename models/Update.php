<?php 

namespace Model;

class Update extends ActiveRecord {

    //nombrar o hacer el llamado a la tabla que contiene los datos 
    protected static $tabla = 'update_GR';

    //iterar las columnas de la base de datos
    protected static $columnasDB = ['id', 'estado', 'f_update', 'comentario', 'id_usuario', 'id_carga'];

    //atributos del modelo
    public $id;
    public $estado;
    public $f_update;
    public $comentario;
    public $id_usuario;
    public $id_carga;

    //constructor de la clase
    public function __construct($args =[])
    {
        $this -> id = $args['id'] ?? null;
        $this -> estado = $args['estado'] ?? '';
        $this -> f_update = $args['f_update'] ?? '';
        $this -> comentario = $args['comentario'] ?? '';
        $this -> id_usuario = $args['id_usuario'] ?? '';
        $this -> id_carga = $args['id_carga'] ?? '';
    }
}