<?php include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$count = new Shop_View();
$wish = new Wish_View();
 ?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i><a href="../../../php_projects/planet_shoes/index.php"> Go back</a></b></h5>
  </header>
<div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
           
          <h3><?php

            echo $count->show_count_cart();
            ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Product in your cart</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <?php echo $wish->show_count_wish();?>
        </div>
        <div class="w3-clear"></div>
        <h4>Product in your wish</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Quantity</h4>
      </div>
    </div>
   
  </