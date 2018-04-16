
 




<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<head> 

 <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">



<?php
date_default_timezone_set('America/Lima');
 ?>

<table class='table'>
			<tr style="background-color: #0FF0E2;">
				<th>#</th>
				<th><center>Donante</center></th>
				<th><center>Ayuda</center></th>
				<th><center>Beneficiario</center></th>
				<th><center>Fecha y Hora</center></th>

        <th><center>Opción</center></th>
        <th><center>Cronómetro Validación</center></th>
 

			</tr>			
				

<?php

$ayudas = BrindarAyudaData::getByUser($idd);
//var_dump($ayudas); exit;
if(count($ayudas)>0){

?>
  
      <?php
      foreach($ayudas as $ayuda){
        ?>
        <tr <?php if($ayuda->validar==1){ ?> style="background-color: #D4E157;" <?php } ?> >
        <td> </td>
        <td><center><?php echo $ayuda->getUsuario()->nombres; ?></center></td>
        <td><center><b>S/. <?php echo $ayuda->monto; ?></b></center></td>
        <td><center><?php echo $ayuda->getUsuario2()->nombres; ?></center></td>
        <td><center><?php echo $ayuda->created_at; ?></center></td>

<?php $fecha_db=$ayuda->created_at; ?>
<?php $fecha_db_fini=$ayuda->fecha_final; ?>

<?php  

$mod_date_ayuda1= strtotime($fecha_db."+ 3 days");
$fecha_finish_ayuda1 = date("Y-m-d H:i:s",$mod_date_ayuda1);

?>



<?php 


$fecha_condicion = new DateTime("$fecha_finish_ayuda1");
$fecha_condicion_hoy = new DateTime("NOW");
$diff_condicion = $fecha_condicion_hoy->diff($fecha_condicion);

 ?>


<?php   
if($diff_condicion->invert == 1 and $ayuda->foto!='' and $ayuda->foto!=NULL) {
$validar = BrindarAyudaData::getByAyuda($ayuda->id);
$validar->updateValidar();
}
?>

     


        


        
        <?php if($ayuda->validar==1){ ?> 

    <td><center><div><a <?php if($ayuda->foto!='' and $ayuda->foto!=NULL){ ?> href="validar_1.php?id=<?php echo $ayuda->getUsuario2()->idUsuario; ?>&id_ayuda=<?php echo $ayuda->id; ?>" <?php } ?> ><i class="material-icons">visibility</i></a></div></center></td>
    <td><center><a class='btn btn-danger btn-xs'><b>¡Verificación Realizada!</b></a></center></td>
    <?php } else { ?>

      <td><center><div><a <?php if($ayuda->foto!='' and $ayuda->foto!=NULL){ ?> href="validar.php?id=<?php echo $ayuda->getUsuario2()->idUsuario; ?>&id_ayuda=<?php echo $ayuda->id; ?>&id_usu=<?php echo $ayuda->getUsuario()->idUsuario; ?>" <?php } ?> ><i class="material-icons">visibility</i></a></div></center></td>

      <?php if($ayuda->foto=='' and $ayuda->foto==NULL){ ?>

<?php if($diff_condicion->invert == 1) { ?>

        <td><center> <a href="#" class="btn btn-default btn-sm" style="border-radius: 100px; background-color: #12150A"><b>¡ No brindó ayuda !</b></a></center></td>

        <?PHP }elseif($ayuda->validar==2){ ?>
        <td><center><a class='btn btn-danger btn-sm'>En proceso...</a></center></td>
        <?php
        }else{
          ?>
      <td><center><a class='btn btn-info btn-sm'>En proceso...</a></center></td>

     <?php } ?>

    <?php }else{
if($ayuda->validar==2){ ?>
        <td><center><a class='btn btn-danger btn-sm'>¡ Voucher Rechazado !</a></center></td>
        <?php
        }
      } ?>

		
<?php if($ayuda->validar==0 and $ayuda->foto!='' and $ayuda->foto!=NULL){ ?> 
		    <td style="width: 15%;">
<center>


<?php
$mod_date_ayuda= strtotime($fecha_db_fini."+ 2 days");
$fecha_finish_ayuda = date("Y-m-d H:i:s",$mod_date_ayuda);
 ?>
<div class="contador" data-until="<?php date_default_timezone_set('America/Lima'); echo strtotime($fecha_finish_ayuda);?>" data-done="¡Finalizado!" data-respond>
         
                 <div class="dias block">
                   <div class="conta"></div>
                  
                 </div>
                 <div class="horas block">
                   <div class="conta"></div>
   
                 </div>
                 <div class="minutos block">
                   <div class="conta"></div>
                  
                 </div>
                 <div class="segundos block">
                   <div class="conta"></div>
                 
                 </div>
                 <font size="3" color="#29B6F6"><b>días</b></font>
 </div>


</center>



  
        </td>
		
 <?php } ?>

 <?php } ?>

        </tr>
      <?php }; ?>

<?php
}else{
      // no hay usuarios
}

?>
</table>
</head>

