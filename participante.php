
<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>
	<?php 		
		if(!isset($_SESSION['admin']) && !isset($_SESSION['instructor']))
		{
			header("location: login.php");
		}
	?>

<style> 
.nover{
	display:none;
}
</style>
<div class="card ver">

	<?php  if(isset($_SESSION['admin'])): ?>

	<div class="card-header" data-background-color="green-dark">
		 <h3 class="title">Bienvenido Administrador</h3>
	    <p class="category">Monitoreo de la plataforma MoneyWork</p>
	</div>
	<div class="card-content" style="display:block">

		<div class="iframe-container">
			<iframe src="fullcalendar/demos/index.php" style="width:100%; height:1000px">lol </iframe>			
		</div>
	</div>
</div>
	<?php  endif; ?>


<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">

	<h3 class="title">Bienvenido Administrador</h3>
	    <p class="category">Monitoreo de la plataforma MoneyWork</p>
                        </div>
                        <div class="card-content">
							<div class="iframe-container">
									<iframe src='fullcalendar/demos/index.php' style="width:100%; height:1000px"></iframe>
								
							</div>
                    	</div>
                	</div>
<?php  endif; ?>
	                          
<?php
include 'views/logic/footer.php';
?>


	