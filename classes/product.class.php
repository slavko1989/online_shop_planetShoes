<?php
include_once(__DIR__ ."../../classes/model.class.php");

class Prd_Controller extends Model{
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->data;
    }
     public function get_product(){
       
        $stmt =  $this->get_db()->prepare("select * from product");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
      public function get_product_id($id){
        $stmt =  $this->get_db()->prepare("select * from product where product_id=:product_id");
        $stmt->bindValue(":product_id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function add_product($product_name,$product_price,$product_img,$product_text,$cat_id,$brand_id,$for_who_id,$s_name){
        $stmt = $this->get_db()->prepare("insert into product(product_name,product_price,product_img,product_text,
            cat_id,brand_id,for_who_id,status_name)
            values (:product_name,:product_price,:product_img,:product_text,:cat_id,:brand_id,:for_who_id,:status_name)");
        $stmt->bindValue(":product_name",$product_name);
        $stmt->bindValue(":product_price",$product_price);
        $stmt->bindValue(":product_img",$product_img);
        $stmt->bindValue(":product_text",$product_text);
        $stmt->bindValue(":cat_id",$cat_id);
        $stmt->bindValue(":brand_id",$brand_id);
        $stmt->bindValue(":for_who_id",$for_who_id);
        $stmt->bindValue(":status_name",$s_name);
        return $stmt->execute();
    }
    public function delete_product($product_id){
        $stmt = $this->get_db()->prepare("delete  from product where product_id = :product_id");
        $stmt->bindValue(":product_id",$product_id);
        return $stmt->execute();
    }
    public function edit_product($product_id,$product_name,$product_price,$product_img,$product_text,$cat_id,$brand_id,$for_who_id,$s_name){
        $stmt = $this->get_db()->prepare("update product set
          product_name=:product_name,product_price=:product_price,
          product_img=:product_img,product_text=:product_text,
          cat_id=:cat_id,brand_id=:brand_id,for_who_id=:for_who_id,status_name=:status_name where product_id=:product_id");
        $stmt->bindValue(":product_id",$product_id);
        $stmt->bindValue(":product_name",$product_name);
        $stmt->bindValue(":product_price",$product_price);
        $stmt->bindValue(":product_img",$product_img);
        $stmt->bindValue(":product_text",$product_text);
        $stmt->bindValue(":cat_id",$cat_id);
        $stmt->bindValue(":brand_id",$brand_id);
        $stmt->bindValue(":for_who_id",$for_who_id);
        $stmt->bindValue(":status_name",$s_name);
        return $stmt->execute();
    }
      public function search($search){
        $stmt = $this->get_db()->prepare("select * from product where product_name like '%$search%'");
       // $stmt->bindValue(":product_name",$search);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
 
    public function sum_price_for_all_products(){
         $stmt = $this->get_db()->prepare("select sum(product_price) from product");
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
    public function show_p(){
        if($this->get_db()){
            $stmt = $this->get_db()->prepare("select product.product_id,
             product.product_name,
             product.product_price,
             product.product_img,
             product.product_text,
             category_ecommerce.cat_name,
             brand_ecommerce.brand_name,
             for_who.for_who_name,
             product.status_name 
             from product
             inner join category_ecommerce on product.cat_id =  category_ecommerce.cat_id
             inner join brand_ecommerce on product.brand_id = brand_ecommerce.brand_id
             inner join for_who on product.for_who_id = for_who.for_who_id;");
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_OBJ);
        }else{
            echo "fuck";
        }
    }
    public function exclusive(){
        $stmt = $this->get_db()->prepare("select * from product where status_name = 'exclusive' limit 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function best_by(){
         $stmt = $this->get_db()->prepare("select * from product where status_name = 'best_by' limit 3");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
     public function min_price(){
         $stmt = $this->get_db()->prepare("select * from product order by product_price asc;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
     public function max_price(){
         $stmt = $this->get_db()->prepare("select * from product order by product_price desc;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
    public function abcd(){
         $stmt = $this->get_db()->prepare("select * from product order by product_name asc;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
     public function top(){
        $stmt = $this->get_db()->prepare("select * from product where status_name = 'top' limit 3");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function pagination($values, $per_page)
    {
        $total_values = count($values);
        if(isset($_GET["page"])){
            $current_page = $_GET["page"];
        }else{
            $current_page = 1;
        }
        $counts = ceil($total_values/$per_page);
        $param1 = ($current_page-1) * $per_page;
        $this->data = array_slice($values,$param1,$per_page);
        for($x = 1;$x<=$counts;$x++){
            $numbers[] = $x;
        }
        return  $numbers;
    }
    public function fetchRez(){
        $rezValues = $this->data;
        return $rezValues;
    }
}
