<?php
date_default_timezone_set('America/Lima');

date_default_timezone_set('America/Lima');

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'sishorario';

$conexion = mysql_connect($server,$username,$password) or die ("Error al conectar al servidor");

////////////////////////////////////////////////////////////////////////////////////////////////////

$celular =$_POST['celular'];
$correo =$_POST['correo'];
$id_usuario =$_POST['id_usuario'];

mysql_select_db($database,$conexion) or die ("Error al conectar la base de datos");

mysql_query("UPDATE tblusuarios SET celular = '$celular' , correo = '$correo'  WHERE idUsuario= '$id_usuario'");

header('Location: config.php');
?>