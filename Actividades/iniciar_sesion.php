<?php
    include('../Componentes/plantilla2.php');
    plantilla2::aplicar();
include('../Libreria/principal.php');
use Medoo\Medoo;

$rs = new Resultado();

$rs->verificar("correo, clave");

$database = new Medoo([
    'type' => 'mysql',
    'host' => DB_HOST,
    'database' => DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASS
]);

$dbrs = $database->select('maestro',['id','nombre','apellido','correo','whatsapp','ciudad'],['correo' => $_POST['correo'],'clave' => md5($_POST['clave'] . SALT_PKM)]);

if(count($dbrs) > 0){
    $posible = $dbrs[0];
    $rs->exito = true;
    $rs->mensaje = "Bienvenido =)";
    $token = generartoken();

    $posible['token'] = $token;
    $rs->data = $posible;
    
    
    $database->update('maestro',["token" => $token], ["id" => $posible["id"]]);
}else{
    $rs->exito = false;
    $rs->mensaje = "correo o clave incorrectos";
}


$rs->finalizar();