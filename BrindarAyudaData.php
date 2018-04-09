<?php
class BrindarAyudaData {
	public static $tablename = "brindar_ayuda";

	public function BrindarAyudaData(){
		

	}

	public function getUsuario(){ return UsuarioData::getById($this->usu_brinda);}
	public function getUsuario2(){ return UsuarioData::getById($this->usu_recibe);}

	public function add(){
		$sql = "insert into ".self::$tablename." (usu_brinda,usu_recibe,monto,fecha,ultimo) ";
		$sql .= "value ($this->usu_brinda,$this->usu_recibe,$this->monto,NOW(),$this->ultimo )";
		return Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set foto=\"$this->foto\",fecha_fini=\"$this->fecha_fini\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateValidar(){
		$sql = "update ".self::$tablename." set validar=1 where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BrindarAyudaData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new BrindarAyudaData());
	}
	public static function getByUser($id){
		$sql = "select * from ".self::$tablename." where usu_recibe=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BrindarAyudaData());
	}


	public static function getByUserBrinda($id){
		$sql = "select * from ".self::$tablename." where usu_brinda=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BrindarAyudaData());
	}

	


}

?>