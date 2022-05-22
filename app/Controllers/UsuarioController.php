<?php
require 'app/Models/Conexion.php';
require 'app/Models/Usuario.php';
use decodificador\Conexion;
use decodificador\Usuario;

class UsuarioController{
    
    public function __construct(){

        if($_GET["action"] == "decodificador"){
            if(!isset($_SESSION["loginAcceso"])){
                echo "No has iniciado sesion";
                header("location:/decodificador/index.php?controller=Usuario&action=index");
            }
        }
    
    }

    function verificaDatosLogin(){

        if (!isset($_POST["nombreUsuario"]) || !isset($_POST["pass"])){
            echo "no existen los datos error";
        }else{
            $nombreUsuario = $_POST["nombreUsuario"];
            $contrasenia = $_POST["pass"];
            $verificar = Curp::VerificarLogin($correo, $contrasenia);
            
            if (!$verificar){
                $estatus = "Datos Incorrectos";
                require 'app/Views/login.php';
            }else{
                $_SESSION["loginAcceso"] = $verificar;
                require 'app/Views/decodificador.php';
            }
        }
    }
    function registro(){
        require 'app/Views/registro.php';
        $this->verificaDatosRegistro();
    }
    function verificaDatosRegistro(){

        $registroPersona = new Usuario();
        
        if (!isset($_POST["usuarioReg"]) || !isset($_POST["correoReg"]) || !isset($_POST["passReg"])){

        }else{
            $registroPersona->nombreUsuario = $_POST["nombre_usuario"];
            $registroPersona->correo = $_POST["correo"];
            $registroPersona->contrasenia = $_POST["contrasenia"];
            $registroPersona->registraUsuario();
            require 'app/Views/decodificador.php'
        }
    }
?>