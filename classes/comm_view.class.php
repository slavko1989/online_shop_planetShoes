<?php
include_once(__DIR__."../../classes/comm.class.php");

class Comm_View extends Comm_Controller{

    public function __construct()
    {
        parent::__construct();
    }

public function send_comm(){
        $date = date("Y-m-d h:i:s",time());
    if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"]) ){
        $id = $_SESSION["user_id"];
        $_SESSION["product_id"] = $this->product_id();
        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["send"])){
            if(empty($this->comm_text())){
                echo'<div class="alert alert-warning">
                <p style="text-align: center;">Please text something</p>.
                </div>';       
            }else{
            $this->add_comm($this->comm_text(),$date,$id,$this->product_id());
        }
    }
  }
}

public function view_comments($id){
        return $this->get_comm($id);
    }
    public function view_number_of_comm($id){
        return $this->countComm($id);
    }
       public function get_delete_commID(){
        if(isset($_GET['del_id'])){
            $del_id = $_GET['del_id'];
            if($this->delete_comm_id($del_id )){
                echo "<p class='php_mess'>Delete Successfully<p/>";
            }else{
                echo "<p class='php_mess_err'>Delete Failed<p/>";
            }
        }
    }
public function send_replay_comm($t,$d,$r,$u,$p){
        
    if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"]) ){
        $id = $_SESSION["user_id"];
        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["send_replay"])){
            if(isset($_POST["parentComm"])){
            return $this->insertReplayComm($t,$d,$r,$u,$p);
    
      }
    }
  }
}
public function view_replay_comments($id){
        return $this->get_replay_comm($id);
    }
}