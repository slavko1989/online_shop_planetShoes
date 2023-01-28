    <?php
include_once(__DIR__ ."../../classes/model.class.php");
class Brand_Controller extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_brand(){
        $stmt =  $this->get_db()->prepare("select * from brand_ecommerce");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_brand_id($id){
        $stmt =  $this->get_db()->prepare("select * from product where brand_id=:brand_id");
        $stmt->bindValue(":brand_id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function add_brand($brand_name){
        $stmt = $this->get_db()->prepare("insert into brand_ecommerce(brand_name)values (:brand_name)");
        $stmt->bindValue(":brand_name",$brand_name);
        return $stmt->execute();
    }
    public function delete_brand($brand_id){
        $stmt = $this->get_db()->prepare("delete  from brand_ecommerce where brand_id = :brand_id");
        $stmt->bindValue(":brand_id",$brand_id);
        return $stmt->execute();
    }
    public function edit_brand($brand_id,$brand_name){
        $stmt = $this->get_db()->prepare("update brand_ecommerce set  brand_name=:brand_name where brand_id=:brand_id");
        $stmt->bindValue("brand_id",$brand_id);
        $stmt->bindValue("brand_name",$brand_name);
        return $stmt->execute();
    }
}
    