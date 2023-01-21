<?php

function generartoken(){
    $tkm = md5( rand(4,9999999999) . SALT_PKM . uniqid());
    return $tkm;
}

class Resultado{

    public $exito;
    public $datos;
    public $mensaje;

    public function __construct($dato = null){
        $this->exito = true;
        $this->datos = [];
        $this->mensaje = "";
        
        if($dato != null){
            $this->datos = $dato;
        }
    }

    public function __toString(){
        return json_encode($this);
    }

    public function finalizar(){
        header('content-Type: application/json');
        echo $this;
        exit;
    }

    public function verificar($campos){
        $campos = explode(",", $campos);
        $campos = array_map('trim', $campos);

        foreach ($campos as $campo){
            if(!isset($_POST[$campo])){
                $this->exito = false;
                $this->mensaje .= "El campo $campo es requerido <br/>";
            }
        }
        if(!$_POST & isset($_GET['form'])){
            echo "
            <div class= 'container'>
            <form method='post' action = ''>";
            foreach($campos as $campo){
                echo "<h7><b>$campo</b></h7>";
                echo "<input type='text' name='$campo' value=''/> <br/>";
            }
            echo "<input type='submit' class='btn green darken-4' value='Enviar'/>";
            echo "</form>
            </div>
            ";
            exit();
        }
        if(!$this->exito){
            $this->finalizar();
        }
    }
}