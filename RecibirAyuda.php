<?php
include "autoload.php";
include "UsuarioData.php";
include "AyudaData.php";
include "BrindarAyudaData.php";
include "funciones/php/AyudasTransacciones.php"
?>
<?php
$subtotal1 = $_POST['monto'];
?>
<?php
$id_recibe = $_POST['id_recibe'];
$monto = (double) $_POST['monto'];
$user = UsuarioData::getByUsuario($id_recibe);
//$usuarios_ayuda = UsuarioData::getAllUsuarioIds($user->id_patrocinador);
$ayudas = AyudaData::getTotalAyuda();
$total_ayuda = $ayudas['total'][0]->disponible;
$ayudas = $ayudas['ayudas'];
if($total_ayuda> $monto ){
    foreach ($ayudas as $ayuda){
        $disponible = (double)$ayuda->para_consumir;
        //        estado =  0->no ha sido tomado 1->ha sido tomado 2-> ha sido tomado parcialmente
        if($disponible < $monto ){
            //el ultimo es lo que queda para consumir
            AyudasTransacciones::crearTransaccion($ayuda,$monto,$id_recibe,0,1);
            $monto-=$disponible;
        }elseif ($disponible == $monto){
            AyudasTransacciones::crearTransaccion($ayuda,$monto,$id_recibe,0 ,1);
            $monto-=$disponible;
            break;
        }else{
            AyudasTransacciones::crearTransaccion($ayuda,$monto,$id_recibe,$disponible-$monto,2);
            break;
        }
    } ?>
    <script type="text/javascript">alert('Ayuda realizada...')</script>
    <script>window.location.replace('sistema.php');</script>
    <?php
}else { ?>

    <?php

    $i = 1;

    while ($i <= 5):
        $ayudas = AyudaData::getAllale(2);

        $sumar = 0;
        foreach ($ayudas as $ayuda):
            $sumar = $ayuda->monto + $sumar;

            if ($ayuda === end($ayudas)) {
                $nombre = $ayuda->id_usuario;
                $monto_dos = $ayuda->monto;
                $id_dos = $ayuda->id;
            }
            if ($ayuda === reset($ayudas)) {
                $nombre1 = $ayuda->id_usuario;
                $monto1_dos = $ayuda->monto;
                $id1_dos = $ayuda->id;
            }

        endforeach;

        echo "<br>";
        if ($sumar == $subtotal1) {
            $i = 5;
            $sumar = $sumar;

            $ayuda1 = new BrindarAyudaData();
            $ayuda1->usu_brinda = $nombre;
            $ayuda1->usu_recibe = $_POST['id_recibe'];
            $ayuda1->monto = $monto_dos;
            $ayuda1->ultimo = $_POST['ultimo'];
            $ayuda1->add();

            $actualizar1 = AyudaData::getById($id_dos);
            $actualizar1->update();


            $ayuda2 = new BrindarAyudaData();
            $ayuda2->usu_brinda = $nombre1;
            $ayuda2->usu_recibe = $_POST['id_recibe'];
            $ayuda2->monto = $monto1_dos;
            $ayuda2->ultimo = $_POST['ultimo'];
            $ayuda2->add();

            $actualizar2 = AyudaData::getById($id1_dos);
            $actualizar2->update();

            print "<script>window.location='sistema.php';</script>";

        } else {

            $sumar = "imposible";
        }

        $i++;

    endwhile;

    ?>
    <script type="text/javascript">alert('Ayuda en proceso ...')</script>
    <script>window.location.replace('sistema.php');</script>
<?php } ?>




