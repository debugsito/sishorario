<?php

include "autoload.php";
include "BrindarAyudaData.php";

$validar = BrindarAyudaData::getById($_POST['id_ayuda']);
$validar->updateValidar();
	

 ?>
 