<?php
class BrindarAyudaData {
	public static $tablename = "brindar_ayuda";

	public function BrindarAyudaData(){
		

	}

	public function getUsuario(){ return UsuarioData::getById($this->id_user_ayuda);}
	public function getUsuario2(){ return UsuarioData::getById($this->id_user_recibe);}

	public function add(){
		$sql = "insert into ".self::$tablename." (usu_brinda,usu_recibe,monto,fecha,ultimo) ";
		$sql .= "value ($this->usu_brinda,$this->usu_recibe,$this->monto,NOW(),$this->ultimo )";
		return Executor::doit($sql);
	}

	public function update(){
		$sql = "update ayudas_transacciones set foto=\"$this->foto\",fecha_final=\"$this->fecha_final\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateValidar(){
		$sql = "update ayudas_transacciones set validar=1 where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ayudas_transacciones where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BrindarAyudaData());

	}
	public static function getByAyuda($ayuda){
		$sql = "select * from ayudas_transacciones where id_user_ayuda= $ayuda->id_user_ayuda and id_tblayuda=$ayuda->id_tblayuda
		and id_user_recibe=$ayuda->id_user_recibe and created_at = $ayuda->created_at and status=1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BrindarAyudaData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new BrindarAyudaData());
	}
	public static function getByUser($id){
		$sql = "select * from ayudas_transacciones where id_user_recibe=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BrindarAyudaData());
	}


	public static function getByUserBrinda($id){
		$sql = "select * from ayudas_transacciones where id_user_ayuda=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BrindarAyudaData());
	}

	


}

?>