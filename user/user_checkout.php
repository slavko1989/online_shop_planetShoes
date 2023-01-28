<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php"); 
$interface = new Interface_class();
$user_panel = new Interface_admin();
$interface->head();
$sold = new Sold_View();
$info_user = new UserView();
$sold_id = $sold->view_all_sold_product();
$info = $info_user->return_user_info();
$cart = new Shop_View();
$cart->get_delete_shopID();
$cart->get_update_q();

?>
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Payment services</h2>
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
                   foreach($info as $in){  $in->user_info_id; }
                   foreach($sold_id as $s){  $s->sold_id; }
                 
                   if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){

                    if($show = $cart->show_user_cart()){
                     
                   foreach($show as $cart_show){
                    $pro_id = $cart_show->product_id;
                    $u_id = $_SESSION["user_id"];
                    $status =  $cart_show->shopping_status;
                    $datetime = date("Y-m-d h:i:s");
                    $price = $cart_show->product_price;
                    $quantity = $cart_show->quantity;
                    @$sum = array($quantity * $price);
                    @$total = array_sum($sum);
                    @$i += $total;
                    $sold->add_to_sold_product($u_id,$pro_id,$sold->sold_status(),$datetime,$quantity,@$in->user_info_id,$sold->order_number());
                    $sold->add_detail_product(@$s->sold_id,$pro_id,$u_id,@$in->user_info_id);
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
              
                 <?php } } } ?>
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4"> 
              <div class="d-flex">
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><strong><?php echo @$i; ?></strong></div>
                </div>
              </div>
            </div>
                <div class="float-right">
              <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3"><a href="../../../php_projects/planet_shoes/user/user_account.php">Back to your panel</a></button>
               <h5 style="color: darkred;font-weight: bolder;">Do you want to this address delivery</h5>
        <table class="w3-table w3-striped w3-white">
           <?php
    if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
    $account = $info;
    if (is_array($account) || is_object($account))
        {
    foreach ($account as $info)
    { ?>
          <tr>
            <td><i class="bi bi-house-heart"></i></td>
            <td><?php echo $info->state; ?></td>
            <td><i>State</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-house-heart"></i></td>
            <td><?php echo  $info->city; ?></td>
            <td><i>City</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-house"></i></i></td>
            <td><?php echo  $info->streat; ?></td>
            <td><i>Streat</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-phone-vibrate"></i></i></td>
            <td><?php echo  $info->phone; ?></td>
            <td><i>Phone</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-file-earmark-code"></i></i></td>
            <td><?php echo  $info->p_code; ?></td>
            <td><i>P_CODE</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-file-text"></i></td>
            <td><?php echo  $info->add_text; ?></td>
            <td><i>Additional Informations</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-backspace-reverse-fill"></i></td>
            <td>Action</td>
            <td><a href="user_checkout.php?edit_id=<?php echo $info->user_info_id; ?>"><i class="bi bi-pen-fill"></i></a> OR <a href="user_checkout.php?del_id=<?php echo $info->user_info_id; ?>"><i class="bi bi-trash3-fill"></i></a></td>          
          </tr>
          <?php } } }?>
        </table>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" style="margin-top: 20px; text-align:center;">
                <input type="hidden" name="sold_id">
                <input type="hidden" name="quantity" value="<?php echo @$cart_show->quantity; ?>">
                <input type="hidden" name="user_id">
                <input type="hidden" name="product_id" value="<?php echo @$pro_id; ?>">
                <input type="hidden" name="sold_status" value="<?php echo @$status; ?>">
                <input type="hidden" name="date_sold">
                <input type="hidden" name="user_info_id" value="<?php echo @$info->user_info_id; ?>">
                <input type="hidden" name="order_number" value="<?php echo  $sold->order_number(); ?>">
                <input type="submit" class="btn btn-lg btn-primary mt-2" name="order" value="ORDER THE PRODUCTS NOW">
              </form>
            </div>
          </div>
      </div>
    </div>
    <?php $interface->footer(); ?>
