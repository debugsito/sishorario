<?php 

$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'sishorario';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}


$fecha = date("Y-m-d");

 if (!empty($_POST['cuenta']) && !empty($_POST['entidad']) ) {
    $sql = "INSERT INTO tblbanco (n_cuenta,id_entidad,id_userba,fecha_bn) VALUES (:usu_cuenta,:usu_entidad,:id_usb,'$fecha')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usu_cuenta', $_POST['cuenta']);
	$stmt->bindParam(':usu_entidad', $_POST['entidad']);
    $stmt->bindParam(':id_usb', $_POST['id_usb']);
    

    if ($stmt->execute()) {
		
header('Location: config.php');

    } else {
      echo"<script>alert('  Ha ocurrido un error al guardar datos !')</script>";
    }
  }

?>
