<?php
    namespace codificador;

    class Conexion{
        public $conexion;
        public function __construct(){
            $host = "127.0.0.1";
            $user = "root";
            $pass = "";
            $bd = "decodificador"
            $this->conexion = mysqli_connect($host, $user, $pass, $bd);
            mysql_query($this->conexion,"SET NAMES 'utf8");
        }
    }

?>