<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>

<?php
include "autoload.php";
include( dirname(__FILE__) .'/UsuarioData.php');
include "AyudaData.php";
include "BrindarAyudaData.php";
include "BancosData.php";
include "TblBancosData.php";
?>


<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<div class="card">
<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
  <h3 class="title"><i class="material-icons">grain</i> Voucher </h3><a class="btn btn-warning" href="sistema.php" align="right"><i class="fa fa-mail-reply-all" aria-hidden="true"></i></a>
</div>
<div class="card-content table-responsive">

<div class="card-content table-responsive">
 
<?php $beneficiario = UsuarioData::getById($_GET['id']); ?>

<?php $foto = BrindarAyudaData::getById($_GET['id_ayuda']); ?>
 
<?php $banco = TblBancosData::getByIdUser($beneficiario->idUsuario); ?>

<?php if(count($banco)>0){ 
	$n_cuenta= $banco->n_cuenta; 
	$entidad= $banco->getEntidad()->entidad;
}else{ 

$n_cuenta= ""; 
$entidad="";

}
?>
 <form accept-charset="UTF-8" role="form" action="upfoto.php" enctype="multipart/form-data" method="POST" name="datos">
					<fieldset>
					
<div class="alert alert-success" role="alert">
<h4><center>"Estimado participante verifique la información mostrada , ante cualquier anomalía no dude en consultar a soporte . . ."</center></h4>
</div> 
				
             <div class="form-group is-empty">
							   
						        <div class="form-group is-empty" align="center">
							    <b>VOUCHER  SUBIDO:</b><br><br><br><img src="voucher/<?php echo $foto->foto; ?>">
								
								<br><br><br>
								</div>
								
								<hr><br>

								<input  name="id_ayuda" type="hidden" value="<?php echo $_GET['id_ayuda']; ?>" required="">
						


				

					</fieldset>
				</form>
 
 
</div>
</div>



</div>  
<?php
include 'views/logic/footer.php';
?>


</div>
</html>