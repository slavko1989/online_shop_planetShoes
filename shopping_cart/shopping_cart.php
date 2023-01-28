<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php"); 
$interface = new Interface_class();
$interface->head();
$cart = new Shop_View();
$cart->get_delete_shopID();
$cart->get_update_q();
?>

    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Delete</th>
 
                  </tr>
                </thead>
                <tbody>
                  <?php
                   //$datetime = date("Y-m-d h:i:s");
                   if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
                    if($show = $cart->show_user_cart()){
                   foreach($show as $cart_show){
                    $price = $cart_show->product_price;
                    $quantity = $cart_show->quantity;
                    @$sum = array($quantity * $price);
                    @$total = array_sum($sum);
                    @$i += $total;
                   ?>
                  <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                        <img src="../../../php_projects/planet_shoes/img_product/<?php echo $cart_show->product_img;  ?>" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                        <div class="media-body">
                          <a href="#" class="d-block text-dark"><?php echo $cart_show->product_name;  ?></a>
                          <small>
                            <span class="text-muted"><?php echo $cart_show->product_text;  ?></span>
  
                          </small>
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4"><?php echo $cart_show->product_price;  ?></td>
                        <td class="text-right font-weight-semibold align-middle p-4">
                          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="shopping_cart_id" value="<?php echo $cart_show->shopping_cart_id; ?>">
                                <input type="number" name="quantity" value="<?php echo $quantity; ?>" style="width: 30px;">
                                <input type="submit" name="edit_q" value="edit">
                            </form>
                        </td>
                    <td class="text-right font-weight-semibold align-middle p-4"><?php echo @$total;  ?></td>
                    <td class="text-center align-middle px-0">
                      <a href="../../../php_projects/planet_shoes/shopping_cart/shopping_cart.php?del_id=<?php echo $cart_show->product_id; ?>" 
                        class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                  </tr>
                <?php } } }?>
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <div class="mt-4">
                <label class="text-muted font-weight-normal">Promocode</label>
                <input type="text" placeholder="ABC" class="form-control">
              </div>
              <div class="d-flex">
                <div class="text-right mt-4 mr-5">
                  <label class="text-muted font-weight-normal m-0">Discount</label>
                  <div class="text-large"><strong>$20</strong></div>
                </div>
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><strong><?php echo @$i; ?></strong></div>
                </div>
              </div>
            </div>
        
            <div class="float-right">
              <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3"><a href="../../../php_projects/planet_shoes/index.php">Back to shopping</a></button>
              <button type="button" class="btn btn-lg btn-primary mt-2"><a href="../../../php_projects/planet_shoes/user/user_checkout.php">Checkout</a></button>
            </div>
        
          </div>
      </div>
    </div>

    <?php $interface->footer(); ?>
