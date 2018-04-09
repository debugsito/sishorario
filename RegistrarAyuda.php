
<?php 

$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'sishorario';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
//////////////////////////////////////////////////////////////////////////////////////////////
date_default_timezone_set('America/Lima');

$mensaje = ' Usted ha brindado Ayuda ... ';

$fecha = date('Y-m-d H:i:s');


 
$montos=$_POST['montos'];
$numeros=$_POST['numeros'];
$finales=$_POST['finales'];

 if ($montos<50) { ?>

 <script>
 alert('No puede brindar menos de S/. 50.00 ')
window.location.href = "sistema.php";
</script>
 <?php } elseif($montos>800 && $numeros==0){ //primer nivel ?>

    <script>
 alert('Es su primera participación , no puede exceder los S/. 800.00 ')
  window.location.href = "sistema.php";
</script>

  <?php } elseif($montos>2000 && $numeros==1){ //primer nivel ?>

    <script>
 alert('Es su segunda participación , no puede exceder los S/. 2000.00 ')
  window.location.href = "sistema.php";
</script>

  <?php } elseif($montos>3000 && $numeros==2){ //primer nivel ?>

    <script>
 alert('Es su tercera participación , no puede exceder los S/. 3000.00 ')
  window.location.href = "sistema.php";
</script>

<?php } elseif($montos>4000 && $numeros==3){ //primer nivel ?>

    <script>
 alert('Es su cuarta participación , no puede exceder los S/. 4000.00 ')
  window.location.href = "sistema.php";
</script>

<?php } elseif($montos>5000 && $numeros==4){ //primer nivel ?>

    <script>
 alert('Es su quinta  participación , no puede exceder los S/. 5000.00 ')
  window.location.href = "sistema.php";
</script>

<?php } elseif($montos<$finales){ //primer nivel ?>

    <script>
 alert('No puede brindar un monto menos que el mes pasado ')
  window.location.href = "sistema.php";
</script>

<?php } elseif ($montos%10 != 0){ //primer nivel ?>

    <script>
 alert('Nota: El monto brindado debe ser múltiplo de 10 ')
  window.location.href = "sistema.php";
</script>

<?php } else{ 

    $sql = "INSERT INTO tblayuda (monto,fecha,id_usuario,para_consumir) VALUES (:usu_monto,'$fecha',:id_usuario,:para_consumir)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usu_monto', $_POST['montos']);
    $stmt->bindParam(':para_consumir', $_POST['montos']);
    $stmt->bindParam(':id_usuario', $_POST['id_usuario']);

    if ($stmt->execute()) {
    
 print "<script>alert('$mensaje')</script>";
 print("<script>window.location.replace('sistema.php');</script>"); 

    } else {
      echo"<script>alert(' Ha ocurrido un error al brindar ayuda !')</script>";
    }
  
 } ?>


