   <?php
   include_once(__DIR__ ."../../classes/category.class.php");

   class Cat_View extends  Cat_Controller{

    public function __construct()
    {
        parent::__construct();
    }

   public function show_category(){
    return $this->get_category();
    }
     public function show_category_id(){
        if(isset($_GET["cat_id"])){
            $cat_id = $_GET["cat_id"];
            return $this->get_category_id($cat_id);
        }
    }

    public function add_category_view(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST["add_cat"])){
                $this->add_category($this->category_name()); 
                echo '<div class="alert alert-success">
                    <p>Success!</p> 
                    </div>';
            }
        }
    }
    public function get_delete_catID(){
        if(isset($_GET['del_id'])){
            $del_id = $_GET['del_id'];
            if($this->delete_category($del_id )){
            echo '<div class="alert alert-success">
                    <p>Success!</p> 
                    </div>';
                }else{
                echo ' <div class="alert alert-warning">
                <p>Warning! Category delte is failed</p></a>.
                </div>';
            }
        }
    }
    public function get_edit_Category(){
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            if(isset($_POST["ed_cat"])) {
                $this->edit_category($this->category_id(), $this->category_name());
                echo "<p class='php_mess'>EDIT SUCCESSFULLY</p>";
            }else{
                echo "<p class='php_mess_err'>EDIT FAILED</p>";
            }
        }
    }
}
