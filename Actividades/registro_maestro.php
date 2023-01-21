<?php
    include('../Componentes/plantilla2.php');
    plantilla2::aplicar();
include('../Libreria/principal.php');
use Medoo\Medoo;

$rs = new Resultado();

$rs->verificar("nombre, apellido, correo, clave, whatsapp, ciudad");

$database = new Medoo([
    'type' => 'mysql',
    'host' => DB_HOST,
    'database' => DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASS
]);

$posible = $database->select('maestro','*',['correo' => $_POST['correo']]);

if(count($posible) > 0){
    $rs->exito = false;
    $rs->mensaje = "El correo ya esta vinculado a otra cuenta";
    $rs->finalizar();
}

$maestro = [];
$maestro["nombre"] = $_POST["nombre"];
$maestro["apellido"] = $_POST["apellido"];
$maestro["correo"] = $_POST["correo"];
$maestro["clave"] = md5($_POST["clave"] . SALT_PKM);
$maestro["whatsapp"] = $_POST["whatsapp"];
$maestro["ciudad"] = $_POST["ciudad"];


$database->insert("maestro", $maestro);

$rs->mensaje = "Registro realizado =)";

$rs->finalizar();