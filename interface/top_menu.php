


<!-- Top menu on small screens -->
<?php 
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$search = new Prd_View();
$search->show_search();
?>
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">Planet shoes</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left">Shoes</p>
    <p class="w3-right">
        <form method="post" action="../../../php_projects/planet_shoes/product/search.php" class="w3-right">
        <input type="text" class="form-control" placeholder="Search" id="search" name="search">
        <input type="submit" class="btn btn-outline-primary" value="Search" id="search" name="find" style=""> 
        </form>
      
      <div class="input-group mb-3">
        
      </div>
      

    </p>
  </header>