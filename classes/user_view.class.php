<?php
include_once(__DIR__ ."../../classes/user_controler.class.php");


class UserView extends UserControler{
		public function __construct(){
		parent:: __construct();
	}

	public function confirm_user_reg(){
	if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["user_reg"])){
			return $this->valid_reg();
		}
	}
	public function get_logged_in(){
		if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST["login"]) 
			&& isset($_SESSION['pass_dehash'])){
			if($this->empty_row_log()){
				return false;
			}else{
				$this->user_login($this->user_email(),$_SESSION['pass_dehash']);
			}
		}
	}
	public function show_user_account(){
			return $this->get_user_id($_SESSION["user_id"]);
	}
	public function show_user(){
			return $this->get_user();
	}
	public function delete_user(){
		if(isset($_GET["del_id"])){
			$id = $_GET["del_id"];
			$this->get_delete_user($id);
		}
	}
	public function delete_user_account(){
		if(isset($_GET["del_id"])){
			$id = $_GET["del_id"];
			if($this->get_delete_user($id)){
			if(!headers_sent()){
			header("location:../index.php");
			session_destroy();
			}else{?>
		<script type="text/javascript">window.location.href="../../../php_projects/planet_shoes/index.php";</script>
			<?php 
			session_destroy();
			}
			}
		}
	}
	public function get_edit_user(){
		if($_SERVER['REQUEST_METHOD']=="POST"){
			if(isset($_POST["edit_user"])){
			$edit = $this->edit_user($this->user_id(),$this->user_name(),
				$this->user_email(),$this->user_pass(),
				$this->user_img(),$this->user_info());
			if($edit){
				$path= dirname(__FILE__) . "../../images/";
                $full_path = $path . $this->user_img();
                    move_uploaded_file($this->user_img_tmp(), $full_path);
                    header("location:../users/user_page.php");
                    
	 		}else{
	 			echo "<p class='php_mess_err'>FAILED EDIT</p>";
	 		}
		}
			
	}
}

public function update_pass(){
	if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["new"])){
	if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
			if($this->change_password($_SESSION["user_id"])){
			if(!headers_sent()){
			header("location:../index.php");
						session_destroy();

			}else{?>
		<script type="text/javascript">window.location.href="../../../php_projects/planet_shoes/index.php";</script>
			<?php 
			session_destroy();
			}
			}

		}
	} 
}
public function confirm_logout(){
	 return $this->logout();
}
public function add_user_info(){

	 	if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
	 	if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["info"])){
	 	if(empty($this->state() ) && empty($this->city()) && empty($this->streat()) &&
	 	empty($this->phone()) && empty($this->p_code()) && empty($this->add_text()) ){?>
				<div class='alert alert-warning'>
    			<h2 style='text-align: center;'>Please required all fields!</h2> 
  				</div>
  				<?php }
	 	if(!empty($this->state()) && !empty($this->city()) && !empty($this->streat()) &&
	 	!empty($this->phone()) && !empty($this->p_code()) && !empty($this->add_text()) ){
	 	$this->get_info($this->state(),$this->city(),$this->streat(),
	 	$this->phone(),$this->p_code(),$this->add_text(),$_SESSION["user_id"]);
	 		}
	 	}
	 }
	}
	public function return_user_info(){
			return $this->get_user_info($_SESSION["user_id"]);
		}

		public function view_number_of_users(){
			return $this->countUsers();
		}
	}

