
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/cha.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>MoneyWork</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
 	<link rel="stylesheet" href="css/alertify.core.css"/>
	<link rel="stylesheet" href="css/alertify.default.css"/>
	<script src="js/alertify.js"></script>
	<script src="js/jquery.js"></script>

	
</head>

<body>

	<div class="wrapper">
<?php session_start();

if (isset($_SESSION['admin']) ) {
	echo '<div class="sidebar" data-color="green-dark" data-image="assets/img/paris.jpg">';
} 
if (isset($_SESSION['instructor']) ) {
		echo '<div class="sidebar" data-color="orange"  data-image="assets/img/sidebar-1.jpg">';
}

?>

			<div class="logo">
				<a href="index.php" class="simple-text">
                <img alt="MoneyWork" src="assets/img/quesl.png" width="120px">
				<!--<center><b><a><font size="2" color="#black">soporte@moneyworkglobal.net</font></a></b></center>-->
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	            	<?php  if(isset($_SESSION['admin'])): ?>
							<li id="tacks">
								<a href="sistema.php">
									<i class="fa fa-database" aria-hidden="true"></i> 
									<p><b>S i s t e m a</b></p>
								</a>
							</li>
							<li id="center">
								<a href="afiliados.php" >
									<i class="fa fa-users" aria-hidden="true"></i>
									<p><b>A f i l i a d o s</b></p>
								</a>
							</li>
							
							<li id="sede">
								<a href="bonos.php">
									
									<i class="fa fa-cc-visa"></i>
									<p><b>B o n o s </b></p>
								</a>
							</li>
						    <li id="home">
								<a href="index.php">
									<i class="fa fa-twitch" aria-hidden="true"></i>
									<p><b>R e d e s - S o c i a l e s</b></p>
								</a>
							</li>
							
							<li id="ambient">
								<a href="comunicado.php">
								<i class="fa fa-whatsapp" aria-hidden="true"></i>
									<p><b>C o m u n i c a d o</b></p> 
								</a>
							</li>	

						<?php  endif; ?>
						  	<?php  if(isset($_SESSION['instructor'])): ?>
						  		<li id="calendar" class="active">
								<a href="participante.php">
									<i class="fa fa-address-book-o" aria-hidden="true"></i>
									<p>Usuarios</p>
								</a>
							</li>
									<?php  endif; ?>
									
						
	            </ul>
	    	</div>
		</div>

	    <div class="main-panel">
		
		</body>