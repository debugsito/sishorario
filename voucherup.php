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

$validar = AyudaData::getById($ayuda->id);
$validar->status=3;
$validar->updateStatus();
header("Location: sistema.php");
 ?>