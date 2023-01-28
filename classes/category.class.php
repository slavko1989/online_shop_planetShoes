    
<?php 
include_once(__DIR__ ."../../classes/model.class.php");

class Cat_Controller extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_category(){
        $stmt =  $this->get_db()->prepare("select * from category_ecommerce");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_category_id($id){
        $stmt =  $this->get_db()->prepare("select * from product where cat_id=:cat_id");
        $stmt->bindValue(":cat_id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function add_category($cat_name){
        $stmt = $this->get_db()->prepare("insert into category_ecommerce(cat_name)values (:cat_name)");
        $stmt->bindValue(":cat_name",$cat_name);
        return $stmt->execute();
    }
    public function delete_category($cat_id){
        $stmt = $this->get_db()->prepare("delete  from category_ecommerce where cat_id = :cat_id");
        $stmt->bindValue(":cat_id",$cat_id);
        return $stmt->execute();
    }
    public function edit_category($cat_id,$cat_name){
        $stmt = $this->get_db()->prepare("update category_ecommerce set cat_name=:cat_name where cat_id=:cat_id");
        $stmt->bindValue("cat_id",$cat_id);
        $stmt->bindValue("cat_name",$cat_name);
        return $stmt->execute();
    }
}
