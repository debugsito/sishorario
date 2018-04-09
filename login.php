<?php
session_start();
?>
<?php
if (isset($_SESSION['admin']) ) {
	header('Location: index.php');
}else
{
	if (isset($_SESSION['instructor']) ) {
		header('Location: index.php');
	}else{
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
			$password = $_POST['password'];
			$password = hash('sha512', $password);
			$roll;
			$errores ='';	
		
			try{
					$conexion = new PDO('mysql:host=localhost;dbname=sishorario','root','root');
				}catch(PDOException $e){
					echo "Error: ". $e->getMessage();
				}
			
			
			$statement = $conexion -> prepare(
						"SELECT usu_roll as roll, usu_usuario as usuario, idUsuario as dni_usuario, estado as usu_estado FROM tblusuarios  WHERE tblusuarios.usu_usuario = :usuario AND tblusuarios.usu_clave = :password ");
				
				
		
			$statement ->execute(array(':usuario'=> $usuario,':password'=> $password));
		
			while( $resultado = $statement->fetch())
				if($resultado !==false){
						if($resultado[0]== '1'){
							$_SESSION['admin'] = $resultado[1];	
							$_SESSION['id'] = $resultado[2];
							$_SESSION['estado'] = $resultado[3];				
							header('Location: sistema.php');
						}else{
							if($resultado[0]== '2'){
								$_SESSION['instructor'] = $resultado[1];

								header('Location: participante.php');
							}
						}
				  
					}else{
						$errores .= 'Datos incorrectos y/o inválidos!';
					}
			         ?>
						<script type="text/javascript">alert("El usuario ingresado o contraseña es incorrecto ...");</script>
					<?php
				}
		}
		
		require	'views/form/login.php';
		
    }	

?>
