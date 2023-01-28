
  <!-- Product grid -->
<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$search = new Prd_View();
$interface = new Interface_class();
$interface->head();
$interface->sidebar();
$interface->top_menu();
$interface->img_header();

?>

  <div class="container-fluid">
    <div class="row" style="text-align: center;">
       <?php 
     if($pro = $search->show_search()){
        foreach($pro as $prd){
        ?>
      <div class="card" style="width:400px">
        <img class="card-img-top" src="../../../php_projects/planet_shoes/img_product/<?php echo $prd->product_img; ?>" alt="">
        <div class="card-body">
        <h4 class="card-title"><?php echo $prd->product_name; ?></h4>
        <p class="card-text"><?php echo $prd->product_text; ?> <?php echo $prd->product_price; ?></p>
        <a href="#" class="btn btn-primary">ADD TO <i class="bi bi-cart-check-fill"></i></a>
        <a href="#" class="btn btn-primary">ADD TO <i class="bi bi-bag-heart-fill"></i></a>

        </div>
      </div>
       
       
       <?php } }else{
                echo '<div class="alert alert-info alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Info!</strong> Sorry, we dont have anything for you search 
                </div>';
                echo'<img src="../../../php_projects/planet_shoes/images/s.jpg" alt="" style="text-align:center;">';

        }?>
      
    </div>

  
    
  </div>
    <?php
  $interface->sub();
$interface->footer();
?>