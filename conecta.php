<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "sesion";
$conecta = mysqli_connect($servidor, $usuario, $password, $bd);
if ($conecta->connect_error) {
  die("error al conectar la base de datos".$conecta->connect_error);
}
//else{
  //echo "conexion exitosa";
//}
 ?>
