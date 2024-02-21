<?php 
use Model\ActiveRecord;
// Conectarnos a la base de datos
require 'funciones.php';
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeload();


require 'database.php';
ActiveRecord::setDB($db);