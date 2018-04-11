<?php

include "autoload.php";
include "UsuarioData.php";
include "AyudaData.php";
include "BrindarAyudaData.php";
include "BancosData.php";
include "TblBancosData.php";


$ayuda = BrindarAyudaData::getById($_GET["id"]);
$ayuda->updateValidar();

$ayuda = AyudaData::getByIdAyda($_GET['id_ayuda']);
//1 aceptado
$validar->validar=1;
$validar->updateStatus();
header("Location: sistema.php");
 ?>