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

    public static function getAllUsuarioIds($id){
        $sql = "select idUsuario from ".self::$tablename." where id_patrocinador=$id";
        $query = Executor::doit($sql);
        $result = Model::many($query[0],new UsuarioData());
        $ids= [];
        foreach ($result as $row){
            $ids[]=$row->idUsuario;
        }
        return$ids;
    }


}

?>