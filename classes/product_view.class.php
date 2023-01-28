<?php
include_once(__DIR__ ."../../classes/product.class.php");

class Prd_View extends Prd_Controller{

    public function __construct()
    {
        parent::__construct();
    }
      public function show_product(){
        return $this->get_product();
    }
    public function show_singl_product(){
        if(isset($_GET["singl_id"])){
            $singl_id = $_GET["singl_id"];
            return $this->get_product_id($singl_id);
        }
    }
    public function add_product_view(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST["add_prd"])){
               $insert =  $this->add_product($this->product_name(),$this->product_price(),$this->product_img(),
                    $this->product_text(),$this->category_id(),$this->brand_id(),$this->gender_id(),$this->status_name());
               if($insert){
                $path= "../img_product/";
                $full_path = $path . $this->product_img();
                    move_uploaded_file($this->product_img_tmp(), $full_path);
                    echo "<p class='php_mess'>Added Successfully</p>";
               }else{
                    echo "<p class='php_mess_err'>Failed insert</p>";
               }
                
            }
        }
    }
    public function get_delete_productID(){
        if(isset($_GET['del_id'])){
            $del_id = $_GET['del_id'];
            if($this->delete_product($del_id)){
                echo "<p class='php_mess'>Delete Successfully<p/>";
            }else{
                echo "<p class='php_mess_err'>Delete Failed<p/>";
            }
        }
    }
    public function get_edit_product(){
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            if(isset($_POST["edit_prd"])) {
            $prd = $this->edit_product($this->product_id(), $this->product_name(),
            $this->product_price(),$this->product_img(),
                    $this->product_text(),$this->category_id(),$this->brand_id(),$this->gender_id(),$this->status_name());
                if($prd){
                    $path= "../../../php_projects/planet_shoes/img_product/";
                $full_path = $path . $this->product_img();
                    move_uploaded_file($this->product_img_tmp(), $full_path);
                    //header("location:products.php");
            }
        }
    }
}
    public function show_search(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
         if(isset($_POST["find"])){ 
         $search_name = $_POST["search"]; 
            return $this->search($search_name);
        }else{
            //echo "<p class='php_mess_err'>WE DONT FIND NOTHING TO SHOW</p>";
            }
        }
    }
    public function show_sum_product(){
        return $this->sum_price_for_all_products();
    }
     public function show_full_product(){
        return $this->show_p();
     }
     public function print_exclusive(){
        return $this->exclusive();
     }
     public function print_best_by(){
        return $this->best_by();
     }
     public function view_pag($values, $per_page){
        return $this->pagination($values, $per_page);

     }
     public function view_fetch_rez_for_pag(){
       return $this->fetchRez();
     }

}
