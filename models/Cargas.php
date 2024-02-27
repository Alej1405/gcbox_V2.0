<?php
namespace Model;

class Cargas extends ActiveRecord{
    //nombrar o hacer el llamado a la tabla que contiene los datos 
        protected static $tabla = 'cargas_Gr';
        protected static $filtro = 'tipo';

    //iterar las columnas de la base de datos
        protected static $columnasDB = ['id', 'tracking', 'origen', 'detalle', 'peso', 'unidad', 'largo', 'ancho', 'alto', 'tipo', 'factura', 'valorTotal', 'impuestos', 'envio', 'register_by', 'f_registro', 'id_cliente'];

    //atributos de clase
        public $id;
        public $tracking;
        public $origen;
        public $detalle;
        public $peso;
        public $unidad;
        public $largo;
        public $ancho;
        public $alto;
        public $tipo;
        public $factura;
        public $valorTotal;
        public $impuestos;
        public $envio;
        public $register_by;
        public $f_registro;
        public $id_cliente;

    //constructor de la clase
        public function __construct($args =[])
        {
            //id se auto genera e incrementa  
                $this -> id = $args['id'] ?? null;
            //informacion ingresada por el usuario
                $this -> tracking = $args['tracking'] ?? 0;
                $this -> origen = $args['origen'] ?? '';
                $this -> detalle = $args['detalle'] ?? '';
            //informacion ingresada en la actualizacion de la carga
                $this -> peso = $args['peso'] ?? '1';
                $this -> unidad = $args['unidad'] ?? '1';
                $this -> largo = $args['largo'] ?? '1';
                $this -> ancho = $args['ancho'] ?? '1';
                $this -> alto = $args['alto'] ?? '1';
                $this -> tipo = $args['tipo'] ?? '1';
                $this -> factura = $args['factura'] ?? 's/f';
                $this -> valorTotal = $args['valorTotal'] ?? '0';
                $this -> impuestos = $args['impuestos'] ?? '0';
                $this -> envio = $args['envio'] ?? '0';
            //informacion no manipulable, informacion de control
                $this -> register_by = $args['register_by'] ?? '';
                $this -> f_registro = $args['f_registro'] ?? '';
                $this -> id_cliente = $args['id_cliente'] ?? '';
        }
        //validar las cargas
        public function validarCarga(){
            if(!$this->tracking){
                self::$alertas['warning'] [] = "El tracking es obligatorio";
            }
            if(!$this->origen){
                self::$alertas['warning'] [] = "El origen es obligatorio";
            }
            if(!$this->detalle){
                self::$alertas['warning'] [] = "El detalle es obligatorio";
            }
            if(!$this->id_cliente){
                self::$alertas['warning'] [] = "Agrega un cliente";
            }
            return self::$alertas;
        }
}