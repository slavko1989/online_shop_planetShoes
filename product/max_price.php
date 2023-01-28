  <!-- Product grid -->
<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$pro = new Prd_View();
$interface = new Interface_class();
$interface->head();
$interface->sidebar();
$interface->top_menu();
$interface->img_header();

?>

  <div class="container-fluid">
    <div class="row">
       <?php 
        $product = $pro->max_price();
        foreach($product as $prd){
        ?>
      <div class="col-sm-4">
       
        <img src="../../../php_projects/planet_shoes/img_product/<?php echo $prd->product_img; ?>" class="rounded" style="width:300px;height: 200px;">
        <p><?php echo $prd->product_text; ?><br><b><?php echo $prd->product_price; ?></b>
        <button type="button" class="btn btn-primary" style="float: right;">
        <a href="../../../php_projects\planet_shoes\product/singl_product.php?singl_id=<?php echo $prd->product_id; ?>">View</a></button></p>
       
      </div>
       <?php } ?>
      
    </div>

      <ul class="pagination">
      <li class="page-item"><a href="" class="page-link">Previos</a></li>
      <li class="page-item"><a href="" class="page-link">1</a></li>
      <li class="page-item"><a href="" class="page-link">2</a></li>
      <li class="page-item"><a href="" class="page-link">3</a></li>
      <li class="page-item"><a href="" class="page-link">Next</a></li>
    </ul>
    
  </div>
  <?php
  $interface->sub();
$interface->footer();
?>