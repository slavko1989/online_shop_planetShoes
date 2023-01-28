  <?php
 include_once(__DIR__ ."../../classes/shopping_cart.class.php");
class Shop_View extends Shop_Controller{

    public function __construct()
    {
        parent::__construct();
    }
 public function show_user_cart(){
        if(isset($_SESSION['user_id'])){
            $id = $_SESSION['user_id'];
        return $this->get_shopping_user_cart($id);
    }
     }
     public function show_cart(){
        return $this->get_shopping_cart();
     }
     
     public function add_toCart_view(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST["add_to_cart"])){
               if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
               // header("location:../product/shopping_cart.php");
                $datetime = date("Y-m-d h:i:s");
               $cart = $this->add_to_cart($this->shop_status(),$this->quantity(),
                    $_SESSION["user_id"],$this->product_id(),$datetime);
                    if($cart){
                            if(!headers_sent()){
                            header("location:../../../php_projects/planet_shoes/shopping_cart/shopping_cart.php");
                            }else{?>
                        <script type="text/javascript">window.location.href="../../../php_projects/planet_shoes/shopping_cart/shopping_cart.php";</script>
                        <?php
                        ?>
                            <div class="alert alert-success">
                            <p style="text-align: center;">Success!</p>
                            </div>
                <?php   } }
           }else{ ?>
                <div class="alert alert-warning">
                <p style="text-align: center;">Failed, cart not added</p>.
                </div>
                
            <?php }
        }
        }
    }
     public function show_badge_q(){
        return $this->bagde_quantity($this->quantity());
    }
    public function show_count_cart(){
        if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
        $id = $_SESSION["user_id"];
        $this->countShoppingCart($id);
   }
}
 public function get_delete_shopID(){
        if(isset($_GET['del_id'])){
            $del_id = $_GET['del_id'];
            if($this->delete_shopping_cart($del_id)){
                echo "<p class='php_mess'>Delete Successfully<p/>";
            }else{
                echo "<p class='php_mess_err'>Delete Failed<p/>";
            }
        }
    }
    public function get_update_q(){
        if($_SERVER['REQUEST_METHOD']=="POST"  && isset($_POST["edit_q"])){
            return $this->updateQuantity($this->shop_id(),$this->quantity());
        }
     }
     public function delete_all_from_cart(){
        return $this->delete_all();
     }
     public function show_sum_user_product(){
        if(isset($_SESSION["user_email"]) && isset($_SESSION['user_id'])){
        return $this->sum_price_for_products($_SESSION['user_id']);
    }
  }
}