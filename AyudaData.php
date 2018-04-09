<?php
class AyudaData {
	public static $tablename = "tblayuda";

	public function AyudaData(){
		$this->monto = "";

	}

	public function getUsuario(){ return UsuarioData::getById($this->id_usuario);}

	public function update(){
		$sql = "update ".self::$tablename." set estado=1 where id=$this->id";
		Executor::doit($sql);
	}

	public function updateStatus(){
		$sql = "update ".self::$tablename." set status=$this->status where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AyudaData());

	}

	public static function getByIdAyda($id){
		$sql = "select * from ".self::$tablename." where id_usuario=$id";
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

	public static function getAllUsuarioFiltro($id,$estado){
		$sql = "select * from ".self::$tablename." where id_usuario=$id and status=$estado ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AyudaData());
	}

	public static function getTotalAyuda($users_brindan){
        $users_brindan = implode(',',$users_brindan);
        $sql = "select sum(para_consumir) as disponible from ".self::$tablename." where para_consumir>0 and id_usuario in ($users_brindan) and estado=0";
		$sql2 = "select * from ".self::$tablename." where para_consumir>0 and estado=0  and id_usuario in ($users_brindan) ORDER BY RAND()";
		$query = Executor::doit($sql);
		$query2 = Executor::doit($sql2);
		return array('total'=>Model::many($query[0],new AyudaData()),'ayudas'=>Model::many($query2[0],new AyudaData())) ;
	}

	public static function getByMontoSuma2($monto){
		$sql = "select * from ".self::$tablename." where monto=$monto and estado=0 limit 1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AyudaData());
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

	public static function getAllAyudaUltimo($id_usuario){
		$sql = "select * from ".self::$tablename." where id_usuario=$id_usuario ORDER BY fecha desc LIMIT 2 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AyudaData());
	}

	






}

?>