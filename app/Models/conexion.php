<?php
/* 
$mysql = new mysqli("localhost","","","prueba");

if($mysql->connect_errno){
    echo "Fallo al conectar a MySQL (" . $mysql->connect__errno . ")" . $mysql->connect__error;
}

echo $mysql->host_info . "\n";
 */
/* $mysql = new mysqli("127.0.0.1","usuario","contraseña","nombreBD", puerto); */
$mysql = new mysqli("127.0.0.1","root","","prueba",3306);

if($mysql->connect_errno){
    echo "Fallo al conectar a MySQL: (" . $mysql->connection_errno . ") ". $mysql->connect_error;
}
echo $mysql->host_info . "\n"
?>