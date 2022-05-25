<?php


namespace decodificador;


class Conexion
{
    public $conexion;
    public function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $bd = "decodificador";
        $this->conexion = mysqli_connect($host, $user, $pass, $bd);
        mysqli_query($this->conexion,"SET NAMES 'utf8");
    }

}