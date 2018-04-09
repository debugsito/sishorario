  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="ass/img/change.png">
    <link rel="icon" type="image/png" href="ass/img/change.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>MoneyWork</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="ass/css/bootstrap.min5.css" rel="stylesheet" />
    <link href="ass/css/now-ui-kit5.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="ass/css/demo5.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="dropdown button-dropdown">
                <a href="#moneywork" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-header">MoneyWork</a>
                    <a class="dropdown-item" href="index.html">Inicio</a>
                    <a class="dropdown-item" href="login.php">Login</a>
                    
                </div>
            </div>
            <div class="navbar-translate">
                <a class="navbar-brand" href="" rel="tooltip" title="Designed by MoneyWork" data-placement="bottom" target="_blank">
                    Índice
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="ass/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
					
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Síguenos en YouTube" data-placement="bottom" href="https://www.youtube.com/channel/UCgR4XFORjGViQTQXNdS2Sew/featured" target="_blank">
                            <i class="fa fa-youtube"></i>
                            <p class="d-lg-none d-xl-none">YouTube</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Síguenos en Facebook" data-placement="bottom" href="https://www.facebook.com/Money-work-1960884790840633/" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Síguenos en Instagram" data-placement="bottom" href="https://www.instagram.com/p/BfzXfbqBx7B/" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(ass/img/login.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
				
                    <form accept-charset="UTF-8" role="form" class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name="login">
					
                        <div class="header header-primary text-center">
                            <div class="logo-container">
                                <img src="ass/img/dd.png" alt="">
                            </div>
                        </div>
						
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
								
								<input class="form-control" placeholder="Usuario" name="usuario" type="text" required="">
                           
                            </div>
							
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
								
								<input class="form-control" placeholder="Contraseña" name="password" type="password" value="" required="">
								
                            </div>
                        </div>
						
					<!--<div class="g-recaptcha" data-sitekey="6LdHK00UAAAAAEaQYvau0W1W5_Si1CujKP-ogJPz" align="center"></div>-->
					
                        <div class="footer text-center">
						
						<input class="btn btn-primary btn-round btn-lg btn-block" type="submit" value="Iniciar Sesión" >

                        </div>
                        
                    </form>
					
                </div>
            </div>
			
	<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
		
        </div>
        <footer class="footer">
            <div class="container">
         
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed by
                    <a href="https://www.facebook.com/Money-work-1960884790840633/" target="_blank">MoneyWork</a>.
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="ass/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="ass/js/core/popper.min.js" type="text/javascript"></script>
<script src="ass/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="ass/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="ass/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="ass/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="ass/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>
