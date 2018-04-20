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

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #47bfd0;
        color: white;
    }
</style>
<?php
$ayudas_id = [];
$usuario = UsuarioData::getByUsuario1($idd); ?>
<?php $contador = 0; ?>
<?php $sumar1 = 0;
$sumar2 = 0;
$sumar3 = 0;
$sumar4 = 0;
$sumar5 = 0; ?>


<?php

$userser = UsuarioData::getAllUsuario($usuario->idUsuario);
$fecha1 = '';
$fecha2 = '';
$fecha3 = '';
$fecha4 = '';
if (count($userser) > 0) {
    foreach ($userser as $user) { ?>
        <?php
        $contador = 1 + $contador;
        if ($contador == 10) {
            $fecha1 = $user->fechas;
        }
        if ($contador == 20) {
            $fecha2 = $user->fechas;
////echo $user->idUsuario; echo '-----'. $fecha2;
        }
        if ($contador == 30) {
            $fecha3 = $user->fechas;
        }
        if ($contador == 40) {
            $fecha4 = $user->fechas;
        }
        ?>

    <?php } ?>
<?php } ?>

<?php
//echo $usuario->idUsuario.'Patrocinador';
$users = UsuarioData::getAllUsuario($usuario->idUsuario);
$ayudas_usadas = AyudaData::getAyudasUsadasByIdUsuario($usuario->idUsuario);
if (count($users) > 0) {
    foreach ($users as $user) { ?>

        <?php
        $ayudas = AyudaData::getAllUsuario($user->idUsuario,$ayudas_usadas->ayudas_ids,3);
        if (count($ayudas) > 0) {

            foreach ($ayudas as $ayuda) {
                $sumar1 = (($ayuda->monto * 10) / 100) + $sumar1;
                $ayudas_id[] = ['id'=>$ayuda->id,'monto'=>$sumar1];
            } ?>
        <?php } ?>

        <?php if ($contador > 9) { ?>

            <?php

            $users1 = UsuarioData::getAllUsuario($user->idUsuario);
            if (count($users1) > 0) {
                foreach ($users1 as $user1) {

                    if ($user1->fechas < '2018-04-05') {

                        if ($user1->fechas >= $fecha1) {

                        }

                        ?>

                        <?php
                        $ayudas1 = AyudaData::getAllUsuario($user1->idUsuario,$ayudas_usadas->ayudas_ids,3);
                        if (count($ayudas1) > 0) {
                            foreach ($ayudas1 as $ayuda1) {
                                $sumar2 = (($ayuda1->monto * 5) / 100) + $sumar2;
                                $ayudas_id[] = ['id'=>$ayuda->id,'monto'=>$sumar2];
                                if ($user1->fechas < '2018-04-05') {
                                }
                            } ?>
                        <?php }

                        ?>

                        <?php if ($contador > 19) { ?>

                            <?php
                            $users2 = UsuarioData::getAllUsuario($user1->idUsuario);
                            if (count($users2) > 0) {
                                foreach ($users2 as $user2) {
                                    if ($user2->fechas < '2018-04-05') {
                                        if ($user2->fechas >= $fecha2) {
                                        }
                                        ?>

                                        <?php
                                        $ayudas2 = AyudaData::getAllUsuario($user2->idUsuario,$ayudas_usadas->ayudas_ids,3);
                                        if (count($ayudas2) > 0) {

                                            foreach ($ayudas2 as $ayuda2) {
                                                $sumar3 = (($ayuda2->monto * 2.5) / 100) + $sumar3;
                                                $ayudas_id[] = ['id'=>$ayuda->id,'monto'=>$sumar3];
                                                if ($user2->fechas < '2018-04-05') {
                                                }
                                            } ?>
                                        <?php } ?>


                                        <?php if ($contador > 29) { ?>

                                            <?php
                                            $users3 = UsuarioData::getAllUsuario($user2->idUsuario);
                                            if (count($users3) > 0) {
                                                foreach ($users3 as $user3) {
                                                    if ($user3->fechas < '2018-04-05') {
                                                        if ($user2->fechas >= $fecha3) {
                                                        }

                                                        ?>

                                                        <?php
                                                        $ayudas3 = AyudaData::getAllUsuario($user3->idUsuario,$ayudas_usadas->ayudas_ids,3);
                                                        if (count($ayudas3) > 0) {
                                                            foreach ($ayudas3 as $ayuda3) {
                                                                $sumar4 = (($ayuda3->monto * 1) / 100) + $sumar4;
                                                                $ayudas_id[] = ['id'=>$ayuda->id,'monto'=>$sumar4];
                                                                if ($user3->fechas < '2018-04-05') {
                                                                }
                                                            } ?>
                                                        <?php } ?>

                                                        <?php if ($contador > 39) { ?>

                                                            <?php
                                                            $users4 = UsuarioData::getAllUsuario($user3->idUsuario);
                                                            if (count($users4) > 0) {
                                                                foreach ($users4 as $user4) {
                                                                    if ($user4->fechas < '2018-04-05') {
                                                                        if ($user3->fechas >= $fecha4) {
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        $ayudas4 = AyudaData::getAllUsuario($user4->idUsuario,$ayudas_usadas->ayudas_ids,3);
                                                                        if (count($ayudas4) > 0) {

                                                                            foreach ($ayudas3 as $ayuda4) {
                                                                                $sumar5 = (($ayuda4->monto * 0.5) / 100) + $sumar5;
                                                                                $ayudas_id[] = ['id'=>$ayuda->id,'monto'=>$sumar5];
                                                                                if ($user4->fechas < '2018-04-05') {
                                                                                }
                                                                            } ?>
                                                                        <?php } ?>

                                                                    <?php }

                                                                } ?>
                                                            <?php } ?>

                                                            <!---cerrar condición de 29-39 -->
                                                        <?php } ?>
                                                        <!---fin cerrar 29-39 -->


                                                    <?php }

                                                } ?>
                                            <?php } ?>

                                            <!---cerrar condición de 20-29 -->
                                        <?php } ?>
                                        <!---fin cerrar 20-29 -->


                                    <?php }
                                } ?>
                            <?php } ?>

                            <!---cerrar condición de 10-19 -->
                        <?php } ?>
                        <!---fin cerrar 10-19 -->


                    <?php } ?>
                    <?php
                }
            } ?>

            <!---cerrar condición de 0-9 -->
        <?php } ?>
        <!---fin cerrar 0-9 -->


    <?php } ?>
<?php } ?>



<?php $sumar_total = $sumar1 + $sumar2 + $sumar3 + $sumar4 + $sumar5; ?>

<?php
$ayudas = AyudaData::getAyudasByUsuario($idd)->ayudas;

$ayuda_monto = $ayuda_usar;
$porcentaje = $ayudas>0?30:50;
?>
<table class='table' id="customers">
    <tr>
        <th>
            <center>#</center>
        </th>
        <th>
            <center>BRINDADO</center>
        </th>
        <th>
            <center>INTER&EacuteS</center>
        </th>
        <th>
            <center>BONOS</center>
        </th>
    </tr>

    <tr>
        <td>
            <center><i class="fa fa-check-circle-o" style="font-size:20px"></i></center>
        </td>

        <td>
            <center><?php echo $ayuda_monto->monto; ?> </center>
        </td>
        <td>
            <center> <?php echo ($ayuda_monto->monto * $porcentaje) / 100 ?> </center>
        </td>
        <td>
            <center> <?php echo number_format($sumar_total, 2); ?></center>
        </td>

        <br>

</table>

<table class='table' id="customers">
    <tr>
        <th>
            <center>#</center>
        </th>
        <th>
            <center>TOTAL
                <?php

                $cadena = ($ayuda_monto->monto + (($ayuda_monto->monto * 50) / 100)) + $sumar_total;
                $ultimo = substr("$cadena", -1);
                $subtotal = $cadena - $ultimo;

                ?>
                <input type="hidden" name="ayudas_ids" value='<?php echo json_encode($ayudas_id); ?>'>
                <input type="hidden" name="ultimo" value="<?php echo $ultimo; ?>">
                <input type="hidden" name="id_ayuda" value="<?php echo $ayuda_monto->id; ?>">
            </center>
        </th>
    </tr>

    <tr>
        <td>
            <center><i class="fa fa-check-circle-o" style="font-size:20px"></i></center>
        </td>
        <td>
            <center>S/.<input type="number" style="border:none" name="monto"
                              value="<?php echo $cadena - $ultimo; ?>" readonly></center>
        </td>
        <br>


</table>

