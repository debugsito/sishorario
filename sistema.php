<!doctype html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>

<?php
include "autoload.php";
include "funciones/php/UsuarioData.php";
include "AyudaData.php";
include "BrindarAyudaData.php";
?>
<script type="text/javascript" src="js/ficha.js"></script>
<div class="card">
    <?php if (isset($_SESSION['admin'])): ?>
    <div class="card-header" data-background-color="green-dark">
        <?php endif; ?>
        <?php if (isset($_SESSION['instructor'])): ?>
        <div class="card-header" data-background-color="orange">
            <?php endif; ?>
            <head>
                <link rel="stylesheet" href="css/alertify.core.css"/>
                <link rel="stylesheet" href="css/alertify.default.css"/>
                <script src="js/alertify.js"></script>
                <style type="text/css">
                    .ver {
                        display: block;
                    }

                    .nover {
                        display: none;
                    }

                </style>
            </head>
            <?php
            if (isset($_SESSION['admin'])) {
                $idd = $_SESSION['id'];

            }

            ?>

            <?php

            $conexion = mysqli_connect('localhost', 'root', 'root', 'sishorario');

            $sql = "SELECT * from tblayuda where id_usuario=$idd  ";
            $result = mysqli_query($conexion, $sql);

            $numero = 0;
            if (count($result) > 0) {
                ?>


                <?php

                while ($mostrar = mysqli_fetch_array($result)) {

                    $numero = $numero + 1;
                };

            } else {
                "";
                $numero = 0;
            }
            ?>


            <h3 class="title"><i class="fa fa-desktop" aria-hidden="true"></i> PLATAFORMA</h3>

        </div>

        <style>
            body {
                text-align: left;
                font-family: sans-serif;
                font-weight: normal;
            }

            h1 {
                color: #fff;
                font-weight: 100;
                font-size: 40px;
                margin: 40px 0px 20px;
            }

            .contador {
                font-family: sans-serif;
                color: #fff;
                display: inline-block;
                font-weight: normal;
                text-align: center;
                font-size: 30px;
            }

            .contador > div {
                padding: 1px;
                border-radius: 7px;
                background: #076fa9;
                display: inline-block;

            }

            .contador div > span {
                padding: 2px;
                border-radius: 3px;
                background: rgba(57, 68, 84, 0.27);
                display: inline-block;
            }

            .texto {
                padding-top: 5px;
                font-size: 16px;
            }
        </style>
        </head>
        <br>

        <?php
        $bridas_ayudas = AyudaData::getAllAyudaUltimo($idd);
        $contador_fecha = 0;

        $conta_numero = 0;

        if ($numero != 0) {
            ?>
            <?php

            $conexion = mysqli_connect('localhost', 'root', 'root', 'sishorario');

            $sql21 = "SELECT * from tblayuda where id_usuario=$idd order by id desc limit 1  ";
            $result21 = mysqli_query($conexion, $sql21);

            while ($mostrar21 = mysqli_fetch_array($result21)) {
                $id21 = $mostrar21["id"];
                $fecha21 = $mostrar21["fecha"];
                $conta_numero = $conta_numero + 1;

            }


            $mod_date21 = strtotime($fecha21 . "+ 20 days");
            $fecha_inicial1 = date("Y-m-d H:i:s", $mod_date21);

            $date1 = new DateTime("$fecha_inicial1");
            $date2 = new DateTime("now");
            $diff = $date1->diff($date2);

            $diff_brindar = $date2->diff($date1);

// 38 minutes to go [number is variable]
            $contador_fecha = (($diff->days * 24) * 60) + ($diff->i);
        }
        ?>


        <div class="card-content table-responsive">
            <?php if ($conta_numero != 0) { ?>
                <a href="#" class="btn btn-warning"
                   data-toggle="modal" <?php if (!empty($diff_brindar->invert) or $diff_brindar->invert == 1) { ?>  data-target="#ModalRegistroRegional"  <?php } else { ?> disable <?php }; ?> ><i
                            class="fa fa-child" aria-hidden="true"></i> Brindar Ayuda</a>
            <?php } else { ?>
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#ModalRegistroRegional"
                <i class="fa fa-child" aria-hidden="true"></i>  Brindar Ayuda</a>
            <?php } ?>
            <br><br><br><br>


            <?php
            $monto = 0;
            $conexion = mysqli_connect('localhost', 'root', 'root', 'sishorario');

            $sql = "SELECT * from tblayuda where id_usuario=$idd order by id desc limit 1  ";
            $result = mysqli_query($conexion, $sql);


            if (count($result) > 0) {
                ?>
                <style type="text/css">
                    body {
                        background-color: #f6f6ff;
                        font-family: Calibri, Myriad;
                    }

                    #main {
                        width: 780px;
                        padding: 20px;
                        margin: auto;
                    }

                    table.timecard {
                        margin: auto;
                        width: 600px;
                        border-collapse: collapse;
                        border: 1px solid #fff; /*for older IE*/
                        border-style: hidden;
                    }

                    table.timecard caption {
                        background-color: #f79646;
                        color: #fff;
                        font-size: x-large;
                        font-weight: bold;
                        letter-spacing: .3em;
                    }

                    table.timecard thead th {
                        padding: 8px;
                        background-color: #fde9d9;
                        font-size: large;
                    }

                    table.timecard thead th#thDay {
                        width: 40%;
                    }

                    table.timecard thead th#thRegular, table.timecard thead th#thOvertime, table.timecard thead th#thTotal {
                        width: 20%;
                    }

                    table.timecard th, table.timecard td {
                        padding: 3px;
                        border-width: 1px;
                        border-style: solid;
                        border-color: #f79646 #ccc;
                    }

                    table.timecard td {
                        text-align: right;
                    }

                    table.timecard tbody th {
                        text-align: left;
                        font-weight: normal;
                    }

                    table.timecard tfoot {
                        font-weight: bold;
                        font-size: large;
                        background-color: #687886;
                        color: #fff;
                    }

                    table.timecard tr.even {
                        background-color: #fde9d9;
                    }
                </style>


                <?php

                if (count($bridas_ayudas) > 0) {

                    ?>
                    <?php
                    foreach ($bridas_ayudas as $brida_ayuda): ?>
                        <?php
                        $id = $brida_ayuda->id;
                        $monto = $brida_ayuda->monto;
                        $fecha = $brida_ayuda->fecha;
                        ?>

                        <div class="col-md-6" style="padding-bottom: 50px;">
                            <table class="timecard" style="width:100%">
                                <tr>
                                    <td>
                                        <center><b>ELIMINAR AYUDA :</b></center>
                                    </td>
                                    <td>
                                        <center><?php echo "<a class='btn btn-danger btn-sm' href='funciones/php/eliminar.php?id=" . $id . "'><i class='material-icons'>delete_forever</i></a>"; ?> </center>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <center><b>MONTO BRINDADO : </b></center>
                                    </td>
                                    <td>
                                        <center><b>S/. <?php echo $monto; ?></b></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <center><b>FECHA :</b></center>
                                    </td>
                                    <td>
                                        <center><b><?php echo $fecha; ?></b></center>
                                    </td>
                                </tr>

                                <?php if ($numero != 0) {
                                    date_default_timezone_set('America/Lima');
                                    $date = date("Y-m-d H:i:s");
//Incrementando 2 dias

                                    $mod_date = strtotime($fecha . "+ 30 days");
                                    $fecha_finish = date("Y-m-d H:i:s", $mod_date) . "\n";
                                    $fini = date("Y-m-d H:i:s", $mod_date);

                                    $fecha1 = new DateTime("$fecha_finish");
                                    $fecha2 = new DateTime("$date");
                                    $fecha = $fecha1->diff($fecha2);

                                    $diff_condicion_brindar = $fecha2->diff($fecha1);

                                    //var_dump($id); exit;
                                    //$existe_ayuda = AyudaData::existeAyuda($id);
                                    if ($diff_condicion_brindar->invert == 1 && $brida_ayuda->usada==0) {
                                        echo "<h3 style='color:orange'><center><b>¡Ya puede solicitar ayuda!</b></center></h3>";
                                        } else if( $brida_ayuda->usada==1) {
echo "<h3 style='color:orange'><center><b>¡Usted ya solicitó ayuda!</b></center></h3>";
                                    } else {
                                        ?>

                                        <center>
                                            <div class="contador"
                                                 data-until="<?php date_default_timezone_set('America/Lima');
                                                 echo strtotime($fini); ?>" data-done="¡No brindó ayuda!" data-respond>

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

                                    <?php } ?>


                                <?php }; ?>

                            </table>


                        </div>

                    <?php endforeach; ?>
                <?php } else {
                }; ?>


                <?php


            } else {
                "";;
            }
            ?>


            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------->
            <link rel='stylesheet' id='main-style-css' href='css/estilos2.css' type='text/css' media='all'/>

            <script type='text/javascript' src='jquery/jquery-1.11.1.min.js'></script>
            <script type='text/javascript' src='jquery/jquery-migrate-1.2.1.min.js'></script>
            <script type='text/javascript' src='jquery/jquery.plugins.js'></script>
            <script type='text/javascript' src='jquery/mediaelement-and-player.min.js'></script>
            <script type='text/javascript' src='jquery/contador.js'></script>


            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------->
            <br><br>

            <div class="table" align="center">
                <br><br>
                <?php
                include 'funciones/php/tablaRegional.php';
                ?>
            </div>

        </div>


        <div class="card-content table-responsive">
        <?php

         if (count($bridas_ayudas) > 0) {

             if ($diff_condicion_brindar->invert == 1 && $bridas_ayudas[0]->usada==0) { ?>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ModalRegistroAyuda"
                   id="btnRegistrarAyuda" onClick="this.disabled=false"><i class="fa fa-handshake-o"
                                                                           aria-hidden="true"></i>
                    Solicitar Ayuda</a>
            <?php } } ?>
            <br><br>
            <div class="table" align="center">
                <?php
                include 'funciones/php/tablayudarecep.php';
                ?>
            </div>

        </div>

    </div>


    <?php
    include 'views/logic/footer.php';
    ?>
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <?php
    include 'views/logic/aviso.php';
    ?>
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <div class="modal fade" id="ModalRegistroRegional" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="overflow : auto;">
                <div class="modal-header" style="height: 800px;">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 class="modal-title"><i class="fa fa-money" aria-hidden="true"></i><b> MoneyWork | Brindar
                            Ayuda</b></h4>
                    <hr/>
                    <div class="card-content">

                        <div class="alert alert-warning" role="alert">
                            <h4><i class="fa fa-bell" aria-hidden="true"> "Estimado participante recuerde que en su
                                    próxima ayuda brindará como monto mínimo la ayuda abonada en su anterior
                                    participación . " </i></h4>

                            <h4><i class="fa fa-bell" aria-hidden="true"> "Estimado participante , recuerde que solo
                                    puede brindar ayuda en múltiplos de 10 . Por ejemplo : (S/.50.00, S/.60.00,
                                    S/.70.00, S/.80.00, ...) ." </i></h4>
                        </div>

                        <form action="RegistrarAyuda.php" method="POST" name="form1" onsubmit="return validacion()">

                            <b> Monto a dar Ayuda : </b> <input name="montos" type="number" placeholder=" S/."
                                                                required="" id="montos">

                            <input name="id_usuario" type="hidden" required="" value="<?php echo $idd; ?>"
                                   placeholder=" ">

                            <input name="numeros" type="hidden" id="numeros" value="<?php echo $numero; ?>">


                            <input name="finales" type="hidden" id="finales" value="<?php echo $monto; ?>">


                            <br><br>


                            <script type="text/javascript">
                                $(document).ready(function () { // Script del menú con pestañas
                                    $('#contenido_pestanas div').css('position', 'absolute').not(':first').hide();
                                    $('#contenido_pestanas ul li:first a').addClass('aqui');
                                    $('#contenido_pestanas a').click(function () {
                                        $('#contenido_pestanas a').removeClass('aqui');
                                        $(this).addClass('aqui');
                                        $('#contenido_pestanas div').fadeOut(350).filter(this.hash).fadeIn(350);
                                        return false;

                                    });
                                });
                            </script>


                            <div id="contenido_pestanas" class="table-responsive" align="center">
                                <ul class="nav nav-tabs">
                                    <center>
                                        <li><a href="#contenedor" title="Ayudas"><font color="white">&because; AYUDAS
                                                    &because;</font></a></li>
                                    </center>
                                    <center>
                                        <li><a href="#contenedor2" title="Bonos"><font color="white">&because; BONOS
                                                    &because;</font></a></li>
                                    </center>

                                </ul>

                                <br>


                                <div class="table" id="contenedor">
                                    <?php
                                    include 'funciones/php/ayuda_money.php';
                                    ?>
                                </div>

                                <div class="table" id="contenedor2">
                                    <?php
                                    include 'funciones/php/bonos_money.php';
                                    ?>
                                </div>

                            </div>


                            <div class="form-group " align="center" style="overflow : auto;">

                                <style>
                                    .center {
                                        text-align: center;
                                        border: 3px solid white;
                                    }
                                </style>


                                <div align="center">
                                    <input type="radio" style="margin-top: 300px;" name="condicion" value="1"
                                           required=""><b> He leído y acepto las </b><a data-toggle="modal"
                                                                                        href="#myModal"><b>políticas y
                                            procedimientos .</b></a>

                                </div>
                                <?php

                                if ($puede_brindar_ayuda){ ?>
                                <button class="btn btn-warning" type="submit" style=" margin-top: 18px;"><i
                                            class="fa fa-child"></i><b> Brindar Ayuda</b></button>
                                <?php } else {
                                    echo "<br><a class='btn btn-danger btn-sm'>Tiene que concretar sus ayudas pendientes para continuar</a>";
                                } ?>

                        </form>


                    </div>


                </div>


            </div>
        </div>
        <!-- Modal content-->
    </div>

