<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$user_panel = new Interface_class();
$sold = new Sold_View();

$interface->head();
$interface->top_c();
$user_panel->user_sidebar();
$user_panel->user_dashboard();
$sold->delete_from_sold();
$show = $sold->view_details_product();
?>
<div>
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-twothird">
        <h5 style="text-align: center;font-family: monospace;font-weight: bolder;margin-top: 5px;">We sent your product to this adress</h5>
        <table class="w3-table w3-striped w3-white">
          <thead>
            <th>Product name</th>
            <th>Product price</th>
            <th>Product img</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Date bought</th>
            <th>Action</th>
          </thead>

          <tbody>
            
            <?php 
              

             if($show){
             if(is_array($show) || is_object($show))
              {
              foreach($show as $bought){
                $q = $bought->quantity;
                $p =$bought->product_price;
                     @$sum = array($q * $p);
                    @$total = array_sum($sum);
                    @$i += $total;
              ?>
          <tr>
            <td><?php echo $bought->product_name; ?></td>
            <td><?php echo $bought->product_price; ?></td>
            <td><img src="../../../php_projects/planet_shoes/img_product/<?php echo $bought->product_img;  ?>" class="d-block ui-w-40 ui-bordered mr-4" alt="" 
              style="width: 40px;height: 40px;"></td>
            <td><?php echo $q; ?></td>
            <td><?php echo $total; ?></td>
            <td><?php echo $bought->date_sold; ?></td>
            <td> 
              <a href="../../../php_projects/planet_shoes/user/user_bought.php?del_id=<?php echo $bought->sold_id; ?>"><i class="bi bi-trash3-fill"></i></a></td>          
          </tr>
        <?php } } } ?>
        
          </tbody>
        </table>
        <p>Total for price: $<?php echo @$i; ?></p>
      </div>
    </div>
  
  </div>

<?php $interface->footer(); ?>


    
