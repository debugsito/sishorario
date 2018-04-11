<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<div class="col-md-12">
    <div class="card">
	<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
            <h4 class="title">Editar Perfil</h4>
            <p class="category"> Verificar sus datos para evitar cualquier tipo de inconveniente en el Dep&oacutesito ... </p>
        </div>
		
		
        <div class="card-content table-responsive">
        <div class="row">
		

<?php

date_default_timezone_set('America/Lima');

$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'sishorario';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
   die('Connection Failed: ' . $e->getMessage());
}


////////////////////////////////////////////////////////////////////////////////////////

?>




<?php
	if (isset($_SESSION['admin']))
	{
	$idd= $_SESSION['id'];

	}
	
?>


<?php 

$conexion=mysqli_connect('localhost','root','root','sishorario');

		$sql="SELECT * from tblusuarios where idUsuario=$idd ";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		

		$id=$mostrar["idUsuario"];
    	$nombres=$mostrar["nombres"];
    	$dni=$mostrar["dni"];
    	$correo=$mostrar["correo"];
    	$celular=$mostrar["celular"];
    	$link=$mostrar["link"];
		$usu_usuario=$mostrar["usu_usuario"];
    	$id_patrocinador=$mostrar["id_patrocinador"];
	
	};

	$sql="SELECT * from tblusuarios where idUsuario=$id_patrocinador ";
		$result=mysqli_query($conexion,$sql);

		while($mostrar1=mysqli_fetch_array($result)){
		

		$id_patrocinador1=$mostrar1["idUsuario"];
    	$nombres_patrocinador=$mostrar1["nombres"];
    	$dni_patrocinador=$mostrar1["dni"];
    	$correo_patrocinador=$mostrar1["correo"];
    	$celular_patrocinador=$mostrar1["celular"];
    
	
	};
	
		$sql="SELECT * from tblbanco where id_userba=$idd ";
		$result=mysqli_query($conexion,$sql);

		while($mostrar2=mysqli_fetch_array($result)){
		

		$id_banco=$mostrar2["id"];
    	$cuenta=$mostrar2["n_cuenta"];
    	$entidad=$mostrar2["id_entidad"];
    	
	
	};
	

	 ?>





<div class="table-responsive"> 
<section id="fancyTabWidget" class="tabs t-tabs">
        <ul class="nav nav-tabs fancyTabs" role="tablist">
        
                    <li class="tab fancyTab active">
                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>	
                        <a id="tab0" href="#tabBody0" role="tab" aria-controls="tabBody0" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-address-book-o"></span><span class="hidden-xs"> Perfil</span></a>
                    	<div class="whiteBlock"></div>
                    </li>
                    
                    <li class="tab fancyTab">
                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <a id="tab1" href="#tabBody1" role="tab" aria-controls="tabBody1" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-institution"></span><span class="hidden-xs"> Cuenta Bancaria</span></a>
                        <div class="whiteBlock"></div>
                    </li>
                    
                    <li class="tab fancyTab">
                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <a id="tab2" href="#tabBody2" role="tab" aria-controls="tabBody2" aria-selected="true" data-toggle="tab" tabindex="0"><span class="	fa fa-group"></span><span class="hidden-xs"> User</span></a>
                        <div class="whiteBlock"></div>
                    </li>
 
                 
        </ul>
        <div id="myTabContent" class="tab-content fancyTabContent" aria-live="polite">
		

		
               <div class="tab-pane  fade active in" id="tabBody0" role="tabpanel" aria-labelledby="tab0" aria-hidden="false" tabindex="0">
                        <div>
                        	<div class="row">
                            	
                                <div class="col-md-12">
                        			<h4><center><b>DATOS USUARIO</b></center></h4>
                                    <p></p>
									
									<div class="card-content table-responsive">
								
				<form accept-charset="UTF-8" role="form" action="updateuser.php" method="POST" name="datos">
					<fieldset>
					
				
						<div class="form-group is-empty">
							    <b>Patrocinador :</b><input disabled='' class="form-control" name="patrocinador" value="<?php echo $nombres_patrocinador; ?>" type="text">
						        <span class="material-input"></span>
								</div>
								
								<div class="form-group is-empty">
							    <b>Celular Patrocinador :</b><input  disabled='' class="form-control" name="celpatro" value="<?php echo $celular_patrocinador; ?>" type="text">
						        <span class="material-input"></span>
								</div>
								
								<div class="form-group is-empty">
							    <b>Nombre del Usuario :</b><input disabled='' class="form-control"  name="usuar" value="<?php echo $nombres; ?>"  type="text">
						        <span class="material-input"></span>
								</div>
								
								<div class="form-group is-empty">
							    <b>Documento de Identidad :</b><input disabled='' class="form-control" name="dni" value="<?php echo $dni; ?>" type="text">
						        <span class="material-input"></span>
								</div>
								
								<div class="form-group is-empty">
							    <b>Celular Usuario :</b><input class="form-control" name="celular" type="text" value="<?php echo $celular; ?>" required="">
						        <span class="material-input"></span>
								</div>
								
								<div class="form-group is-empty">
							    <b>Correo Electrónico :</b><input class="form-control" name="correo" type="text" value="<?php echo $correo; ?>" required="">
						        <span class="material-input"></span>
								</div>
								
								<div class="form-group is-empty">
							    <b>Link Referido :</b><input disabled='' class="form-control" name="referido" value="http://localhost:8080/SIGHO30/afiliado/?id=<?php echo $id; ?>" type="text" required="">
						        <span class="material-input"></span>
								</div>


								<input  name="id_usuario" type="hidden" value="<?php echo $id; ?>" required="">
						
						<input class="btn btn-info btn-block" type="submit" value="GUARDAR"> 

					</fieldset>
				  </form>
				  
			       </div>
						</div>        
                        </div>
                        </div>
                    </div>
					
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->					
					

