<?php
class AyudaData {
	public static $tablename = "tblayuda";

	public function AyudaData(){
		$this->monto = "";

	}

	public function getUsuario(){ return UsuarioData::getById($this->id_usuario);}

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

	public static function getByAyuda($id){
		$sql = "select * from ".self::$tablename." where id_usuario=$id order by id desc ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AyudaData());

	}
	public static function getAllAle($limit){
		$sql = "select * from ".self::$tablename."  ORDER BY RAND() LIMIT $limit ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AyudaData());
	}

	public static function getAllUsuarioFiltro($id,$estado){
		$sql = "select * from ".self::$tablename." where id_usuario=$id and status=$estado ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AyudaData());
	}

    public static function getTotalAyuda(){
        $sql = "select * from ".self::$tablename." where para_consumir>0 and estado=0";
        $query = Executor::doit($sql);
        return Model::many($query[0],new AyudaData());
    }



}

?>