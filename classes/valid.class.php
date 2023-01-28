<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");

class Valid extends Model
{
	private $error = array();

 public function __construct()
    {
        parent:: __construct();
        $this->error;
    }
  
	public function email_exist($email){
	 	$stmt = $this->get_db()->prepare("select user_email from users where user_email=:'$email' limit 1");
	 	$stmt->bindValue(":user_email",$email);
	 	$stmt->execute();
	 	$row =$stmt->rowCount();
	 		if($row > 0){
		$this->error[] = "email exists, take another";
	 	}
	 }
	 public function empty_row(){
	 	if(empty($this->user_name() ) && empty($this->user_email()) && empty($this->user_img()) &&
	 	empty($this->user_pass()) && empty($this->user_info()) ){
	 		$this->error[] = "please fill in each field";
	 	}
	 }
	 public function numeric_userName(){
	 	if(is_numeric($this->user_name())){
  			$this->error[] = "username can not be a number";
  			}
	 }
	 public function validate_email(){
	 	if(!filter_var($this->user_email(),FILTER_VALIDATE_EMAIL)){
  			$this->error[] = "email is not valid";
  			}
	 }
	 public function password_min_characters(){
	 	if(strlen($this->user_pass()) < 4){
  			$this->error[] = "password must be atleast 4 characters long";
			}
	 }
	 
}