 <?php
 include_once(__DIR__ ."../../classes/model.class.php");
class Wish_Controller extends Model{

    public function __construct()
    {
        parent::__construct();
    }
     //WISH

     public function delete_wish_cart($w_id){
        $stmt = $this->get_db()->prepare("delete  from wish_cart where product_id = :product_id");
        $stmt->bindValue(":product_id",$w_id);
        return $stmt->execute();
    }
     public function delete_wish_cart_toCartSh(){
        $stmt = $this->get_db()->prepare("delete   from wish_cart");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
      public function countWishCart($id)
    {
        $stmt = $this->get_db()->prepare("select * from wish_cart where user_id=:user_id");
        $stmt->bindValue(":user_id", $id);
        $stmt->execute();
        $rez = $stmt->rowCount();
        echo $rez;
    }
      public function add_to_wish($cart_quantity,$user_id,$product_id,$date){
        $stmt = $this->get_db()->prepare("insert into wish_cart(quantity,user_id,product_id,date_shop)
            values (:quantity,:user_id,:product_id,:date_shop)");
        //$stmt->bindValue(":shopping_cart_id",$cart_id);
        $stmt->bindValue(":quantity",$cart_quantity);
        $stmt->bindValue(":user_id",$user_id);
        $stmt->bindValue(":product_id",$product_id);
        $stmt->bindValue(":date_shop",$date);
        return $stmt->execute();
    }
     public function get_shopping_user_wish($id){
        $stmt = $this->get_db()->prepare("select
        wish_cart.wish_cart_id,wish_cart.quantity,
        product.product_id, product.product_name,product.product_price,product.product_img,product.product_text,
        users.user_id,users.user_name,users.user_email,users.user_img,users.user_info
        from wish_cart
        inner join users on wish_cart.user_id = users.user_id
        inner join product on wish_cart.product_id = product.product_id
        where users.user_id =:user_id;");
        $stmt->bindValue(":user_id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function sum_quantity_for_all_wish($q){
         $stmt = $this->get_db()->prepare("select sum(quantity) from wish_cart");
         $stmt->bindValue(":quantity",$q);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
    public function updateQuantityW($w_id,$q){
        $stmt = $this->get_db()->prepare("update wish_cart set quantity=:quantity where wish_cart_id=:wish_cart_id");
        $stmt->bindValue(":wish_cart_id",$w_id);
        $stmt->bindValue(":quantity",$q);
        return $stmt->execute();
    }
}
