<?php
include "autoload.php";
include( dirname(__FILE__) .'/UsuarioData.php');
include "AyudaData.php";
include "BrindarAyudaData.php";
include "BancosData.php";
include "TblBancosData.php";
?>
<?php
// Recibo los datos de la imagen
$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
 
//Si existe imagen y tiene un tamaño correcto
if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <=9000000)) 
{
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg") 
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
   {
      // Ruta donde se guardarán las imágenes que subamos
      $directorio = 'voucher/';
      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
    } 
    else 
    {
       //si no cumple con el formato
       echo "No se puede subir una imagen con ese formato ";
    }
} 
else 
{
   //si existe la variable pero se pasa del tamaño permitido
   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
}

date_default_timezone_set('America/Lima');
$fecha = date('Y-m-d H:i:s');

$fotos = BrindarAyudaData::getById($_POST["id_ayuda"]);
  $fotos->foto = $nombre_img;
  $fotos->fecha_fini = $fecha;
  $fotos->update();

 
/* volvemos a la página principal para cargar la imagen que hemos subido */
header("Location: sistema.php");


?>