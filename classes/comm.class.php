<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");

class Comm_Controller extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_comm($id){
        $stmt =  $this->get_db()->prepare("select users.user_id,users.user_name, users.user_img,
        	comments.text_comm,comments.date_comm,comments.comm_id,product.product_id
        	from comments
        	inner join users on comments.user_id = users.user_id
        	inner join product on comments.product_id = product.product_id
        	where product.product_id=:product_id");
        $stmt->bindValue(":product_id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function delete_comm_id($id){
        $stmt =  $this->get_db()->prepare("delete from comments where comm_id=:comm_id");
        $stmt->bindValue(":comm_id",$id);
        return $stmt->execute();
    }
    public function add_comm($t,$d,$u,$p){
    	$stmt= $this->get_db()->prepare("insert into comments(text_comm,date_comm,user_id,product_id)
    		values(:text_comm,:date_comm,:user_id,:product_id)");
    	//$date = date('m/d/Y h:i:s a', time());

    	$stmt->bindValue(":text_comm",$t);
    	$stmt->bindValue(":date_comm",$d);
    	$stmt->bindValue(":user_id",$u);
    	$stmt->bindValue(":product_id",$p);
    	$stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } 
    public function countComm($id)
    {
        $stmt = $this->get_db()->prepare("select * from comments where product_id=:product_id");
        $stmt->bindValue(":product_id", $id);
        $stmt->execute();
        $rez = $stmt->rowCount();
        echo $rez;
    }
      public function insertReplayComm($t,$d,$r,$u,$p)
    {
       $stmt= $this->get_db()->prepare("insert into comments(text_comm,date_comm,parent_id,user_id,product_id)
            values(:text_comm,:date_comm,:parent_id,:user_id,:product_id)");
        //$date = date('m/d/Y h:i:s a', time());
        $stmt->bindValue(":text_comm",$t);
        $stmt->bindValue(":date_comm",$d);
        $stmt->bindValue(":parent_id",$r);
        $stmt->bindValue(":user_id",$u);
        $stmt->bindValue(":product_id",$p);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_replay_comm($id){
        $stmt =  $this->get_db()->prepare("select users.user_name, users.user_img,
            comments.text_comm,comments.date_comm,comments.comm_id,comments.parent_id,product.product_id
            from comments
            inner join users on comments.user_id = users.user_id
            inner join product on comments.product_id = product.product_id
            where comments.parent_id=:parent_id");
        $stmt->bindValue(":parent_id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}





?>
