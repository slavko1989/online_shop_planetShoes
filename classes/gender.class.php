<?php
include_once(__DIR__ ."../../classes/model.class.php");

class G_Controller extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_gender(){
        $stmt =  $this->get_db()->prepare("select * from for_who");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_gender_id($id){
        $stmt =  $this->get_db()->prepare("select * from product where for_who_id=:for_who_id");
        $stmt->bindValue(":for_who_id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function add_gender($gender_name){
        $stmt = $this->get_db()->prepare("insert into for_who(for_who_name)values (:for_who_name)");
        $stmt->bindValue(":for_who_name",$gender_name);
        return $stmt->execute();
    }
    public function delete_gender($gender_id){
        $stmt = $this->get_db()->prepare("delete  from for_who where for_who_id = :for_who_id");
        $stmt->bindValue(":for_who_id",$gender_id);
        return $stmt->execute();
    }
    public function edit_gender($gender_id,$gender_name){
        $stmt = $this->get_db()->prepare("update for_who set  for_who_name=:for_who_name where for_who_id=:for_who_id");
        $stmt->bindValue("for_who_id",$gender_id);
        $stmt->bindValue("for_who_name",$gender_name);
        return $stmt->execute();
    }

}
