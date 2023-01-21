<?php
include('config.php');
class conexion{

    private $con = null;
    private static $instancia = null;

    public function __construct(){
        //echo "<div>Me conecte =)</div>";
        if($this->con == null){
            $this->con = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
        }   
        if($this->con->connect_errno){
            $this->con = false;
        }
        
    }

    public static function get_con(){
        if(self::$instancia == null){
            self::$instancia = new conexion();
        }
        return self::$instancia->con;
    }
    
    public function __destruct(){
        //echo "<div>Me deconecte =)</div>";
        if($this->con != null){
            $this->con->close();
        }
        
    }
}