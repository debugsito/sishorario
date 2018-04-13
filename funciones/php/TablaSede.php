<?php
if (isset($_GET['estado']) and $_GET['estado'] != '') {

    include "autoload.php";
    include(dirname(__FILE__) . '/UsuarioData.php');
    include "AyudaData.php";
    ?>
    <html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
    <div class="container" align="left">


        <?php
        if (isset($_SESSION['admin'])) {
            $idd = $_SESSION['id'];
        }

        ?>

        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

            <thead>
            <tr>


                <th>
                    <center>Afiliado</center>
                </th>
                <th>
                    <center>Ayuda Brindada</center>
                </th>
                <th>
                    <center>Porcentaje</center>
                </th>
                <th>
                    <center>Ganacia</center>
                </th>
                <th>
                    <center>Fecha de Registro</center>
                </th>
                <th>
                    <center>Estado</center>
                </th>

            </tr>
            </thead>

            <tbody>

            <?php $usuario = UsuarioData::getByUsuario1($idd);
            $ayudas_usadas = AyudaData::getAyudasUsadasByIdUsuario($idd);

            $contador = 0; ?>
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
            if (count($users) > 0) {
                foreach ($users as $user) { ?>

                    <?php
//    $ayudas = AyudaData::getAllUsuarioFiltro($user->idUsuario,$_GET['estado']);
                    $ayudas = AyudaData::getAllUsuario($user->idUsuario, $ayudas_usadas->ayudas_ids, $_GET['estado']);
                    if (count($ayudas) > 0) {

                        foreach ($ayudas as $ayuda) { ?>

                            <tr>
                                <td>
                                    <center><?php echo $user->nombres; ?></center>
                                </td>
                                <td>
                                    <center>S/. <?php echo $ayuda->monto; ?></center>
                                </td>
                                <td>
                                    <center> 10%</center>
                                </td>
                                <td>
                                    <center><b>S/. <?php echo ($ayuda->monto * 10) / 100 ?> </b></center>
                                </td>
                                <td>
                                    <center><?php echo $ayuda->fecha; ?></center>
                                </td>

                                <td>
                                    <center>
                                        <?php if ($ayuda->status == '0') { ?>
                                            <a class='btn btn-info btn-sm'>En Proceso</a>
                                        <?php } else if ($ayuda->status == '1') { ?>
                                            <a class='btn btn-danger btn-sm'>Rechazado</a>
                                        <?php } else if ($ayuda->status == '2') { ?>
                                            <a class='btn btn-primary btn-sm'>Asignado</a>
                                        <?php } else if ($ayuda->status == '3') { ?>
                                            <a class='btn btn-success btn-sm'>Confirmado</a>
                                        <?php } else { ?>
                                            <a class='btn btn-danger btn-sm'
                                               style="background-color: black;">Rechazado</a>
                                        <?php }; ?>

                                    </center>
                                </td>

                                <?php $sumar1 = (($ayuda->monto * 10) / 100) + $sumar1; ?>
                            </tr>


                        <?php } ?>
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
//            $ayudas1 = AyudaData::getAllUsuarioFiltro($user1->idUsuario,$_GET['estado']);
                                    $ayudas1 = AyudaData::getAllUsuario($user1->idUsuario, $ayudas_usadas->ayudas_ids, $_GET['estado']);
                                    if (count($ayudas1) > 0) {
                                        foreach ($ayudas1 as $ayuda1) {
                                            ?>

                                            <tr>
                                                <td>
                                                    <center><?php echo $user1->nombres; ?></center>
                                                </td>
                                                <td>
                                                    <center>S/. <?php echo $ayuda1->monto; ?></center>
                                                </td>
                                                <td>
                                                    <center> 5%</center>
                                                </td>
                                                <td>
                                                    <center><b> S/. <?php echo ($ayuda1->monto * 5) / 100 ?> </b>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center><?php echo $ayuda1->fecha; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <?php if ($ayuda1->status == '0') { ?>
                                                            <a class='btn btn-info btn-sm'>En Proceso</a>
                                                        <?php } else if ($ayuda1->status == '1') { ?>
                                                            <a class='btn btn-danger btn-sm'>Rechazado</a>
                                                        <?php } else if ($ayuda1->status == '2') { ?>
                                                            <a class='btn btn-primary btn-sm'>Asignado</a>
                                                        <?php } else if ($ayuda1->status == '3') { ?>
                                                            <a class='btn btn-success btn-sm'>Confirmado</a>
                                                        <?php } else { ?>
                                                            <a class='btn btn-danger btn-sm'
                                                               style="background-color: black;">Rechazado</a>
                                                        <?php }; ?>
                                                    </center>
                                                </td>
                                                <?php $sumar2 = (($ayuda1->monto * 5) / 100) + $sumar2; ?>
                                            </tr>

                                            <?php if ($user1->fechas < '2018-04-05') {
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
//              $ayudas2 = AyudaData::getAllUsuarioFiltro($user2->idUsuario,$_GET['estado']);
                                                    $ayudas2 = AyudaData::getAllUsuario($user2->idUsuario, $ayudas_usadas->ayudas_ids, $_GET['estado']);
                                                    if (count($ayudas2) > 0) {

                                                        foreach ($ayudas2 as $ayuda2) { ?>

                                                            <tr>
                                                                <td>
                                                                    <center><?php echo $user2->nombres; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>S/. <?php echo $ayuda2->monto; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center> 2.5%</center>
                                                                </td>
                                                                <td>
                                                                    <center><b>
                                                                            S/. <?php echo ($ayuda2->monto * 2.5) / 100 ?> </b>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center><?php echo $ayuda2->fecha; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php if ($ayuda2->status == '0') { ?>
                                                                            <a class='btn btn-info btn-sm'>En
                                                                                Proceso</a>
                                                                        <?php } else if ($ayuda2->status == '1') { ?>
                                                                            <a class='btn btn-danger btn-sm'>Rechazado</a>
                                                                        <?php } else if ($ayuda2->status == '2') { ?>
                                                                            <a class='btn btn-primary btn-sm'>Asignado</a>
                                                                        <?php } else if ($ayuda2->status == '3') { ?>
                                                                            <a class='btn btn-success btn-sm'>Confirmado</a>
                                                                        <?php } else { ?>
                                                                            <a class='btn btn-danger btn-sm'
                                                                               style="background-color: black;">Rechazado</a>
                                                                        <?php }; ?>
                                                                    </center>
                                                                </td>
                                                                <?php $sumar3 = (($ayuda2->monto * 2.5) / 100) + $sumar3; ?>
                                                            </tr>

                                                            <?php if ($user2->fechas < '2018-04-05') {
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
//                      $ayudas3 = AyudaData::getAllUsuarioFiltro($user3->idUsuario,$_GET['estado']);
                                                                    $ayudas3 = AyudaData::getAllUsuario($user3->idUsuario, $ayudas_usadas->ayudas_ids, $_GET['estado']);
                                                                    if (count($ayudas3) > 0) {

                                                                        foreach ($ayudas3 as $ayuda3) { ?>

                                                                            <tr>
                                                                                <td>
                                                                                    <center><?php echo $user3->nombres; ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center>
                                                                                        S/. <?php echo $ayuda3->monto; ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center> 1%</center>
                                                                                </td>
                                                                                <td>
                                                                                    <center><b>
                                                                                            S/. <?php echo ($ayuda3->monto * 1) / 100 ?> </b>
                                                                                    </center>
                                                                                </td>
                                                                                <td>
                                                                                    <center><?php echo $ayuda3->fecha; ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center>
                                                                                        <?php if ($ayuda3->status == '0') { ?>
                                                                                            <a class='btn btn-info btn-sm'>En
                                                                                                Proceso</a>
                                                                                        <?php } else if ($ayuda3->status == '1') { ?>
                                                                                            <a class='btn btn-danger btn-sm'>Rechazado</a>
                                                                                        <?php } else if ($ayuda3->status == '2') { ?>
                                                                                            <a class='btn btn-primary btn-sm'>Asignado</a>
                                                                                        <?php } else if ($ayuda3->status == '3') { ?>
                                                                                            <a class='btn btn-success btn-sm'>Confirmado</a>
                                                                                        <?php } else if ($ayuda3->status == '4') { ?>
                                                                                            <a class='btn btn-danger btn-sm'
                                                                                               style="background-color: black;">Rechazado</a>
                                                                                        <?php }; ?>
                                                                                    </center>
                                                                                </td>
                                                                                <?php $sumar4 = (($ayuda3->monto * 1) / 100) + $sumar4; ?>
                                                                            </tr>

                                                                            <?php if ($user3->fechas < '2018-04-05') {
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
//                                $ayudas4 = AyudaData::getAllUsuarioFiltro($user4->idUsuario,$_GET['estado']);
                                                                                    $ayudas4 = AyudaData::getAllUsuario($user4->idUsuario, $ayudas_usadas->ayudas_ids, $_GET['estado']);
                                                                                    if (count($ayudas4) > 0) {

                                                                                        foreach ($ayudas3 as $ayuda4) { ?>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <center><?php echo $user4->nombres; ?></center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center>
                                                                                                        S/. <?php echo $ayuda4->monto; ?></center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center> 0.5%
                                                                                                    </center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center><b>
                                                                                                            S/. <?php echo ($ayuda4->monto * 0.5) / 100 ?> </b>
                                                                                                    </center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center><?php echo $ayuda4->fecha; ?></center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center>
                                                                                                        <?php if ($ayuda4->status == '0') { ?>
                                                                                                            <a class='btn btn-info btn-sm'>En
                                                                                                                Proceso</a>
                                                                                                        <?php } else if ($ayuda4->status == '1') { ?>
                                                                                                            <a class='btn btn-danger btn-sm'>Rechazado</a>
                                                                                                        <?php } else if ($ayuda4->status == '2') { ?>
                                                                                                            <a class='btn btn-primary btn-sm'>Asignado</a>
                                                                                                        <?php } else if ($ayuda4->status == '3') { ?>
                                                                                                            <a class='btn btn-success btn-sm'>Confirmado</a>
                                                                                                        <?php } else { ?>
                                                                                                            <a class='btn btn-danger btn-sm'
                                                                                                               style="background-color: black;">Rechazado</a>
                                                                                                        <?php }; ?>
                                                                                                    </center>
                                                                                                </td>
                                                                                                <?php $sumar5 = (($ayuda4->monto * 0.5) / 100) + $sumar5; ?>
                                                                                            </tr>

                                                                                            <?php if ($user4->fechas < '2018-04-05') {
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



            <?php $total = $sumar1 + $sumar2 + $sumar3 + $sumar4 + $sumar5; ?>

            </tbody>
            <tfoot>
            <tr>
                <td colspan="3"><b>TOTAL</b></td>
                <td colspan="3"><b>S/.<?php echo number_format($total, 2); ?></b></td>
            </tr>
            </tfoot>
        </table>
    </html>


    <?php
} else {
    include "autoload.php";
    include(dirname(__FILE__) . '/UsuarioData.php');
    include "AyudaData.php";
    ?>
    <html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
    <div class="container" align="left">


        <?php
        if (isset($_SESSION['admin'])) {
            $idd = $_SESSION['id'];

        }

        ?>

        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

            <thead>
            <tr>


                <th>
                    <center>Afiliado</center>
                </th>
                <th>
                    <center>Ayuda Brindada</center>
                </th>
                <th>
                    <center>Porcentaje</center>
                </th>
                <th>
                    <center>Ganacia</center>
                </th>
                <th>
                    <center>Fecha de Registro</center>
                </th>
                <th>
                    <center>Estado</center>
                </th>

            </tr>
            </thead>

            <tbody>

            <?php $usuario = UsuarioData::getByUsuario1($idd);

            $ayudas_usadas = AyudaData::getAyudasUsadasByIdUsuario($idd);

            $contador = 0; ?>
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
            if (count($users) > 0) {
                foreach ($users as $user) { ?>

                    <?php
                    $ayudas = AyudaData::getAllUsuario($user->idUsuario, $ayudas_usadas->ayudas_ids);
                    if (count($ayudas) > 0) {

                        foreach ($ayudas as $ayuda) { ?>

                            <tr>
                                <td>
                                    <center><?php echo $user->nombres; ?></center>
                                </td>
                                <td>
                                    <center>S/. <?php echo $ayuda->monto; ?></center>
                                </td>
                                <td>
                                    <center> 10%</center>
                                </td>
                                <td>
                                    <center><b>S/. <?php echo ($ayuda->monto * 10) / 100 ?> </b></center>
                                </td>
                                <td>
                                    <center><?php echo $ayuda->fecha; ?></center>
                                </td>

                                <td>
                                    <center>
                                        <?php if ($ayuda->status == '0') { ?>
                                            <a class='btn btn-info btn-sm'>En Proceso</a>
                                        <?php } else if ($ayuda->status == '1') { ?>
                                            <a class='btn btn-danger btn-sm'>Rechazado</a>
                                        <?php } else if ($ayuda->status == '2') { ?>
                                            <a class='btn btn-primary btn-sm'>Asignado</a>
                                        <?php } else if ($ayuda->status == '3') { ?>
                                            <a class='btn btn-success btn-sm'>Confirmado</a>
                                        <?php } else { ?>
                                            <a class='btn btn-danger btn-sm'
                                               style="background-color: black;">Rechazado</a>
                                        <?php }; ?>

                                    </center>
                                </td>

                                <?php $sumar1 = (($ayuda->monto * 10) / 100) + $sumar1; ?>
                            </tr>


                        <?php } ?>
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
                                    $ayudas1 = AyudaData::getAllUsuario($user1->idUsuario, $ayudas_usadas->ayudas_ids);
                                    if (count($ayudas1) > 0) {
                                        foreach ($ayudas1 as $ayuda1) {
                                            ?>

                                            <tr>
                                                <td>
                                                    <center><?php echo $user1->nombres; ?></center>
                                                </td>
                                                <td>
                                                    <center>S/. <?php echo $ayuda1->monto; ?></center>
                                                </td>
                                                <td>
                                                    <center> 5%</center>
                                                </td>
                                                <td>
                                                    <center><b> S/. <?php echo ($ayuda1->monto * 5) / 100 ?> </b>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center><?php echo $ayuda1->fecha; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <?php if ($ayuda1->status == '0') { ?>
                                                            <a class='btn btn-info btn-sm'>En Proceso</a>
                                                        <?php } else if ($ayuda1->status == '1') { ?>
                                                            <a class='btn btn-danger btn-sm'>Rechazado</a>
                                                        <?php } else if ($ayuda1->status == '2') { ?>
                                                            <a class='btn btn-primary btn-sm'>Asignado</a>
                                                        <?php } else if ($ayuda1->status == '3') { ?>
                                                            <a class='btn btn-success btn-sm'>Confirmado</a>
                                                        <?php } else { ?>
                                                            <a class='btn btn-danger btn-sm'
                                                               style="background-color: black;">Rechazado</a>
                                                        <?php }; ?>
                                                    </center>
                                                </td>
                                                <?php $sumar2 = (($ayuda1->monto * 5) / 100) + $sumar2; ?>
                                            </tr>

                                            <?php if ($user1->fechas < '2018-04-05') {
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
                                                    $ayudas2 = AyudaData::getAllUsuario($user2->idUsuario, $ayudas_usadas->ayudas_ids);
                                                    if (count($ayudas2) > 0) {

                                                        foreach ($ayudas2 as $ayuda2) { ?>

                                                            <tr>
                                                                <td>
                                                                    <center><?php echo $user2->nombres; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>S/. <?php echo $ayuda2->monto; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center> 2.5%</center>
                                                                </td>
                                                                <td>
                                                                    <center><b>
                                                                            S/. <?php echo ($ayuda2->monto * 2.5) / 100 ?> </b>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center><?php echo $ayuda2->fecha; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php if ($ayuda2->status == '0') { ?>
                                                                            <a class='btn btn-info btn-sm'>En
                                                                                Proceso</a>
                                                                        <?php } else if ($ayuda2->status == '1') { ?>
                                                                            <a class='btn btn-danger btn-sm'>Rechazado</a>
                                                                        <?php } else if ($ayuda2->status == '2') { ?>
                                                                            <a class='btn btn-primary btn-sm'>Asignado</a>
                                                                        <?php } else if ($ayuda2->status == '3') { ?>
                                                                            <a class='btn btn-success btn-sm'>Confirmado</a>
                                                                        <?php } else { ?>
                                                                            <a class='btn btn-danger btn-sm'
                                                                               style="background-color: black;">Rechazado</a>
                                                                        <?php }; ?>
                                                                    </center>
                                                                </td>
                                                                <?php $sumar3 = (($ayuda2->monto * 2.5) / 100) + $sumar3; ?>
                                                            </tr>

                                                            <?php if ($user2->fechas < '2018-04-05') {
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
                                                                    $ayudas3 = AyudaData::getAllUsuario($user3->idUsuario, $ayudas_usadas->ayudas_ids);
                                                                    if (count($ayudas3) > 0) {

                                                                        foreach ($ayudas3 as $ayuda3) { ?>

                                                                            <tr>
                                                                                <td>
                                                                                    <center><?php echo $user3->nombres; ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center>
                                                                                        S/. <?php echo $ayuda3->monto; ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center> 1%</center>
                                                                                </td>
                                                                                <td>
                                                                                    <center><b>
                                                                                            S/. <?php echo ($ayuda3->monto * 1) / 100 ?> </b>
                                                                                    </center>
                                                                                </td>
                                                                                <td>
                                                                                    <center><?php echo $ayuda3->fecha; ?></center>
                                                                                </td>
                                                                                <td>
                                                                                    <center>
                                                                                        <?php if ($ayuda3->status == '0') { ?>
                                                                                            <a class='btn btn-info btn-sm'>En
                                                                                                Proceso</a>
                                                                                        <?php } else if ($ayuda3->status == '1') { ?>
                                                                                            <a class='btn btn-danger btn-sm'>Rechazado</a>
                                                                                        <?php } else if ($ayuda3->status == '2') { ?>
                                                                                            <a class='btn btn-primary btn-sm'>Asignado</a>
                                                                                        <?php } else if ($ayuda3->status == '3') { ?>
                                                                                            <a class='btn btn-success btn-sm'>Confirmado</a>
                                                                                        <?php } else if ($ayuda3->status == '4') { ?>
                                                                                            <a class='btn btn-danger btn-sm'
                                                                                               style="background-color: black;">Rechazado</a>
                                                                                        <?php }; ?>
                                                                                    </center>
                                                                                </td>
                                                                                <?php $sumar4 = (($ayuda3->monto * 1) / 100) + $sumar4; ?>
                                                                            </tr>

                                                                            <?php if ($user3->fechas < '2018-04-05') {
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
                                                                                    $ayudas4 = AyudaData::getAllUsuario($user4->idUsuario, $ayudas_usadas->ayudas_ids);
                                                                                    if (count($ayudas4) > 0) {

                                                                                        foreach ($ayudas3 as $ayuda4) { ?>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <center><?php echo $user4->nombres; ?></center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center>
                                                                                                        S/. <?php echo $ayuda4->monto; ?></center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center> 0.5%
                                                                                                    </center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center><b>
                                                                                                            S/. <?php echo ($ayuda4->monto * 0.5) / 100 ?> </b>
                                                                                                    </center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center><?php echo $ayuda4->fecha; ?></center>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <center>
                                                                                                        <?php if ($ayuda4->status == '0') { ?>
                                                                                                            <a class='btn btn-info btn-sm'>En
                                                                                                                Proceso</a>
                                                                                                        <?php } else if ($ayuda4->status == '1') { ?>
                                                                                                            <a class='btn btn-danger btn-sm'>Rechazado</a>
                                                                                                        <?php } else if ($ayuda4->status == '2') { ?>
                                                                                                            <a class='btn btn-primary btn-sm'>Asignado</a>
                                                                                                        <?php } else if ($ayuda4->status == '3') { ?>
                                                                                                            <a class='btn btn-success btn-sm'>Confirmado</a>
                                                                                                        <?php } else { ?>
                                                                                                            <a class='btn btn-danger btn-sm'
                                                                                                               style="background-color: black;">Rechazado</a>
                                                                                                        <?php }; ?>
                                                                                                    </center>
                                                                                                </td>
                                                                                                <?php $sumar5 = (($ayuda4->monto * 0.5) / 100) + $sumar5; ?>
                                                                                            </tr>

                                                                                            <?php if ($user4->fechas < '2018-04-05') {
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



            <?php $total = $sumar1 + $sumar2 + $sumar3 + $sumar4 + $sumar5; ?>

            </tbody>
            <tfoot>
            <tr>
                <td colspan="3"><b>TOTAL</b></td>
                <td colspan="3"><b>S/.<?php echo number_format($total, 2); ?></b></td>
            </tr>
            </tfoot>
        </table>
    </html>


<?php } ?>