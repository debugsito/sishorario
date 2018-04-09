<!DOCTYPE html>

<html class="no-js">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	</head>
	
	<body>
	
<style>
#customerss {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 90%;
}

#customerss td, #customerss th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customerss tr:nth-child(even){background-color: #f2f2f2;}

#customerss tr:hover {background-color: #ddd;}

#customerss th {
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
		$sql="SELECT monto from tblayuda where id_usuario=$idd ";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		

		$contador=1+$contador;
	

	}
?>	 

<table class='tables' id="customerss">
			<tr>
				<th>#</th><th><center>MONTO M&IacuteNIMO </center></th><th><center>MONTO M&AacuteXIMO </center></th><th><center>PEDIR AYUDA</center></th>
			</tr>			
				
					<tr <?php if($contador==0){ ?>	style="background-color: yellow;" <?php };  ?>	>
					<td>1</td>
					<td><center>S/. 50.00</center></td>
					<td><center>S/. 800.00</center></td>
					<td><center>50% a los 30 d&iacuteas </center></td>
				
					
                    <tr <?php if($contador==1){ ?>	style="background-color: yellow;" <?php };  ?>	>
					<td>2</td>
					<td><center>S/. 50.00</center></td>
					<td><center>S/. 2000.00<center></td>
					<td><center>30% a los 30 d&iacuteas </center></td>
				

                    <tr <?php if($contador==2){ ?>	style="background-color: yellow;" <?php };  ?>	>
					<td>3</td>
					<td><center>S/. 50.00</center></td>
					<td><center>S/. 3000.00</center></td>
					<td><center>30% a los 30 d&iacuteas </center></td>
					

                    <tr <?php if($contador==3){ ?>	style="background-color: yellow;" <?php };  ?>	>
					<td>4</td>
					<td><center>S/. 50.00</center></td>
					<td><center>S/. 4000.00</center></td>
					<td><center>30% a los 30 d&iacuteas </center></td>
					

					<tr <?php if($contador==4){ ?>	style="background-color: yellow;" <?php };  ?>	>
					<td>5</td>
					<td><center>S/. 50.00</center></td>
					<td><center>S/. 5000.00</center></td>
					<td><center>30% a los 30 d&iacuteas </center></td>
				
				
					<br>
				
</table>
</body>
</html>