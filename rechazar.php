<?php

include "autoload.php";
include "UsuarioData.php";
include "AyudaData.php";
include "BrindarAyudaData.php";
include "BancosData.php";
include "TblBancosData.php";


$rechazar = UsuarioData::getById($_GET["id"]);
$rechazar->updateEstado();

$ayuda = AyudaData::getByIdAyda($_GET['id']);

$validar = AyudaData::getById($ayuda->id);
$validar->status=1;
$validar->updateStatus();
	
header("Location: sistema.php");
 ?>