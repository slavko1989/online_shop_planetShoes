 <?php
 include_once(__DIR__ ."../../classes/model.class.php");
class Shop_Controller extends Model{

    public function __construct()
    {
        parent::__construct();
    }
 public function get_shopping_cart(){
        $stmt = $this->get_db()->prepare("select
        shopping_cart.shopping_cart_id,shopping_cart.shopping_status,shopping_cart.quantity,
        product.product_id, product.product_name,product.product_price,product.product_img,product.product_text,
        users.user_id,users.user_name,users.user_email,users.user_img,users.user_info
        from shopping_cart
        inner join users on shopping_cart.user_id = users.user_id
        inner join product on shopping_cart.product_id = product.product_id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_shopping_user_cart($id){
        $stmt = $this->get_db()->prepare("select
        shopping_cart.shopping_cart_id,shopping_cart.shopping_status,shopping_cart.quantity,shopping_cart.date_shop,
        product.product_id, product.product_name,product.product_price,product.product_img,product.product_text,
        users.user_id,users.user_name,users.user_email,users.user_img,users.user_info
                from shopping_cart
        inner join users on shopping_cart.user_id = users.user_id
        inner join product on shopping_cart.product_id = product.product_id
        
        where users.user_id =:user_id;");
        $stmt->bindValue(":user_id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
     public function add_to_cart($cart_status,$cart_quantity,$user_id,$product_id,$date){
        $stmt = $this->get_db()->prepare("insert into shopping_cart(shopping_status,quantity,user_id,product_id,date_shop)
            values (:shopping_status,:quantity,:user_id,:product_id,:date_shop)");
        //$stmt->bindValue(":shopping_cart_id",$cart_id);
        $stmt->bindValue(":shopping_status",$cart_status);
        $stmt->bindValue(":quantity",$cart_quantity);
        $stmt->bindValue(":user_id",$user_id);
        $stmt->bindValue(":product_id",$product_id);
        $stmt->bindValue(":date_shop",$date);

        return $stmt->execute();
    }
   

     public function bagde_quantity($quantity)
    {
        $stmt = $this->get_db()->prepare("SELECT shopping_cart_id FROM shopping_cart WHERE quantity = :quantity");
        $stmt->bindValue(":quantity", $quantity);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
      public function countShoppingCart($id)
    {
        $stmt = $this->get_db()->prepare("select * from shopping_cart where user_id=:user_id");
        $stmt->bindValue(":user_id", $id);
        $stmt->execute();
        $rez = $stmt->rowCount();
        echo $rez;
    }
     public function sum_price_for_products($u){
        $stmt = $this->get_db()->prepare("select 
        
        product.product_price,shopping_cart.quantity
        from 
        shopping_cart
        inner join users on shopping_cart.user_id = users.user_id
        inner join product on shopping_cart.product_id = product.product_id
        where users.user_id =:user_id");
        $stmt->bindValue(":user_id",$u);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
      public function delete_shopping_cart($p_id){
        $stmt = $this->get_db()->prepare("delete  from shopping_cart where product_id = :product_id");
        $stmt->bindValue(":product_id",$p_id);
        return $stmt->execute();
    }
    public function updateQuantity($sh_id,$q){
        $stmt = $this->get_db()->prepare("update shopping_cart set quantity=:quantity where shopping_cart_id=:shopping_cart_id");
        $stmt->bindValue(":shopping_cart_id",$sh_id);
        $stmt->bindValue(":quantity",$q);
        return $stmt->execute();
    }
    public function delete_all(){
        $stmt = $this->get_db()->prepare("delete from shopping_cart");
        return $stmt->execute();

    }
}
   