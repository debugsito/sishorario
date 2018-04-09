
	<?php
	try{
			$conexion = new PDO('mysql:host=localhost;dbname=sishorario','root','root');
			}catch(PDOException $e){
				echo "Error: ". $e->getMessage();
			}
			$consulta = $conexion -> prepare("
			SELECT * FROM notificaciones WHERE confirmado='true' order by id");
			$consulta ->execute();
			$consulta = $consulta ->fetchAll();
	?>

<?php foreach ($consulta as $Sql): ?>
	<?php echo "<li><a> &raquo;  <strong >". $Sql['instructor']."</strong></a></li>"; ?>									
	<?php endforeach; ?>
	