</div>

<!-- Aqui termina el modal numero uno-->

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="myModal" role="dialog" style="overflow : auto;">
    <div class="modal-dialog">

        <!-- Políticas -->
        <div class="modal-content">
            <div class="modal-header" style=" background-image: url('images/esy.png');  background-color: #cccccc;">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h5 class="modal-title"><b>POLÍTICA | MONEYWORK &copy;</b></h5>
                <div class="modal-body">
                    <font color="black">
                        <center><b>"
                                MONEYWORK es una comunidad de ayuda mutua , no somos una empresa de inversiones , no
                                somos una red de mercadeo , no brindamos ningún servicio ni tampoco vendemos productos .
                                MONEYWORK tiene como finalidad ayudar económicamente a quienes lo requieran con el
                                propósito de dar para para recibir . Al tratarse de una donación voluntaria , MONEYWORK
                                no
                                garantiza retorno alguno, ya que es una donación . MONEYWORK es una comunidad conocida
                                como CROWDFUNDING. Por favor realice la donación con el monto que crea conveniente y que
                                no pueda afectar su economía ."</b>
                            <center>
                    </font>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Fin políticas-->

<!-- Aqui empieza la venta modal del numero dos-->


<div class="modal fade" id="ModalRegistroAyuda" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>

                <h4 class="modal-title"><i class="fa fa-money" aria-hidden="true"></i><b> MoneyWork | Solicitar
                        Ayuda</b></h4>
            </div>
            <div class="card-content">

                <form action="RecibirAyuda.php" method="POST">
                    <div class="tables" align="center">
                        <?php
                        include 'funciones/php/tablarecibirayuda.php';
                        ?>
                        <input type="hidden" name="id_recibe" value="<?php echo $idd; ?>">
                    </div>
                    <br>
                    
                    <center><button class="btn btn-info" type="submit"><i class="fa fa-handshake-o"></i><b> Solicitar Ayuda</b></center>
                    </button>
                </form>
            </div>

        </div>
        <!-- Modal content-->
    </div>

</div> <!-- Aqui termina el modal numero uno-->


</html>