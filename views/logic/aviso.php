<?php
  if (isset($_SESSION['admin']))
  {
  $idd= $_SESSION['id'];

  $estado= $_SESSION['estado'];
  }
  
?>
<?php if($estado==1){ ?>

<?php
  # Iniciando la variable de control que permitirá mostrar o no el modal
  $exibirModal = false;
  # Verificando si existe o no la cookie
  if(!isset($_COOKIE["mostrarModal"]))
  {
    $expirar = 43200; //muestra cada 12 horas
    $exibirModal = true;
  }
?>


  <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="modalInicio" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header" style=" background-image: url('images/nebz.jpg');  background-color: #cccccc;">
           
            <center><h4 class="modal-title" style="color:white;"><b> &#9997; &nbsp; BIENVENIDO &nbsp; a &nbsp;  MONEYWORK </b></h4></center>
         </div>
<center><div class="modal-body" style=" background-image: url('images/dnag.jpg');  background-color: #cccccc;">
        <p style="color:white;">  <?php 
date_default_timezone_set('America/Lima');
$today = getdate(); 
$hora=$today["hours"]; 
if ($hora<6) { 
echo("Hoy has madrugado mucho ,"); 
}elseif($hora<12){ 
echo("Buenos días estimado(a) participante ,"); 
}elseif($hora<=18){ 
echo("Buenas Tardes estimado(a) participante ,"); 
}else{ echo("Buenas Noches estimado(a) participante ,"); } 

?><p>
<p style="color:white;"> Su cuenta ha sido bloqueada por infringir algunas pol&iacute;ticas de MoneyWork. Si usted cree que es injusto comun&iacute;quese con soporte justificando el problema.</p>
<br><br>
<div align="right">
<a type="button" class="btn btn-warning" href="salir.php"><i class="fa fa-close" aria-hidden="true"></i></a>
</div>
</div><center>
         
        </div>
      </div>
    </div>
  </div>


  <?php if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
  <script>
  $(document).ready(function()
  {
    // id de nuestro modal
    $("#modalInicio").modal("show");
  });
  
  $('#modalInicio').modal({backdrop: 'static', keyboard: false})
  
  </script>
  <?php endif; ?>

<?php }else{ ?>

<?php
  # Iniciando la variable de control que permitirá mostrar o no el modal
  $exibirModal = false;
  # Verificando si existe o no la cookie
  if(!isset($_COOKIE["mostrarModal"]))
  {
    $expirar = 43200; //muestra cada 12 horas
    $exibirModal = true;
  }
?>


  <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="modalInicio" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header" style=" background-image: url('images/esy.png');  background-color: #cccccc;">
           <button type="button" class="close" data-dismiss="modal">X</button>
            <center><h4 class="modal-title"><b> &#9997; &nbsp; BIENVENIDO &nbsp; a &nbsp;  MONEYWORK </b></h4></center>
         </div>
<center><div class="modal-body">
          <?php 
date_default_timezone_set('America/Lima');
$today = getdate(); 
$hora=$today["hours"]; 
if ($hora<6) { 
echo("Hoy has madrugado mucho . . . "); 
}elseif($hora<12){ 
echo("Buenos días estimado(a) participante . . ."); 
}elseif($hora<=18){ 
echo("Buenas Tardes estimado(a) participante . . ."); 
}else{ echo("Buenas Noches estimado(a) participante . . ."); } 

?>
</div><center>
         <div class="modal-footer">
            <a type="button" class="btn btn-warning" data-dismiss="modal" >Cerrar </a>
            
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
  <script>
  $(document).ready(function()
  {
    // id de nuestro modal
    $("#modalInicio").modal("show");
  });
  
  $('#modalInicio').modal({backdrop: 'static', keyboard: false})
  
  </script>
  <?php endif; ?>

  <?php }; ?>