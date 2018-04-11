<?php
			try{
				$conexion = new PDO('mysql:host=localhost;dbname=sishorario','root','');
			}catch(PDOException $e){
				echo "Error: ". $e->getMessage();
			}
			
			$consultaEst = $conexion -> prepare("
			SELECT count(*) as estados FROM notificaciones WHERE confirmado='true'");
			$consultaEst ->execute();
			$consultaEst = $consultaEst ->fetchAll();
?>
<?php foreach ($consultaEst as $Sql): ?>
	<?php echo "<i class='notification'>". $Sql['estados']. "</i>"; ?>									
<?php endforeach; ?>
										<strong>N ot i f i c a c i o n e s</strong>
									</a>
