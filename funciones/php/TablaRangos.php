<!DOCTYPE html>

<html class="no-js">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	</head>
	
	<body>
	
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 90%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>


<?php
if (isset($_SESSION['admin']))
{
$idd= $_SESSION['id'];

}
	 
?>

<?php 

$conexion=mysqli_connect('localhost','root','root','sishorario');
$contador=0;
		$sql="SELECT * from tblusuarios where id_patrocinador=$idd ";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		

		$contador=1+$contador;
	

	}
?>	 


<table class='table' id="customers">
			<tr>
				<th>#</th><th><center>NIVEL</center></th><th><center>AFILIADO</center></th><th><center>RANGO</center></th>
			</tr>			
				
					<tr <?php if($contador<10){ ?>	style="background-color: yellow;" <?php };  ?>	>
					<td>1</td>
					<td><center><i class="fa fa-male" aria-hidden="true"></i></center></td>
					<td><center>Sin requisitos</center></td>
					<td><center>PARTICIPANTE</center></td>
				
					
                    <tr <?php if($contador>=10 and $contador<20){ ?>	style="background-color: yellow;" <?php };  ?>>
					<td>2</td>
					<td><center><i class="fa fa-group" aria-hidden="true"></i></center></td>
					<td><center>10 afiliados directos<center></td>
					<td><center>SILVER</center></td>
				

                    <tr <?php if($contador>=20 and $contador<30){ ?>	style="background-color: yellow;" <?php };  ?>>
					<td>3</td>
					<td><center><i class="fa fa-sitemap" aria-hidden="true"></i></center></td>
					<td><center>20 afiliados directos</center></td>
					<td><center>GOLD</center></td>
					

                    <tr <?php if($contador>=30 and $contador<40){ ?>	style="background-color: yellow;" <?php };  ?>>
					<td>4</td>
					<td><center><i class="fa fa-diamond" aria-hidden="true"></i></center></td>
					<td><center>30 afiliados directos</center></td>
					<td><center>DIAMOND</center></td>
					

					<tr <?php if($contador>=40 and $contador<65){ ?>	style="background-color: yellow;" <?php };  ?>>
					<td>5</td>
					<td><center><i class="fa fa-diamond" aria-hidden="true"></i> <i class="fa fa-user-secret" aria-hidden="true"></i></center></td>
					<td><center>40 afiliados directos</center></td>
					<td><center>DIAMOND MASTER</center></td>
					
					<tr <?php if($contador>=65){ ?>	style="background-color: #FA8072;" <?php };  ?>>
					<td><b>6</b></td>
					<td><center><i class="fa fa-ra" aria-hidden="true"></i></center></td>
					<td><center><b>65 afiliados directos</b></center></td>
					<td><center><b>PLATINUM</b></center></td>
				
				
					<br>
				
</table>
</body>
</html>