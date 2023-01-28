<!-- Sidebar/menu -->
<?php 
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$shop = new Shop_View();
$wish = new Wish_View();
$u_view = new UserView();


 
?>
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">

  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><a href="../../../php_projects/planet_shoes/index.php" class="w3-bar-item w3-button"><b>Planet shoes</b></a></h3>
  </div>

  <div class="list-group">
  <?php 
  if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){

  ?>
  <a href="../../../php_projects/planet_shoes/user/user_account.php" class="list-group-item">
  <img src="../../../php_projects/planet_shoes/user_img/<?php echo $_SESSION['img']; ?>"
  alt="" style="width: 40px; border-style: solid;
  border-width: 5px; border-radius:12px; border: 2px solid green;">
  Account</a>
  <a href="../../../php_projects/planet_shoes/shopping_cart/shopping_cart.php" class="list-group-item"><i class="fa fa-shopping-cart">
<?php $shop->show_count_cart(); ?>
   Shooping cart</i></a>
  <a href="../../../php_projects/planet_shoes/wish_list/wish.php" class="list-group-item"><i class="bi bi-bag-heart" >
<?php $wish->show_count_wish(); ?>
   Wish list</i></a>
  <a href="../../../php_projects/planet_shoes/user/logout.php" class="list-group-item"><i class="bi bi-box-arrow-in-left"></i> Logout</a>
<?php } ?>
  </div>




  <div class="w3-container w3-display-container w3-padding-16">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <div class="alert alert-dark">
      <p>
      <?php
      $u_view->get_logged_in();
      $u_view->err_msg_log();
      ?>
      </p>
  </div>
        <div class="mb-3 mt-3">
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="user_email">
        </div>
        <div class="mb-3">
        <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="user_pass">
        </div>
        <button type="submit" class="btn btn-primary" name="login">Sing in</button>
    </form>
  </div>
  
    <div class="w3-container w3-display-container w3-padding-16">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    
    
  <div class="alert alert-dark">
      <p>
        <?php
        $u_view->confirm_user_reg();
        $u_view->err_msg_reg();
        ?>
      </p>
  </div>

      <div class="mb-3 mt-3">
        <input type="text" class="form-control" id="email" placeholder="Enter name" name="user_name">
        </div>
        <div class="mb-3 mt-3">
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="user_email">
        </div>
        <div class="mb-3">
        <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="user_pass">
        </div>
        <div class="mb-3">
        <input type="text" class="form-control" id="pwd" placeholder="About you" name="user_info">
        </div>
         <div class="mb-3">
        <input type="file" class="form-control" name="user_img">
        </div>
        <button type="submit" class="btn btn-primary" name="user_reg">Sing up</button>

    </form>
  </div>
  <?php

  

$g = new G_View();
$b = new Brand_View();
$c = new Cat_View();


  ?>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Category<i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <?php
      $cat = $c->show_category();
        foreach($cat as $cat){
       ?>
      <a href="../../../php_projects/planet_shoes/category/cat_option.php?cat_id=<?php echo $cat->cat_id; ?>" class="w3-bar-item w3-button"><?php echo $cat->cat_name; ?></a>
      <?php } ?>
      
    </div>
   <a onclick="myAccFunct()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Brand <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAccc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
        <?php
        $brand = $b->show_brand();
        foreach($brand as $brand){
       ?>
      <a href="../../../php_projects/planet_shoes/brand/brand_option.php?brand_id=<?php echo $brand->brand_id; ?>" class="w3-bar-item w3-button"><?php echo $brand->brand_name; ?></a>
      <?php } ?>
      
    </div>
    <a onclick="myAccFuncti()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Gender <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcccc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
       <?php
        $gender = $g->show_gender();
        foreach($gender as $gender){
       ?>
      <a href="../../../php_projects/planet_shoes/gender/gender_option.php?gender_id=<?php echo $gender->for_who_id; ?>" class="w3-bar-item w3-button"><?php echo $gender->for_who_name; ?></a>
      <?php } ?>
    </div>
  </div>
  <a href="" class="w3-bar-item w3-button w3-padding">BEST BY</a> 
  <a href="#footer" class="w3-bar-item w3-button w3-padding">TOP MODEL</a>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">EXLUSIVE</a>  
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
  <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>
</nav>