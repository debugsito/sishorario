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
  <h3 class="title"><i class="material-icons">grain</i> Voucher</h3>
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
					
<div class="alert alert-warning" role="alert">
<h4><center>"Estimado participante usted observará el voucher una vez que el otro participante haya subido la foto  .. ."</center></h4>
</div> 
			
						<div class="form-group is-empty" align="center">
							    <b>VOUCHER:</b><br><br><br><img src="voucher/<?php echo $foto->foto; ?>">
						        <span class="material-input"></span>
								</div>

						
								<hr><br>

								<input  name="id_ayuda" type="hidden" value="<?php echo $_GET['id_ayuda']; ?>" required="">
						

						<a class='btn btn-danger btn-sm' href='rechazar.php?id=<?php echo $_GET['id_usu']; ?>&id_ayuda=<?php echo $_GET['id']; ?>'><i class='material-icons'>delete_forever</i> Rechazar Foto</a>
 

						<a class='btn btn-success btn-sm' href="voucherup.php?id=<?php echo $_GET['id_ayuda']; ?>&id_ayuda=<?php echo $_GET['id_usu']; ?>"><i class='material-icons'>check_circle</i> Validar Foto</a>

				

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