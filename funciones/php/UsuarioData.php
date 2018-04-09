<?php
class UsuarioData {
	public static $tablename = "tblusuarios";

	public function UsuarioData(){
		$this->nombres = "";

	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where idUsuario=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UsuarioData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UsuarioData());
	}

	public static function getByUsuario($id){
		$sql = "select * from ".self::$tablename." where idUsuario=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UsuarioData());
	}

	public static function getAllUsuario($id){
		$sql = "select * from ".self::$tablename." where id_patrocinador=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UsuarioData());
	}

	// select tblusuarios.nombres,tblayuda.monto from tblusuarios inner JOIN tblayuda on tblusuarios.idUsuario=tblayuda.id_usuario where tblusuarios.id_patrocinador=6

	public static function getAllAfiliados($id){
		$sql = "select * from ".self::$tablename." where id_patrocinador=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UsuarioData());
	}


	public static function getByUsuario1($id){
		$sql = "select * from ".self::$tablename." where idUsuario=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UsuarioData());
	}

    public static function getByPatrocinador($id){
        $sql = "select * from ".self::$tablename." where idUsuario=$id ";
        $query = Executor::doit($sql);
        return Model::one($query[0],new UsuarioData());
    }

}