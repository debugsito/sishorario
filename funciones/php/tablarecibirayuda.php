
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
    background-color: #47bfd0;
    color: white;
}
</style>
 

 <?php $usuario = UsuarioData::getByUsuario1($idd); ?>
  <?php $contador=0; ?>
  <?php $sumar1=0; $sumar2=0;$sumar3=0;$sumar4=0;$sumar5=0; ?>
  <?php              
    $users = UsuarioData::getAllUsuario($usuario->idUsuario);
    if(count($users)>0){ 
    foreach($users as $user){ ?>
    <?php $contador=1+$contador; ?>
    <?php } ?>
    <?php } ?>
         
    <?php              
    $users = UsuarioData::getAllUsuario($usuario->idUsuario);
    if(count($users)>0){ 
    foreach($users as $user){ ?>
     
    <?php              
    $ayudas = AyudaData::getAllUsuario($user->idUsuario);
    if(count($ayudas)>0){ 

      foreach($ayudas as $ayuda){ ?>

     
        <?php $sumar1=(($ayuda->monto*10)/100)+$sumar1; ?>
       

          
      <?php } ?>
     <?php } ?>
                        
        <?php if($contador>9){ ?>  

        <?php              
          $users1 = UsuarioData::getAllUsuario($user->idUsuario);
          if(count($users1)>0){ 
            foreach($users1 as $user1){ ?>
            <?php              
            $ayudas1 = AyudaData::getAllUsuario($user1->idUsuario);
            if(count($ayudas1)>0){ 

            foreach($ayudas1 as $ayuda1){ ?>
            
                   
                    <?php $sumar2=(($ayuda1->monto*10)/100)+$sumar2; ?>      
                   

            <?php } ?>
            <?php } ?>

            <?php if($contador>19){ ?>  

          <?php              
          $users2 = UsuarioData::getAllUsuario($user1->idUsuario);
          if(count($users2)>0){ 
            foreach($users2 as $user2){ ?>
              <?php              
              $ayudas2 = AyudaData::getAllUsuario($user2->idUsuario);
              if(count($ayudas2)>0){ 

              foreach($ayudas2 as $ayuda2){ ?>
              
                      
                      <?php $sumar3=(($ayuda2->monto*10)/100)+$sumar3; ?>       
                  

              <?php } ?>
              <?php } ?>

                 
                 <?php if($contador>29){ ?>

                  <?php              
                  $users3 = UsuarioData::getAllUsuario($user2->idUsuario);
                  if(count($users3)>0){ 
                    foreach($users3 as $user3){ ?>
                      <?php              
                      $ayudas3 = AyudaData::getAllUsuario($user3->idUsuario);
                      if(count($ayudas3)>0){ 

                      foreach($ayudas3 as $ayuda3){ ?>

                             
                              <?php $sumar4=(($ayuda3->monto*10)/100)+$sumar4; ?>      
                            

                      <?php } ?>
                      <?php } ?>

                          <?php if($contador>39){ ?>

                           <?php              
                            $users4 = UsuarioData::getAllUsuario($user3->idUsuario);
                            if(count($users4)>0){ 
                              foreach($users4 as $user4){ ?>

                                <?php              
                                $ayudas4 = AyudaData::getAllUsuario($user4->idUsuario);
                                if(count($ayudas4)>0){ 

                                foreach($ayudas3 as $ayuda4){ ?>
                                        
                                        <?php $sumar5=(($ayuda4->monto*10)/100)+$sumar5; ?>       
                                    

                                <?php } ?>
                                <?php } ?>

                            <?php } ?>
                            <?php } ?>

                            <!---cerrar condición de 29-39 -->
                            <?php } ?>
                            <!---fin cerrar 29-39 -->


                  <?php } ?>
                  <?php } ?>

                   <!---cerrar condición de 20-29 -->
                  <?php } ?>
                  <!---fin cerrar 20-29 -->


          <?php } ?>
          <?php } ?>

           <!---cerrar condición de 10-19 -->
          <?php } ?>
          <!---fin cerrar 10-19 -->


          <?php } ?>
          <?php } ?>

          <!---cerrar condición de 0-9 -->
          <?php } ?>
          <!---fin cerrar 0-9 -->


  <?php } ?>
  <?php } ?>

 
      
           

<?php $sumar_total= $sumar1+$sumar2+$sumar3+$sumar4+$sumar5; ?>
 





<?php $ayuda_monto= AyudaData::getByAyuda($idd); ?>
<table class='table' id="customers">
			<tr>
				<th><center>#</center></th><th><center>BRINDADO</center></th><th><center>INTER&EacuteS </center></th><th><center>BONOS</center></th>
			</tr>			
				
					<tr>
					<td><center><i class="fa fa-check-circle-o" style="font-size:20px"></i></center></td>

					<td><center><?php echo $ayuda_monto->monto; ?> </center></td>
					<td><center> <?php echo  ($ayuda_monto->monto*50)/100 ?> </center></td>
					<td><center> <?php echo $sumar_total; ?></center></td>

					<br>
				
</table> 

<table class='table' id="customers">
			<tr>
				<th><center>#</center></th><th><center>TOTAL 
<?php

$cadena=($ayuda_monto->monto + (($ayuda_monto->monto*50)/100)) + $sumar_total;
$ultimo = substr("$cadena", -1);
$subtotal= $cadena-$ultimo;

 ?>
<input type="hidden" name="ultimo" value="<?php echo $ultimo; ?>">				
</center></th>
			</tr>			
				
					<tr>
					<td><center><i class="fa fa-check-circle-o" style="font-size:20px"></i></center></td>
					<td><center>S/.<input type="number"  style="border:none" name="monto" value="<?php  echo $cadena-$ultimo; ?>" disabled=''></center></td>
					<br>
	

</table>

