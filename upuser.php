<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<?php
date_default_timezone_set('America/Lima');


$server = 'localhost';
$username = 'root';
$password = '';
$database = 'sishorario';

$conexion = mysql_connect($server,$username,$password) or die ("Error al conectar al servidor");

////////////////////////////////////////////////////////////////////////////////////////////////////
$mensaje = '  No coinciden las claves ... ';
$contra = $_POST['contra'];
$newcontra = $_POST['newcontra'];
$passEncriptado;

$id_ucontra = $_POST['id_ucontra'];


mysql_select_db($database,$conexion) or die ("Error al conectar la base de datos");


	if ($_POST['contra'] != $_POST['newcontra']) {
 print "<script>alert('$mensaje')</script>";
 print("<script>window.location.replace('config.php');</script>"); 
} else {
  $passEncriptado = hash('sha512',$contra);
		$sql = "UPDATE tblusuarios SET usu_clave = '$passEncriptado'  WHERE idUsuario= '$id_ucontra'";
		$respuesta = mysql_query($sql) or die ("Error");
		mysql_close($respuesta);
		header('Location: config.php');
}


	
?>
</body>
</html>