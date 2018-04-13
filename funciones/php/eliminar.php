<?php

session_start();

	$conexion = new mysqli("localhost", "root", "", "sishorario");
 


	if(isset($_GET['id']))
	{
	   $id = $_GET['id'];
	   $sql = "DELETE FROM tblayuda WHERE id=$id";
	   mysqli_query($conexion, $sql);
	   header("location: ../../sistema.php");
	}
	

?>