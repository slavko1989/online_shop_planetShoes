  <?php
 include_once(__DIR__ ."../../classes/wish.class.php");
class Wish_View extends Wish_Controller{

    public function __construct()
    {
        parent::__construct();
    }
      

     public function get_delete_wishID(){
        if(isset($_GET['del_id'])){
            $del_id = $_GET['del_id'];
            if($this->delete_wish_cart($del_id)){
                echo "<p class='php_mess'>Delete Successfully<p/>";
            }else{
                echo "<p class='php_mess_err'>Delete Failed<p/>";
            }
        }
    }
     public function show_count_wish(){
        if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
        $id = $_SESSION["user_id"];
        $this->countWishCart($id);
   }
}
   public function show_all_quantity(){
     return $this->sum_quantity_for_all_wish($this->quantity());
   }
  
      public function add_toWish_view(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST["add_to_wish"])){
               if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
               // header("location:../product/shopping_cart.php");
                $datetime = date("Y-m-d h:i:s");
               $wish = $this->add_to_wish($this->quantity(),
                    $_SESSION["user_id"],$this->product_id(),$datetime);
               if($wish){
                    if(!headers_sent()){
                            header("location:../../../php_projects/planet_shoes/shopping_cart/shopping_cart.php");
                            }else{?>
                        <script type="text/javascript">window.location.href="../../../php_projects/planet_shoes/wish_list/wish.php";</script>
                        <?php
                        ?>
                            <div class="alert alert-success">
                            <p style="text-align: center;">Success!</p>
                            </div>
               }
                <?php   } }
           }else{
           //echo "please reg->login if you want to shop, thanks";
                
            }
            }
        }
    }
      public function show_user_wish(){
        if(isset($_SESSION['user_id'])){
            $id = $_SESSION['user_id'];
        return $this->get_shopping_user_wish($id);
        }
     }
       public function get_update_qw(){
        if($_SERVER['REQUEST_METHOD']=="POST"  && isset($_POST["edit_q"])){
            return $this->updateQuantityW($this->wish_id(),$this->quantity());
        }
     }
     public function delete_from_wish_toCart(){
        return $this->delete_wish_cart_toCartSh();
     }
     
    
        public function add_toCart_fromWish(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST["add_to_cart"])){
               if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
               // header("location:../product/shopping_cart.php");
                $datetime = date("Y-m-d h:i:s");
               $cart = $this->add_to_cart($this->shop_status(),$this->quantity(),
                    $_SESSION["user_id"],$this->product_id(),$datetime);

                    if($cart){
                        echo "<p>product is in your cart</p>
                        <img src='../admin/img_product/ok.png' alt=''>";
                        $this->delete_from_wish_toCart();
                  }
           }else{
           //echo "please reg->login if you want to shop, thanks";
                
            }
        }
        }
    }
}