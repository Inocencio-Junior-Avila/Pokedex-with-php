<?php
    include('../Componentes/plantilla2.php');
    plantilla2::aplicar();
include('../Libreria/principal.php');
use Medoo\Medoo;

$rs = new Resultado();

$rs->verificar("nombre, nivel, tipo, comentario, token");

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

$pokemon = [];
$pokemon["nombre"] = $_POST["nombre"];
$pokemon["nivel"] = $_POST["nivel"];
$pokemon["tipo"] = $_POST["tipo"];
$pokemon["comentario"] = $_POST["comentario"];
$pokemon["maestro"] = $maestro["id"];

$database->insert("pokemon", $pokemon);

$rs->mensaje = "Registro de pokemon realizado =)";

$rs->finalizar();