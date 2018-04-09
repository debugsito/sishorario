
<!------ Inicio de los datos de todos los usuarios ---------->
<?php
session_start();

if (isset($_SESSION['admin']) || isset($_SESSION['instructor'])) {


?>

		<!DOCTYPE html>
		<html>
		<head>

				
			<script src="js/jquery.min.js"></script>
			<!-- custom scripts --> 
			<!-- bootstrap -->
			<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
			<link  href="css/bootstrap.min.css" rel="stylesheet" >
			<!-- fullcalendar -->
			<link href="css/fullcalendar.css" rel="stylesheet" />
			<link href="css/fullcalendar.print.css" rel="stylesheet" media="print" />
			<script src="js/moment.min.js"></script>
			<script src="js/fullcalendar.js"></script>
			<link rel="stylesheet" href="css/alertify.core.css"/>
			<link rel="stylesheet" href="css/alertify.default.css"/>
			<script src="js/alertify.js"></script>
	

	
		</head>
		<body>

		<div class="container">

		 <div class="row FILA">
		<br>
		  
			<?php 

	$conexion=mysqli_connect('localhost','root','','sishorario');

 ?>						
		 		<br>
   
<div class="container">
    	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">PARTICIPANTES</h3>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Buscar Usuario" />
					</div>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>#</th>
								<th>NOMBRES</th>
								<th>DNI</th>
								<th>USUARIO</th>
							    <th>FECHA CREACIÓN</th>
							</tr>
						</thead>
						<tbody>
							<?php 
		$sql="SELECT * from tblusuarios";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['idUsuario'] ?></td>
			<td><?php ?></td>
			<td><?php ?></td>
			<td><?php echo $mostrar['usu_usuario'] ?></td>
			<td><?php ?></td>
		</tr>
	<?php 
	}
	 ?>
						</tbody>
					</table>
				</div>
			</div>


		   
	 	</div>
		
	
		</body>
		</html>


<?php		

}
else
{
	header("location:login.php");
}





