<!-- Overlay effect when opening sidebar on small screens -->
<?php 
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$count = new Prd_View();
$sold = new Sold_View();
$user = new UserView();

?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i><a href="../../../php_projects/planet_shoes/admin/index.php"> My Dashboard</a></b></h5>
  </header>
<div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class='fas fa-hand-holding-usd' style='font-size:36px'></i></div>
        <div class="w3-right">
           
          <h3><?php
              $sum = $count->show_sum_product();
              foreach($sum as $all){
              $price = 'sum(product_price)';
              echo $all->$price."$"; 
            }
            ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Products</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class='fas fa-shopping-cart' style='font-size:36px'></i></div>
        <div class="w3-right">
          <h3><?php echo $sold->view_number_of_sold_prd(); ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Sold</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class='fas fa-comments-dollar' style='font-size:36px'></i></div>
        <div class="w3-right">
          <h3>
            <?php
              $s =  $sold->view_sold_price();
              foreach($s as $m){
                $pr = $m->product_price;
                $q = $m->quantity;
                @$total  = array($q*$pr);
                @$total1 = array_sum($total);
                @$i += @$total1;
                
              }
              echo @$i."$";
            ?>
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Money earn</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>
            <?php
            echo $user->view_number_of_users();
            ?>
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>