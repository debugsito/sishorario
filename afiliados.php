<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>
<script type="text/javascript" src="js/centro.js"></script>	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<div class="card">
<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
	<h3 class="title"><i class="fa fa-user-plus" aria-hidden="true"></i> Afiliados
	

<?php
	if (isset($_SESSION['admin']))
	{
	$idd= $_SESSION['id'];

	}
	
?>

	<h3 class="title"><a href="#" class="btn btn-success" style="border-radius: 100px;" data-toggle="modal" data-target="#Modalen">Mostrar enlace de afiliado</a> <a href="#" class="btn btn-danger" style="border-radius: 100px;" data-toggle="modal" data-target="#Modalnus"><b>Registrar Afiliado</b></a>  <a href="#" class="btn btn-warning" style="border-radius: 100px;" data-toggle="modal" data-target="#ModalRangos"><b>RANGO </b></a></h3></h3>
	
</div>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="card-content table-responsive">
<!---<div class="alert alert-warning" role="alert">
<h5><center><i class="fa fa-bullhorn" aria-hidden="true"> Gracias a Usted estamos creciendo en todo el PAÍS, ayúdanos a llevar nuestro mensaje a más personas y gana por cada persona REFERIDA . </i><center></h5>

</div> ----->

	<div>
	<div style="overflow-y:scroll;">
		<?php
		include	'funciones/php/tablafiliado.php';
		?>
	</div>

	</div> 
</div>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

</div>	
<?php
include 'views/logic/footer.php';
?>



<?php 

$conexion=mysqli_connect('localhost','root','','sishorario');

		$sql="SELECT * from tblusuarios where idUsuario=$idd ";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		

		$id=$mostrar["idUsuario"];
	
	};
?>


<div class="modal fade" id="Modalen" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
		<h3><button type="button" class="close" data-dismiss="modal">↺</button></h3>
		<h4 class="modal-title"><i class="fa fa-money" aria-hidden="true"></i> MoneyWork | Link de Afiliación</h4><hr />
		  <div class="card-content">
				
<div class="form-group ">
<input disabled="" class="form-control" name="referido" value="http://localhost:8080/SIGHO200/afiliado/?id=<?php echo $id; ?>" type="text" required="">
<span class="material-input"></span>
</div>
				</div>
				

		 </div>
		</div>
	</div>
  </div>
  
  
  
<div class="modal fade" id="Modalnus" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
		<h3><button type="button" class="close" data-dismiss="modal">↺</button></h3>
		<h4 class="modal-title"><i class="fa fa-money" aria-hidden="true"></i> MoneyWork | Registrar afiliado </h4><hr />
		  <div class="card-content">
		  
		  
<div class="alert alert-danger" role="alert">

<h5><i class="fa fa-caret-square-o-right" aria-hidden="true"> Estimado participante si usted no logra crear el usuario por el link de afiliación puede usar este medio ... </i></h5>
<h5><i class="fa fa-caret-square-o-right" aria-hidden="true"> La clave creada es por default (456) , usted como patrocinador tiene el deber de informar a su afiliado el cambio de su contraseña una vez creado el usuario ... </i></h5>
<h5><i class="fa fa-caret-square-o-right" aria-hidden="true"> La contraseña puede ser modificada en la parte lateral izquierda al dar clic en la opción configuración y luego en la opción user ... </i></h5>
</div> 

<div class="form-group ">
    <div class="tab-pane  fade active in" role="tabpanel" aria-labelledby="tab0" aria-hidden="false" tabindex="0">
<script>	
	function mayus(e) {
    e.value = e.value.toUpperCase();
}
</script>
                        <div>
                        	<div class="row">
                            	
                                <div class="col-md-12">
                        			
					<div class="card-content table-responsive">
								
				<form accept-charset="UTF-8" role="form" action="insertud.php" method="POST" name="datos">
					<fieldset>
						
								<div class="form-group is-empty">
								<input class="form-control"  name="datou" type="text" placeholder="Nombres completos del participante :" onkeyup="mayus(this);" required="">
						        <span class="material-input"></span>
								</div>
								
								<div class="form-group is-empty"> 
								<input class="form-control" name="datod" type="text" placeholder="Documento de Identidad (DNI) :" required="">
						        <span class="material-input"></span>
								</div>
								
								<div class="form-group is-empty">
								<input class="form-control" name="datot" type="text"  placeholder="Correo Electrónico :" required="">
						        <span class="material-input"></span>
								</div>
								
	                            <div class="form-group is-empty">
								<input class="form-control" name="datoc" type="text" placeholder="Usuario :" required="">
						        <span class="material-input"></span>
								</div>
								
								 <input name="id_uscre" type="hidden" value="<?php echo $idd; ?>"> 
								
						<input class="btn btn-danger btn-block" type="submit" value="GUARDAR"> 

					</fieldset>
				  </form>
				  
			       </div>
						</div>        
                        </div>
                        </div>
                    </div>
</div>


				</div>
				

		 </div>
		</div>
	</div>
 </div>
  
<!------------------------------------------------------------------------------------------------------------------------------------------------------------->  
  
  
  
  <div class="modal fade" id="ModalRangos" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
		<h3><button type="button" class="close" data-dismiss="modal">↺</button></h3>
		<h4 class="modal-title"><i class="fa fa-money" aria-hidden="true"></i> MoneyWork | Rango de Afiliaciones </h4><hr/>
		  <div class="card-content">
				
<div class="form-group " align="center">

<div class="alert alert-warning" role="alert">

<i class="fa fa-balance-scale" aria-hidden="true"> " RECUERDE QUE SUS BONOS A RECIBIR VA DEPENDER DEL NIVEL QUE SE ENCUENTRE " </i>

</div> 

<div>
		<?php
		include	'funciones/php/TablaRangos.php';
		?>
	</div>
</div>
				</div>
				

		 </div>
		</div>
	</div>
  </div>
  
  
  
</div>
