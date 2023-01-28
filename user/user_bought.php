
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
        <h5 style="text-align: center;font-family: monospace;font-weight: bolder;margin-top: 5px;">You bought this product</h5>
        <table class="w3-table w3-striped w3-white">
          <thead>
            <th>Order Number</th>
            <th>State</th>
            <th>City</th>
            <th>Streat</th>
            <th>Code</th>
            <th>Phone</th>
            <th>Date bought</th>
            <th>Status</th>
            <th>Action</th>
          </thead>

          <tbody>
            <?php

             if($show){
             if(is_array($show) || is_object($show))
              {
              foreach($show as $bought){
                $status = $bought->sold_status;
                $order_number = $bought->d_o;
                $d_t = $bought->date_sold;
                if($order_number && $d_t){
                 
              ?>
          <tr>
            <td><a href=
              "../../../php_projects/planet_shoes/user/detail.php?detail_id=<?php echo $order_number; ?>">Detail#</a></td>
            <td><?php echo $bought->state; ?></td>
            <td><?php echo $bought->city; ?></td>
            <td><?php echo $bought->streat; ?></td>
            <td><?php echo $bought->p_code; ?></td>
            <td><?php echo $bought->phone; ?></td>
            <td><?php echo $bought->date_sold; ?></td>
            <td>
              <?php 
              
            if($status == 0){
              echo'
                <div class="alert alert-secondary">
                  <strong>Panding</strong>
                </div>';
              }elseif($status == 1){
                echo'
                 <div class="alert alert-success">
                <strong>Shifted!</strong>
                </div>';
              }
              elseif($status == 2){
                echo'
                <div class="alert alert-warning">
                <strong>Failed</strong>
                </div>';
              }
               ?>
            </td>
            <td>
              <a href="../../../php_projects/planet_shoes/user/user_bought.php?del_id=<?php echo $bought->sold_id; ?>"><i class="bi bi-trash3-fill"></i></a>
            </td>          
          </tr>
        <?php } } } } ?>
        
          </tbody>
        </table>
      </div>
    </div>
  
  </div>

<?php $interface->footer(); ?>


    
