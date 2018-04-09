<?php 

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'sishorario';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
date_default_timezone_set('America/Lima'); 
$mensaje = ' Usted ha creado un afiliado ... ';
$mensaje2 = ' El DNI que ha ingresado ya ha sido registrado !';
$fecha = date('Y-m-d H:i:s');
$usu_roll = '1';
$key = 'f6b07b6c1340e947b861def5f8b092d8ee710826dc56bd175bdc8f3a16b0b8acf853c64786a710dedf9d1524d61e32504e27d60de159af110bc3941490731578';

 if (!empty($_POST['datou']) && !empty($_POST['datod']) && !empty($_POST['datot']) && !empty($_POST['datoc'])) {
    $sql = "INSERT INTO tblusuarios (nombres, dni , correo , usu_usuario, usu_clave, usu_roll, id_patrocinador, fechas) VALUES (:usu_datou, :usu_datod, :usu_datot, :usu_datoc, '$key', $usu_roll, :id_uscre, '$fecha')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usu_datou', $_POST['datou']);
	$stmt->bindParam(':usu_datod', $_POST['datod']);
	$stmt->bindParam(':usu_datot', $_POST['datot']);
	$stmt->bindParam(':usu_datoc', $_POST['datoc']);
    $stmt->bindParam(':id_uscre', $_POST['id_uscre']);
    

    if ($stmt->execute()) {
		
 print "<script>alert('$mensaje')</script>";
 print("<script>window.location.replace('afiliados.php');</script>"); 
 
    } else {
		
 print "<script>alert('$mensaje2')</script>";
 print("<script>window.location.replace('afiliados.php');</script>"); 

    }
  }

?>
