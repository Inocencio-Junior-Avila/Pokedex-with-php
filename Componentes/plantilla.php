<?php

class plantilla{

    public static $instancia = null;
    public static function aplicar(){
        self::$instancia = new plantilla();
    }

    public function __construct(){
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pokedex</title>
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>
    <style>
        @media print{
            .no-print{
                display: none;
            }
            body{
                background:white;
            }
        }

        body {
            heigh:400px;
            background-image: url("https://images7.alphacoders.com/662/662102.png");
            background-size: cover;
            background-repeat:no-repeat;
            background-position: center center;
        }
    </style>

</head>
<body>
<nav class="transparent">
        <div class= "container">
            <div class="nav-wrapper">
                <a href="./" class="brand-logo"><img src="img/Pokémon-logo.png" alt="logo :)" width="200px" height="65px"></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                <li><a href="Actividades/eventos.php">Eventos</a></li>
                <li><a href="Actividades/registro_maestro.php?form">Registrar Maestro</a></li>
                <li><a href="Actividades/lista_maestro.php">Listado de maestro</a></li>
                <li><a href="Actividades/iniciar_sesion.php?form">Iniciar Sesion</a></li>
                <li><a href="Actividades/registro_pokemon.php?form">registro de pokemon</a></li>
                <li><a href="Actividades/mis_pokemon.php">Mis Pokemon</a></li>
            </ul>
            </div>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="Actividades/eventos.php">Eventos</a></li>
            <li><a href="Actividades/registro_maestro.php">Registrar Maestro</a></li>
            <li><a href="Actividades/lista_maestro.php">Listado de maestro</a></li>
            <li><a href="Actividades/iniciar_sesion.php">Iniciar Sesion</a></li>
            <li><a href="Actividades/registro_pokemon.php">registro de pokemon</a></li>
            <li><a href="Actividades/mis_pokemon.php">Mis Pokemon</a></li>
        </ul>
    <div class="container">
        
        
        
        <div style="min-height:786px;">

<?php
    } 

        function __destruct(){
            ?>
            </div>
            </div>
            <div class="text-center" style="background:transparent; padding:20px">
            <center><b> © Derechos Resevados IJAG.inc <?= date("Y"); ?></b></center>
            </div>
        
    </body>
    </html>
    <?php
}
}