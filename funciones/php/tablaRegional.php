
<head> 
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>



  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>





  <?php
  date_default_timezone_set('America/Lima');
  ?>




  <table class='table' >
   <tr style="background-color: #FBC715;">  
    <th>#</th>
    <th><center>Donante</center></th>
    <th><center>Ayuda</center></th>
    <th><center>Beneficiario</center></th>
    <th><center>Fecha y Hora</center></th>

    <th><center>Opción</center></th>
    <th><center>Cronómetro Depósito</center></th>
    
  </tr>		


  <?php
  $ayudas1 = BrindarAyudaData::getByUserBrinda($idd);
  if(count($ayudas1)>0){
    ?>
    <?php
    foreach($ayudas1 as $ayuda1){ 
      ?>
      <tr <?php if($ayuda1->validar==1){ ?> style="background-color: #FFEE58;" <?php } ?>>
        <td> </td>
        <td><center><?php echo $ayuda1->getUsuario()->nombres; ?></center></a></td>
        <td><center><b>S/. <?php echo $ayuda1->monto; ?></b></center></td>
        <?php $patrocinador = UsuarioData::getByPatrocinador($ayuda1->getUsuario2()->id_patrocinador); ?>
        <td><a href="#" data-toggle="popover" title="<?php echo 'DNI: '.$ayuda1->getUsuario()->dni; ?>" 
          data-content="<?php if($ayuda1->getUsuario2()->id_patrocinador!=0){echo 'PATROCINADOR: '.$patrocinador->nombres;} ?>"
          ><center><?php echo $ayuda1->getUsuario2()->nombres; ?></center> </a></td>
          <td><center><?php echo $ayuda1->created_at; ?></center></td>

          <form method="post" id="formulario" name="formulario">
            <input type="hidden" name="estado" value="1" />
            <input type="hidden" name="id" value="<?php echo $ayuda1->getUsuario()->idUsuario; ?>" />

          </form>



          <?php $fecha_db1=$ayuda1->created_at; ?>
          <?php if($ayuda1->validar==1){ ?> 

          <td><center><div><a><i class="material-icons">add_a_photo</i></a></div></center></td>

          <?php } else { ?>




          



          <td><center>
            <?php if($ayuda1->foto=='' and $ayuda1->foto==NULL){ ?>
            <div><a href="subirfoto.php?id=<?php echo $ayuda1->getUsuario2()->idUsuario; ?>&id_ayuda=<?php echo $ayuda1->id; ?>" ><i class="fa fa-image" aria-hidden="true"></i></a></div>
            <?php }else if($ayuda1->validar==2){ ?>
              <div><i class="fa fa-warning" style="font-size:28px;color:red" aria-hidden="true"></i></div>
              <?php
            }
            else
             { echo "<a class='btn btn-success btn-sm'>En proceso ...</a>";} ?>
          </center></td>



          <?php } ?>

          <script>
            $(document).ready(function(){
              $('[data-toggle="popover"]').popover();   
            });
          </script>

          <?php if($ayuda1->validar==0){ ?> 

          <td style="width: 30%;">
            <center>

              <?php    
              if($ayuda1->validar==0){
                if($ayuda1->foto=='' and $ayuda1->foto==NULL){
                  $mod_date_ayuda1= strtotime($fecha_db1."+ 3 days");
                  $fecha_finish_ayuda1 = date("Y-m-d H:i:s",$mod_date_ayuda1);
                  ?>


                  <div class="contador" data-until="<?php date_default_timezone_set('America/Lima'); echo strtotime($fecha_finish_ayuda1);?>" data-done="¡No brindó ayuda!" data-respond>

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
                 <?php }else{ echo "Esperando confirmación"; } }else{ echo "Foto confirmada"; } ?>
               </center>
             </td>

             <?php } else if($ayuda1->validar==2){
      echo "<td><center><a class='btn btn-danger btn-xs'><b>¡ Voucher Rechazado !</b></a></center></td>";              
              } else { ?>

             <td><center><a class='btn btn-info btn-xs'><b>¡ Depósito realizado !</b></a></center></td>

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

