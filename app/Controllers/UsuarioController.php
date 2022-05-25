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
            require 'app/Views/login.php';
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

    /* function registro(){

        require 'app/Views/registro.php';
        $this->verificaDatosRegistro();

    } */
    /* function verificaDatosRegistro(){

        $registroPersona = new Curp();
        if (!isset($_POST["primer_nombreReg"]) || !isset($_POST["segundo_nombreReg"])
            || !isset($_POST["apellido_paternoReg"]) || !isset($_POST["apellido_maternoReg"])
            || !isset($_POST["diaReg"]) || !isset($_POST["mesReg"]) || !isset($_POST["anioReg"])
            || !isset($_POST["generoReg"]) || !isset($_POST["estado_nacimientoReg"])
            || !isset($_POST["correoReg"]) || !isset($_POST["contraseniaReg"])){

        }else{

            $registroPersona->primer_nombre = $_POST["primer_nombreReg"];
            $registroPersona->segundo_nombre = $_POST["segundo_nombreReg"];
            $registroPersona->apellido_paterno = $_POST["apellido_paternoReg"];
            $registroPersona->apellido_materno = $_POST["apellido_maternoReg"];
            $registroPersona->dia=$_POST["diaReg"];
            $registroPersona->mes = $_POST["mesReg"];
            $registroPersona->anio = $_POST["anioReg"];
            $registroPersona->genero = $_POST["generoReg"];
            $registroPersona->estado_nacimiento = $_POST["estado_nacimientoReg"];
            $registroPersona->correo = $_POST["correoReg"];
            $registroPersona->contrasenia = $_POST["contraseniaReg"];
            $registroPersona->registraUsuario();
            $id = Curp::extraer_id($_POST["correoReg"]);
            $curpCompleta = $registroPersona->curpCompleta();
            // metodo enviar curp y id a tabla persona_curp
            //metodo($id,$curp);
            $registroPersona->mandarIdYCurp($id->id_persona,$curpCompleta);
            $this->perfil();
            echo "Su curp es: ".$registroPersona->curpCompleta();
        }


    } */
    
    function decodificador(){       
        require 'app/Views/decodificador.php';
    }

}