<?php

require 'app/Models/Conexion.php';
require 'app/Models/Usuario.php';
use decodificador\Usuario;
use decodificador\Conexion;

class UsuarioController
{
    public function __construct()
    {
        if($_GET["action"] == "decodificador"){
            if(!isset($_SESSION["loginEntra"])){
                echo "No has iniciado sesion";
                header("location: /index.php?controller=Usuario&action=login");
            }
        }
    }
    function login(){

        require 'app/Views/login.php';
        $this->verificaDatosLogin();
    }
    function verificaDatosLogin(){

        if (!isset($_POST["nombreUsuario"]) || !isset($_POST["pass"])){
            
        }else{
            $nombreUsuario = $_POST["nombreUsuario"];
            $contrasenia = $_POST["pass"];
            $verificar = Usuario::VerificarLogin($nombreUsuario, $contrasenia);            
            

            if (!$verificar){
                $estatus = "Datos Incorrectos";
                require 'app/Views/login.php';
            }else{
                $_SESSION["loginEntra"] = $verificar;
                $this->decodificador();
            }
            
        }
    }
    public function logout(){

        if(isset($_SESSION["loginEntra"])){
            unset($_SESSION["loginEntra"]);
        }
        echo "sesion cerrada";
    }

    function registro(){

        require 'app/Views/registro.php';
        $this->verificaDatosRegistro();

    }
    function verificaDatosRegistro(){

        $usuario = new Usuario();
        if (!isset($_POST["usuarioReg"]) || !isset($_POST["correoReg"])
            || !isset($_POST["passReg"])){

        }else{
            $usuario->nombreUsuario = $_POST["usuarioReg"];
            $usuario->correo = $_POST["correoReg"];
            $usuario->contrasenia = $_POST["passReg"];            
            $usuario->registraUsuario();  
            $estatus = "Usuario registrado";                                              
            require 'app/Views/login.php';   
        }
    }
    
    function decodificador(){       
        require 'app/Views/decodificador.php';
    }

}