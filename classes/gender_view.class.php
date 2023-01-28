 <?php
   include_once(__DIR__ ."../../classes/gender.class.php");
class G_View extends G_Controller {

    public function __construct()
    {
        parent::__construct();
    }
 public function show_gender(){
        return $this->get_gender();
    }
     public function show_gender_id(){
        if(isset($_GET["gender_id"])){
            $gender_id = $_GET["gender_id"];
            return $this->get_gender_id($gender_id);
        }
    }

    public function add_gender_view(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST["add_gender"])){
                $this->add_gender($this->gender_name());
                echo "<p class='php_mess'>Added Successfully</p>";
            }
        }
    }
    public function get_delete_genderID(){
        if(isset($_GET['del_id'])){
            $del_id = $_GET['del_id'];
            if($this->delete_gender($del_id )){
                echo "<p class='php_mess'>Delete Successfully<p/>";
            }else{
                echo "<p class='php_mess_err'>Delete Failed<p/>";
            }
        }
    }
    public function get_edit_gender(){
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            if(isset($_POST["ed_gender"])) {
                $this->edit_gender($this->gender_id(), $this->gender_name());
                echo "<p class='php_mess'>EDIT SUCCESSFULLY</p>";
            }else{
                echo "<p class='php_mess_err'>EDIT FAILED</p>";
            }
        }
    }
}