<?php 

$sql="SELECT tblbanco.n_cuenta, bancos.entidad, tblbanco.id_entidad from tblbanco inner join bancos on tblbanco.id_entidad = bancos.id_banco inner join tblusuarios on tblusuarios.idUsuario=tblbanco.id_userba WHERE tblbanco.id_userba=$idd ";
		$result=mysqli_query($conexion,$sql);
$contador=0;
if(count($result)){


		while($cuenta=mysqli_fetch_array($result)){
		

		$n_cuenta1=$cuenta["n_cuenta"];
		$id_banco1=$cuenta["id_entidad"];
	
    	
 $contador=1;   
	
	};
}else{

$contador=0;
}
 ?>

        <div class="tab-pane  fade" id="tabBody1" role="tabpanel" aria-labelledby="tab1" aria-hidden="true" tabindex="0">
                        <div class="row">
                            	
                                <div class="col-md-12">
                        			<h4><center><b>CUENTA BANCARIA</b></center></h4>
                                    <p></p>
                                   
								   <div class="card-content table-responsive">
								   
				<form accept-charset="UTF-8" role="form" method="POST" action="insertbanco.php" name="cuentas">
					<fieldset>
					
						
						<div class="form-group is-empty">
							<input  class="form-control" <?php if($contador!=0){ echo  "disabled"; } ?>   placeholder="Número de Cuenta Bancaria" name="cuenta" type="text"  value="<?php if($contador!=0){ echo  $n_cuenta1; }  ?>"  required="" >
						
						<span class="material-input"></span></div>

						
						<div class="form-group is-empty">

<style type="text/css">
select {
     background: transparent;
     border: none;
     font-size: 14px;
     height: 30px;
     padding: 5px;
     width: 250px;
  }
  

  option {font-family: verdana; font-size: 10px; color: black}

</style>


<select type="select" name="entidad" <?php if($contador!=0){ echo  "disabled"; } ?>  class="form-control" id="entidad" required>
 						   <OPTION value="">Entidad Financiera</OPTION>
							<?php
								$con = new Mysqli("localhost", "root", "root", "sishorario");
								$sql="SELECT * FROM bancos ORDER BY id_banco";
								$proceso = mysqli_query($con, $sql);

								while ($depto =mysqli_fetch_object($proceso)) {
									?>
									<option value="<?php echo $depto->id_banco; ?>"  <?php if($contador!=0){ if($depto->id_banco==$id_banco1){ echo "selected"; }} ?> > <?php echo $depto->entidad; ?> </option>
								<?php
								}
							?>

</select>


						<div>

						
						 <input name="id_usb" type="hidden" value="<?php echo $idd; ?>" placeholder=" "> 
						
						
						<input class="btn btn-info btn-block" type="submit" value="GUARDAR">
						
					</fieldset>
				  </form>
				  
				  
			</div>
								   
								   
                                </div>
                            </div>
                    </div>
					
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->					
					
					
					
                    <div class="tab-pane  fade" id="tabBody2" role="tabpanel" aria-labelledby="tab2" aria-hidden="true" tabindex="0">
                        <div class="row">
                                <div class="col-md-12">
                        			<h4><center><b>CAMBIAR CONTRASE&Ntilde;A</b></center></h4>
                                    <p></p>
                                  
				<div class="card-content table-responsive">
				<form accept-charset="UTF-8" role="form" method="POST" action="upuser.php" name="cambio">
					<fieldset>
					
						<div class="form-group is-empty">
							<b>Usuario :</b><input class="form-control" disabled="" name="user" value="<?php echo $usu_usuario; ?>"  type="text" required="">
						<span class="material-input"></span></div>
						
						<div class="form-group is-empty">
							<input class="form-control" placeholder="Nuevo Password" name="contra" type="password" value="" required="">
						<span class="material-input"></span></div>
						
						<div class="form-group is-empty">
							<input class="form-control" placeholder="Confirmar Password" name="newcontra" type="password" value="" required="">
						<span class="material-input"></span></div>
						
						 <input name="id_ucontra" type="hidden" value="<?php echo $idd; ?>" placeholder=" "> 
						
						<input class="btn btn-info btn-block" type="submit" value="GUARDAR">
						
					</fieldset>
				  </form>
			</div>
								  
                                </div>
                            </div>
                    </div> 
                
				
				
				
				
				
				
				
        </div>

    </section>
</div>	
		</div>
        </div>
    </div>
</div>
</body>
</html> 