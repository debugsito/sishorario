<?php
class BancosData {
	public static $tablename = "bancos";

	public function BancosData(){
		$this->entidad = "";

	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_banco=$id ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BancosData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new BancosData());
	}

	
	
}

?>