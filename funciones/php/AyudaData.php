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

    public static function getAllUsuario($id, $ayudas_ids=null,$estado=null){
        $sql = "select * from ".self::$tablename." where id_usuario=$id and para_consumir>0 ";
        if(!empty($ayudas_ids)){
            $sql = $sql . " and id not in ($ayudas_ids) ";
        }
        if ($estado){
            $sql = $sql . "and status=$estado ";
        }

        $query = Executor::doit($sql);
        return Model::many($query[0],new AyudaData());
    }


    public function update(){
        $sql = "update ".self::$tablename." set estado=1 where id=$this->id";
        Executor::doit($sql);
    }

    public function getByAyuda($id){
        $sql = "select * from ".self::$tablename." where id_usuario=$id order by id desc ";
        $query = Executor::doit($sql);
        return Model::one($query[0],new AyudaData());

    }
    public function getAllAle($limit){
        $sql = "select * from ".self::$tablename."  ORDER BY RAND() LIMIT $limit ";
        $query = Executor::doit($sql);
        return Model::many($query[0],new AyudaData());
    }

    public function getAllUsuarioFiltro($id,$estado){
        $sql = "select * from ".self::$tablename." where id_usuario=$id and status=$estado ";
        $query = Executor::doit($sql);
        return Model::many($query[0],new AyudaData());
    }

    public static function getTotalAyuda($id_user_recibe){
//        $users_brindan = implode(',',$users_brindan);
        $sql = "select sum(para_consumir) as disponible from ".self::$tablename." where para_consumir>0 and 
        (estado=0 or estado=2) and id_usuario <>$id_user_recibe order by id asc";
        $query = Executor::doit($sql);

        $sql2 = "select * from ".self::$tablename." where para_consumir>0 and (estado=0 or estado=2) 
        and id_usuario <>$id_user_recibe ORDER BY id asc";
        $query2 = Executor::doit($sql2);
        return array('total'=>Model::many($query[0],new AyudaData()),'ayudas'=>Model::many($query2[0],new AyudaData())) ;
    }

    public static function getAyudasUsadasByIdUsuario($idd){
        $sql = "SELECT group_concat(DISTINCT(id_tblayuda)) as ayudas_ids from bonos_cobrados  where id_user_cobra=$idd and estado=1";
        $query = Executor::doit($sql);
        return Model::one($query[0],new AyudaData());
    }

    public function rechazarValidacionTransaccion($id){
        $sql = "update ayudas_transacciones set validar=2 where id=$id";
        Executor::doit($sql);
    }

}