<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="img/change.png" type="image/x-icon">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registro</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/style2.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>

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


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


date_default_timezone_set('America/Lima'); 
$usu_roll = '1';
$fechas = date('Y-m-d H:i:s');
	
  if (!empty($_POST['nombreusu']) && !empty($_POST['dniusu']) && !empty($_POST['correousu']) && !empty($_POST['usuariousu']) && !empty($_POST['contrausu'])) {
    $sql = "INSERT INTO tblusuarios (nombres, dni , correo , usu_usuario, usu_clave, usu_roll,id_patrocinador,fechas) VALUES (:usu_usua, :usu_dni, :usu_correo, :usu_usuario, :usu_clave,$usu_roll, :id,'$fechas')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usu_usua', $_POST['nombreusu']);
	$stmt->bindParam(':usu_dni', $_POST['dniusu']);
	$stmt->bindParam(':usu_correo', $_POST['correousu']);
	$stmt->bindParam(':usu_usuario', $_POST['usuariousu']);
    $password = hash('sha512',$_POST['contrausu']);
    $stmt->bindParam(':usu_clave', $password);
    $stmt->bindParam(':id', $_POST['id']);

    if ($stmt->execute()) {
      echo"<script>alert('¡ Su Usuario ha sido registrado . Bienvenido a la Comunidad de Ayuda mutua © MoneyWork!')</script>";
    } else {
      echo"<script>alert('¡ Ha ocurrido un error al crear el usuario !')</script>";
    }
  }

?>

<br>
<br>
  <br><br>
<div class="container" align="center">

    	<div class="row">
			<div class="table-responsive">
			
			<div class="input-group">
			
      <input type="text" class="form-control" placeholder="Ingresa su N° de DNI" id=indni>
      <span class="input-group-btn">
        <button class="btn btn-info" type="button" onclick="buscarDatos()">Buscar</button>
      </span>
	  
    </div>
	<br>
	
				<div class="table-responsive">
					<div class="panel-heading">
						<h3 class="panel-title"></h3>
					</div>
					<form accept-charset="UTF-8" action ="" method="POST">
					
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>	
            <th><center>Nombres</center></th>
            <th><center>DNI</center></th>
			<th><center>Correo</center></th>
            <th><center>Usuario</center></th>
			<th><center>Contrase&ntilde;a</center></th>
			<th><center>Opci&oacute;n</center></th>
							</tr>
						</thead>
						 
						
						
						<tbody>

						</tbody>
					</table>
					</form>
				</div>
				
				<div class="well5 center">
      <div class="container">
        <a href='#'><img src="img/moni.png" alt="Tempalte Monster" width="330"/></a>
      </div>
    </div>
			</div>

        </div>
		</div>

</body>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script>
function buscarDatos(){
	//Primero limpiamos por si hay registros
	$('#dev-table tbody').html('<center>(DNI) inválido © MoneyWork </center>');
	
		var dni = $('#indni').val();
		$.get( "scrap.php?dni="+dni, function( data ) {
			$('#dev-table tbody').html(
				'<tr>'+
				'<input name="id" type="hidden" value = "'+<?php echo $_GET["id"]; ?>+'" readonly>'+
				'<td><input name="nombreusu" type="text" value = "'+data[1][1]+'" readonly></td>'+
				'<td><input  name="dniusu" type="text" value = "'+data[0][1]+'" readonly></td>'+
				'<td><input  name="correousu"type="text"></td>'+
				'<td><input  name="usuariousu"type="text"></td>'+
				'<td><input  name="contrausu"type="password"></td>'+
				'<td><button type="submit" class="btn btn-info">REGISTRAR</button></td>'+
				'</tr>'
				);
		});
	}
</script>
</html>