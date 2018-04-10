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
  <h3 class="title"><i class="material-icons">grain</i>Subir Voucher</h3>
</div>
<div class="card-content table-responsive">

<div class="card-content table-responsive">
 
<?php $beneficiario = UsuarioData::getById($_GET['id']);

$banco = TblBancosData::getByIdUser($beneficiario->idUsuario); ?>

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
<h4>"Estimado participante recuerde Guardar su voucher con el nombre de su DNI para usarlo como identificador de la persona que envía el pago."</h4>
</div> 
				
						<div class="form-group is-empty">
							    <b>Nombres del Beneficiario:</b><input  class="form-control" name="datouno" value="<?php echo $beneficiario->nombres; ?>" type="text" disabled=''>
						        <span class="material-input"></span>
								</div>
								
								<div class="form-group is-empty">
							    <b>N&uacutemero de Cuenta del Beneficiario:</b><input   class="form-control" name="datouno" value="<?php echo $n_cuenta; ?>" type="text" disabled=''>
						        <span class="material-input"></span>
								</div>

								<div class="form-group is-empty">
							    <b>Entidad Financiera del Beneficiario:</b><input   class="form-control" name="datouno" value="<?php echo $entidad; ?>" type="text" disabled=''>
						        <span class="material-input"></span>
								</div>
						
 
						        <div class="form-group is-empty">
							    <b>Celular del Beneficiario:</b><input   class="form-control" name="datouno" value="<?php echo $beneficiario->celular; ?>" type="text" disabled=''>
						        <span class="material-input"></span>
								</div>

                                <div>
							    <b>Subir Voucher:</b><input id="imagen" name="imagen" type="file" />
						        <span class="material-input"></span>
								</div>
								<hr><br>

								<input  name="id_ayuda" type="hidden" value="<?php echo $_GET['id_ayuda']; ?>" required="">
						
						<input class="btn btn-info btn-block" type="submit" value="GUARDAR"> 

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