<?php

include "autoload.php";
include "UsuarioData.php";
include "AyudaData.php";
include "BrindarAyudaData.php";
include "BancosData.php";
include "TblBancosData.php";


$rechazar = UsuarioData::getById($_GET["id"]);

$rechazar->updateEstado();

//$ayuda = AyudaData::getByIdAyda($_GET['id_ayuda']);
$ayuda = AyudaData::getByIdAyda($_GET['id_ayuda']);
//2 rechazado
$ayuda->validar=2;
$ayuda->updateStatus();
	
header("Location: sistema.php");
 ?>