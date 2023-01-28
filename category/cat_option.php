
<?php

include_once(__DIR__."../../spl_autoload_class/autoload_class.php");

$cat_option = new Cat_View();
$interface = new Interface_class();
$interface->head();
$interface->sidebar();
$interface->top_menu();
$interface->img_header();
?>
<div class="container-fluid">
    <div class="row">
             <?php 
        if($product_cat = $cat_option->show_category_id()){
        foreach($product_cat as $prd){
         ?>
        <div class="col-sm-4">
        
        
            <img src="../img_product/<?php echo $prd->product_img; ?>" class="img-thumbnail" alt="" style="width:300px;height: 200px;">
            <p><?php echo $prd->product_name; ?><br><b><?php echo $prd->product_price; ?></b>
            <button type="button" class="btn btn-primary" style="float: right;">
            <a href="../../../php_projects\planet_shoes\product/singl_product.php?singl_id=<?php echo $prd->product_id; ?>">View</a></button></p>

            
            
        </div>
        <?php } }else{
                echo '<div class="alert alert-info alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Info!</strong> Sorry, we dont have anything for this category 
                </div>';
                echo'<img src="../../../php_projects/planet_shoes/images/s.jpg" alt="" style="text-align:center;">';

        }?>
    </div>
</div>

<?php
$interface->sub();
$interface->footer();
?>



