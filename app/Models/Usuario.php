<?php

namespace decodificador;

class Usuario extends Conexion
{    
    public $nombreUsuario;
    public $correo;
    public $contrasenia;

    public function __construct(){
        parent::__construct();
    }

    static function VerificarLogin($nombreUsuario, $contrasenia){

        $conexion = new Conexion();        
        $pre = mysqli_prepare($conexion->conexion,"SELECT * FROM usuarios WHERE nombre_usuario = ? 
        AND contrasenia = ?");
        $pre->bind_param("ss",$nombreUsuario, $contrasenia);
        $pre->execute();
        $resultado = $pre->get_result();
        return $resultado->fetch_object();
    }
    /* function registraUsuario(){
        $prepara = mysqli_prepare($this->conexion, "INSERT INTO usuarios(nombre_usuario,correo,contrasenia)
         VALUES  (?,?,?)");
        $prepara->bind_param("sss", $this->nombreUsuario,$this->correo, $this->contrasenia);
        $prepara->execute();
    } */

}

?>