

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>
      <?php 
      if(isset($_SESSION["admin"]) && isset($_SESSION["user_id"])){
      ?>
    Welcome, <strong><?php echo $_SESSION["user_name"];?>
    <img src="../user_img/<?php echo $_SESSION['img']; ?>" class="w3-circle w3-margin-right" style="width:46px">
</strong> <?php } ?></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="../user/users_admin_section.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Users</a>
    <a href="../category/category.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Categorys</a>
    <a href="../brand/brand.php" class="w3-bar-item w3-button w3-padding"><i class='fab fa-gratipay'></i>  Brands</a>
    <a href="../gender/gender.php" class="w3-bar-item w3-button w3-padding"><i class='fas fa-venus-mars'></i>  Genders</a>
    <a href="../product/product.php" class="w3-bar-item w3-button w3-padding"><i class='fas fa-shoe-prints'></i>  Products</a>
    <a href="../sold_product/sold.php" class="w3-bar-item w3-button w3-padding"><i class='fas fa-comments-dollar'></i>  Sold</a>
    <a href="../admin/logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>Logout</a><br><br>
  </div>
</nav>