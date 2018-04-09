<?php
class UsuarioData {
	public static $tablename = "tblusuarios";

	public function UsuarioData(){
		$this->nombres = "";

	}



	public static function getById($id){
		$sql = "select * from ".self::$tablename." where idUsuario=$id ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UsuarioData());
	}

	public static function getByPatrocinador($id){
		$sql = "select * from ".self::$tablename." where idUsuario=$id ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UsuarioData());
	}

	public function updateEstado(){
		$sql = "update ".self::$tablename." set estado=1 where idUsuario=$this->idUsuario";
		Executor::doit($sql);
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UsuarioData());
	}



	public static function getByUsuario(){
		$sql = "select * from ".self::$tablename." where idUsuario=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UsuarioData());
	}

	public static function getAllUsuario($id){
		$sql = "select * from ".self::$tablename." where id_patrocinador=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UsuarioData());
	}


}

?>