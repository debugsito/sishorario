<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>

<html lang="es">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<script type="text/javascript" src="js/sede.js"></script> 
</head>
<div class="card">
<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
  <h3 class="title"><i class="material-icons">grain</i> Bonos por Afiliados &nbsp;&nbsp;<a href="bonos.php?estado=0" class="btn btn-info" style="border-radius: 100px;"><b>En proceso</b></a>&nbsp;<a href="bonos.php?estado=1" class="btn btn-default" style="border-radius: 100px; background-color: #FF3333"><b>Rechazado</b></a>
  <a href="bonos.php?estado=2" class="btn btn-default" style="border-radius: 100px; background-color: #FFC300"><b>Asignado</b></a>&nbsp;<a href="bonos.php?estado=3" class="btn btn-default" style="border-radius: 100px; background-color: #A1DB11"><b>Confirmado</b></a>
  <!--<a href="bonos.php?estado=4" class="btn btn-default" style="border-radius: 100px; background-color: #12150A"><b>Bloqueados</b></a></h3>-->
</div>
<div class="card-content table-responsive">

<div class="alert alert-warning" role="alert">
<h5><i class="fa fa-bullseye" aria-hidden="true"> "Estimado participante los BONOS POR AFILIADOS va depender del rango que se encuentre." </i></h5>

<h5><i class="fa fa-bullseye" aria-hidden="true"> "Si su afiliado no deposita el monto ,  automáticamente el sistema descontará su bono ortorgado por su afiliado hasta que el proceda con el depósito y sea un partipante justo." </i></h5>

<h5><i class="fa fa-bullseye" aria-hidden="true"> "Es indispensable que usted como líder también realice las donaciones , si usted no realiza donaciones se procederá a retener sus bonos otorgados por sus afiliados." </i></h5>
</div> 

<center><div class="card-content table-responsive">
  <?php
  include 'funciones/php/TablaSede.php';
  ?>
</div></center>
</div>



</div>  
<?php
include 'views/logic/footer.php';
?>


</div>
</html>