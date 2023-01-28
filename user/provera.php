<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php"); 

$sold = new Sold_View();
$show = $sold->view_sold_product();

                   foreach($show as $cart_show){
                    $price = $cart_show->product_price;
                    $quantity = $cart_show->quantity;

                    echo $price;
                }

                <div>
<div class="w3-panel">
<div class="container">
  <h2>You bought this product</h2>
  <p>Your table bought</p>            
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Product name</th>
        <th>Product images</th>
        <th>Product price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead>

    <tbody>
      <?php
     if($show){
     if(is_array($show) || is_object($show))
      {
      foreach($show as $bought){
       ?>
      
      <tr>
        <td><?php echo $bought->product_name; ?></td>
        <td><img src="../../../php_projects/planet_shoes/img_product/
          <?php echo $bought->product_img;  ?>" class="d-block ui-w-40 ui-bordered mr-4" alt=""></td>
        <td><?php echo $bought->product_price; ?></td>
        <td><?php echo $bought->quantity; ?></td>
        <td><?php echo $total; ?></td>
        <td></td>
      </tr>
    <?php } } }else{
      echo 'NOthing to show';
    }?>
    </tbody>
  </table>
</div>
</div>
</div>


/*public function add_to_sold_product(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST["order"])){
               if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
                $date = date("Y-m-d h:i:s");
               $sold= $this->add_to_sold($_SESSION["user_id"],$this->product_id(),$this->sold_status(),$date,$this->quantity());
               if($sold){
                $this->cart->delete_all_from_cart(); ?>
                  <script type="text/javascript">window.location.href="../../../php_projects/planet_shoes/user/user_bought.php";</script>
               <?php }
           }else{
           echo "please reg->login if you want to shop, thanks";
                
            }
            }
        }
   }*/