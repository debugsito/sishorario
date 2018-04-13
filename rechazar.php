<?php

include "autoload.php";
include "UsuarioData.php";
include "AyudaData.php";
include "BrindarAyudaData.php";
include "BancosData.php";
include "TblBancosData.php";
include "funciones/php/AyudasTransacciones.php";
//id usuario que ayudo
$id = $_GET["id"];
$id_ayuda = $_GET["id_ayuda"];

$rechazar = UsuarioData::getById($_GET["id"]);

$rechazar->updateEstado();

//$ayuda = AyudaData::getByIdAyda($_GET['id_ayuda']);
$ayuda_transaccion = AyudaData::getByIdAyda($_GET['id_ayuda']);
//2 rechazado
$ayuda_transaccion->validar=2;
$ayuda_transaccion->updateStatus();

$ayudas = AyudaData::getTotalAyuda($id);
$total_ayuda = $ayudas['total'][0]->disponible;
$ayudas = $ayudas['ayudas'];
$monto = (double)$ayuda_transaccion->monto;
if($total_ayuda> $monto ){
    foreach ($ayudas as $ayuda){

        $disponible = (double)$ayuda->para_consumir;
        //        estado =  0->no ha sido tomado 1->ha sido tomado 2-> ha sido tomado parcialmente
        if($disponible < $monto ){
            //el ultimo es lo que queda para consumir
            AyudasTransacciones::crearTransaccion($ayuda,$disponible,$ayuda_transaccion->id_user_recibe,0,1,$ayuda_transaccion->id_tblayuda);
            $monto=$monto-$disponible;
        }elseif ($disponible == $monto){
            AyudasTransacciones::crearTransaccion($ayuda,$monto,$ayuda_transaccion->id_user_recibe,0 ,1,$ayuda_transaccion->id_tblayuda);
            $monto=$monto-$disponible;
            break;
        }else{
            AyudasTransacciones::crearTransaccion($ayuda,$monto,$ayuda_transaccion->id_user_recibe,$disponible-$monto,2,
                $ayuda_transaccion->id_tblayuda);
            $monto = 0;
            break;
        }
    }?>
    <script type="text/javascript">alert('Voucher rechazado y ayuda reasignada...')</script>
    <script>window.location.replace('sistema.php');</script>
    <?php
}else{ ?>
    <script type="text/javascript">alert('No hay suficiente dinero para asignarle otro usuario, por favor contacte al administrador...')</script>
    <script>window.location.replace('sistema.php');</script>
<?php
}

 ?>