<?php

include "autoload.php";
include "UsuarioData.php";

$rechazar = UsuarioData::getById($_POST["id"]);
$rechazar->updateEstado();
	 

 ?>