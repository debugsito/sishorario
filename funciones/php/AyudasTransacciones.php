<?php
class AyudasTransacciones {
	public static $tablename = "ayudas_transacciones";

	public function AyudaData(){
		$this->monto = "";

	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AyudaData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new AyudaData());
	}

	public static function getAllUsuario($id){
		$sql = "select * from ".self::$tablename." where id_usuario=$id and bono_consumido=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AyudaData());
	}

	public function update(){
		$sql = "update ".self::$tablename." set estado=1 where id=$this->id";
		Executor::doit($sql);
	}

	public function crearTransaccion($ayuda,$monto,$id_recibe, $queda_disponible, $estado){
//        estado =  0->no ha sido tomado 1->ha sido tomado 2-> ha sido tomado parcialmente
//            status = 0->en proceso 1-> rechazado 2-> asignado 3->confirmado
        $sql = "update tblayuda set bono_consumido=1, para_consumir=$queda_disponible, status=2, estado = $estado  where id=$ayuda->id";
        Executor::doit($sql);

	    $sql = "insert into ".self::$tablename." (id_user_ayuda,id_tblayuda,monto,id_user_recibe) values (
        $ayuda->id_usuario, $ayuda->id, $monto, $id_recibe
        )";
        Executor::doit($sql);


    }

}