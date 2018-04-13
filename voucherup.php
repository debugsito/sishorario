<?php

include "autoload.php";
include "UsuarioData.php";
include "AyudaData.php";
include "BrindarAyudaData.php";
include "BancosData.php";
include "TblBancosData.php";


$ayuda = BrindarAyudaData::getById($_GET["id"]);
$ayuda->updateValidar();


header("Location: sistema.php");
 ?>