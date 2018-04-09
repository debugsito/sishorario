
<?php
include "autoload.php";
include( dirname(__FILE__) .'/UsuarioData.php');
?>



<?php
  if (isset($_SESSION['admin']))
  {
  $idd= $_SESSION['id'];

  }
  
?>
    
	
<table class='table'>
    <link href="css/expandcollapse.css" rel="stylesheet" />
    <script src="js/jquery-1.11.1.min.js"></script>
    <script>
	$(function () {
            $('#Decor ul')
                .hide(400)
                .parent()
                .prepend('<span class="icon plus"></span>');

            $('#Decor li').on('click', function (e) {
                e.stopPropagation();
                $(this).children('ul').slideToggle('slow', function () {
                    if ($(e.target).is("span")) {
                        $(e.target)
                            .toggleClass('minus', $(this).is(':visible'));                        
                    }
                    else {
                        $(e.target).children('span')
                            .toggleClass('minus', $(this).is(':visible'));                        
                    }
                });
            }); 

            $('#Decor a').not('[href="#"]').attr('target', '_blank');
        });
    </script>
    
    <?php $usuario = UsuarioData::getByUsuario($idd); ?>

    <ul id="Decor">
        <li class="level1"><?php echo $usuario->nombres; ?>
	        <ul>
                <?php              
                 $users = UsuarioData::getAllUsuario($usuario->idUsuario);
                  if(count($users)>0){ 
                    foreach($users as $user){ ?>
                        <li class="level2"><?php echo $user->nombres; ?>
                            <ul>
                                <?php              
                                 $users1 = UsuarioData::getAllUsuario($user->idUsuario);
                                  if(count($users1)>0){ 
                                    foreach($users1 as $user1){ ?>
                                        <li class="level2"><?php echo $user1->nombres; ?>
                                            <ul>
                                                <?php              
                                                 $users2 = UsuarioData::getAllUsuario($user1->idUsuario);
                                                  if(count($users2)>0){ 
                                                    foreach($users2 as $user2){ ?>
                                                        <li class="level2"><?php echo $user2->nombres; ?>
                                                            <ul>
                                                                 <?php              
                                                                 $users3 = UsuarioData::getAllUsuario($user2->idUsuario);
                                                                  if(count($users3)>0){ 
                                                                    foreach($users3 as $user3){ ?>
                                                                        <li class="level2"><?php echo $user3->nombres; ?>
                                                                            <ul>
                                                                                <?php              
                                                                                 $users4 = UsuarioData::getAllUsuario($user3->idUsuario);
                                                                                  if(count($users4)>0){ 
                                                                                    foreach($users4 as $user4){ ?>
                                                                                        <li class="level2"><?php echo $user4->nombres; ?>
                                                                                            <ul>
                                                                                                <?php              
                                                                                                 $users5 = UsuarioData::getAllUsuario($user4->idUsuario);
                                                                                                  if(count($users5)>0){ 
                                                                                                    foreach($users5 as $user5){ ?>
                                                                                                        <li class="level2"><?php echo $user5->nombres; ?>
                                                                                                            <ul>
            <?php  $users6 = UsuarioData::getAllUsuario($user5->idUsuario);
                if(count($users6)>0){ 
                foreach($users6 as $user6){ ?>
                  <li class="level2"><?php echo $user6->nombres; ?>
                       <ul>
                          <?php  $users7 = UsuarioData::getAllUsuario($user6->idUsuario);
                          if(count($users7)>0){ 
                            foreach($users7 as $user7){ ?>
                                  <li class="level2"><?php echo $user7->nombres; ?>
                                       <ul>
                                          <?php  $users8 = UsuarioData::getAllUsuario($user7->idUsuario);
                                              if(count($users8)>0){ 
                                                foreach($users8 as $user8){ ?>
                                                      <li class="level2"><?php echo $user8->nombres; ?>
                                                           <ul>
                                                             <?php  $users9 = UsuarioData::getAllUsuario($user8->idUsuario);
                                                                  if(count($users9)>0){ 
                                                                    foreach($users9 as $user9){ ?>
                                                                          <li class="level2"><?php echo $user9->nombres; ?>
                                                                               <ul>
                                                                                  <?php  $users10 = UsuarioData::getAllUsuario($user9->idUsuario);
                                                                                      if(count($users10)>0){ 
                                                                                        foreach($users10 as $user10){ ?>
                                                                                              <li class="level2"><?php echo $user10->nombres; ?></li>
                                                                                     <?php }
                                                                                    }else{
                                                                                    } ?>
                                                                                </ul>
                                                                          </li>
                                                                 <?php }
                                                                }else{
                                                                } ?>
                                                            </ul>
                                                      </li>
                                             <?php }
                                            }else{
                                            } ?>
                                        </ul>
                                  </li>
                            <?php }
                            }else{
                            } ?>
                        </ul>
                  </li>
            <?php }
            }else{
            } ?>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                        <?php }
                                                                                                    }else{
                                                                                                   } ?>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <?php }
                                                                                    }else{
                                                                                   } ?>
                                                                            </ul>
                                                                        </li>
                                                                        <?php }
                                                                    }else{
                                                                   } ?>
                                                            </ul>
                                                        </li>
                                                    <?php }
                                                }else{
                                                } ?>
                                            </ul>
                                        </li>
                                    <?php }
                                }else{
                                } ?>
                            </ul>
                        </li>
                    <?php }
                }else{
                } ?>
            </ul>
                
        </li>
    </ul>

</table>