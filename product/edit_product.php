<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
//include_once("C:\wamp64\www\php_projects\planet_shoes\classes/interface_admin.class.php");
$interface = new Interface_admin();
$interface->head();
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
 
$g = new G_View();
$gender = $g->show_gender();
$b = new Brand_View();
$brand = $b->show_brand();
$c = new Cat_View();
$cat = $c->show_category();

$p = new Prd_View();
$p->get_edit_product();


 ?>
  <div class="w3-panel">
  <div class="container mt-3">
  <h2>Product section</h2>
  <p>Edit product</p>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Images</th>
        <th>Text</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Gender</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
      	<?php
   	 	if(isset($_GET['edit_id'])){
     	$id = $_GET['edit_id'];
        $stmt = $p->get_db()->prepare("select * from product where product_id=:product_id");
        $stmt->bindValue("product_id",$id);
        $stmt->execute();
        $edit = $stmt->fetch(PDO::FETCH_OBJ);
    	?>
  		<form class="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <td><input type="hidden" class="form-control" placeholder="Enter name" id="pwd" name="product_id" value="<?php echo $edit->product_id; ?>"></td>
        <td><input type="text" class="form-control" placeholder="Enter name" id="pwd" name="product_name" value="<?php echo $edit->product_name; ?>"></td>
        <td><input type="text" class="form-control" placeholder="Enter price" id="pwd" name="product_price" value="<?php echo $edit->product_price; ?>"></td>
        <td><img src="../../../php_projects/planet_shoes/img_product/<?php echo $edit->product_img; ?>" alt="" class="img-thumbnail" style="width: 60px;">
        <input type="file" name="product_img"  class="form-control" value="<?php echo $edit->product_img; ?>"></td>
        <td><textarea name="product_text" placeholder="Enter text" class="form-control" id="textAreaExample1" rows="4"><?php echo $edit->product_text; ?></textarea></td>
        <td>
        	<select name="cat_id"  class="form-control" id="sel1">
    
                    <?php
                    foreach($cat as $cat_name){
                    ?>
                    <option value="<?php echo $cat_name->cat_id; ?>">
                    <?php
                    echo $cat_name->cat_name;
                         } ?>
                     </option>
                </select>
        </td>
        <td>
        	<select name="brand_id" class="form-control" id="sel1">
                    <?php
                        foreach($brand as $brand_name){
                    ?>
                    <option value="<?php echo $brand_name->brand_id; ?>">
                        <?php
                    echo $brand_name->brand_name;
                        }
                        ?>   
                    </option>
                </select>
        </td>
        <td>
        	 <select name="for_who_id" class="form-control" id="sel1">
                    <?php
                    foreach($gender as $g_name){ 
                    ?>
                    <option value="<?php echo $g_name->for_who_id; ?>">
                        <?php 
                        echo $g_name->for_who_name;
                        }
                        ?>
                    </option>
                </select>
        </td>
        <td><input type="text" class="form-control" placeholder="Enter status" id="pwd" name="status_name" value="<?php echo $edit->status_name; ?>"></td>
  		<td><button type="submit" class="btn btn-primary" name="edit_prd">Edit</button></td>
		</form>
     
      </tr>
  <?php } ?>
    </tbody>
  </table>
</div>  
  </div>
  <?php
$interface->footer();



?>