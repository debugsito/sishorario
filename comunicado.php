<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<script type="text/javascript" src="js/ambiente.js"></script>

<div class="card">
<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
  <h3 class="title"><i class="material-icons">grain</i> Comunicado</h3>
</div>
<div class="card-content table-responsive" style=" background-image: url('images/fina.jpg');  background-color: #cccccc;">


<center><div class="card-content table-responsive">
<iframe width="812px" height="384px" src="https://www.yumpu.com/xx/embed/view/UNWoRkp3bJ6ICSrj" frameborder="0" allowfullscreen="true" allowtransparency="true"></iframe>
</div></center>
</div>



</div>  
<?php
include 'views/logic/footer.php';
?>


</div>
</html>