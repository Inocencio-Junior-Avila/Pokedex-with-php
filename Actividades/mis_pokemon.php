<?php
include('../Libreria/principal.php');

use Medoo\Medoo;

$rs = new Resultado();

$rs->verificar("token");

$database = new Medoo([
    'type' => 'mysql',
    'host' => DB_HOST,
    'database' => DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASS
]);

$tmpx = $database->select('maestro',['id'],['token' => $_POST['token']]);

if(count($tmpx) == 0){
    $rs->exito = false;
    $rs->mensaje = "Error en la Validacion de los datos =(";
    $rs->finalizar();
}
$maestro = $tmpx[0];

$data = $database->select('pokemon','*', ['maestro' => $maestro["id"]]);

$rs->datos = $data;

$rs->finalizar();