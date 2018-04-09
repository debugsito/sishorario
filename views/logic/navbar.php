
	<nav class="navbar navbar-transparent navbar-absolute">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						
								</button>
						</div>
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
					
								<li class="d-flex flex-row">
									<a href="sistema.php" class="simple-text" title="Inicio">
									   <i class="material-icons"><font color="#C0CA33">dashboard</font></i>
										<strong><font color="#FDD835"><b>I N I C I O</b></font></strong>
									</a>
								</li>
								<?php
								if(isset($_SESSION['admin']))
								{

								?>

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="material-icons"><font color="#C0CA33">add_alarm</font></i>
										
										<font color="#FDD835">
									
											<?php
											include 'views/logic/mostrarNotificaciones.php';
											?>
								

										<ul class="dropdown-menu HOLAA">
											
											<?php
											include 'views/logic/mostrarContenidoNotificaciones.php';
											?>
											
									   </font>
										</ul>
								</li>

								<?php
								}
								?>

								
								<li class="dropdown">
									<a href="" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons"><font color="#C0CA33">camera_front</font></i>
										<strong>
                                       <font color="#FDD835">
										<?php
										if (isset($_SESSION['admin']))
										{
												echo $_SESSION['admin'];

										}
										if (isset($_SESSION['instructor']))
										{
												echo $_SESSION['instructor'];
												echo "<input type='hidden' id='sesionInstructor'  value='".$_SESSION['instructor']."'>";
										}
										?></font>
										</strong>
										
									
									</a>
	                                    <ul class="dropdown-menu">
										<li><a href="config.php">Configuración</a></li>
										<li><a href="salir.php">Salir</a></li>
									</ul>

									
								</li>
								
				
								
							</ul>
						</div>
					</div>
				</nav>

	        <div class="content">
	            <div class="container-fluid">

	<script src="js/jquery.js"></script>
<script type="text/javascript"> 

$(document).ready(function(){

function MostrarNoti(){

	$.ajax({
						    type: "POST",
						    url: 'views/logic/mostrarNotificaciones.php',
						    data: 'vieww=u',
						    success: function()
						      {      
						      
						  			  $(".HOLA").load("views/logic/mostrarNotificaciones.php");
						  			  $(".HOLAA").load("views/logic/mostrarContenidoNotificaciones.php");

						     //nos manda a la fecha por defecto declarada en la linea anterior   						
						               
						       }
			    		 });
}

 $.ajax({
						    type: "POST",
						    url: 'views/logic/mostrarNotificaciones.php',
						    data: 'vieww=kkk',
						    success: function()
						      {      
						      
						  			  $(".HOLA").load('views/logic/mostrarNotificaciones.php');
						  			   $(".HOLAA").load("views/logic/mostrarContenidoNotificaciones.php");
						     //nos manda a la fecha por defecto declarada en la linea anterior

    							setInterval(MostrarNoti, 15000);
						               
						       }
			    		 });

});
</script>
	<script src="js/jquery.js"></script>