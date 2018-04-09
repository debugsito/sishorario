<?php
class TblBancosData {
	public static $tablename = "tblbanco";

	public function TblBancosData(){
		$this->n_cuenta = "";

	}

	public function getEntidad(){ return BancosData::getById($this->id_entidad);}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TblBancosData());

	}

	public static function getByIdUser($iduser){
		$sql = "select * from ".self::$tablename." where id_userba=$iduser ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TblBancosData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new TblBancosData());
	}

	
	
}

?>