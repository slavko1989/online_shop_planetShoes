<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
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
$p->add_product_view();


 ?>
  <div class="w3-panel">
  <div class="container mt-3">
  <h2>Product section</h2>
  <p>Add new product</p>
  <form class="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
  <input type="text" class="form-control" placeholder="Enter name" id="pwd" name="product_name">
  <input type="text" class="form-control" placeholder="Enter price" id="pwd" name="product_price">
  <input type="file" name="product_img"  class="form-control">
  <textarea name="product_text" placeholder="Enter text" class="form-control" id="textAreaExample1" rows="4"></textarea>
                <select name="cat_id"  class="form-control" id="sel1">
                    <option>CHOOSE CATEGORY</option>
                    <?php
                    foreach($cat as $cat_name){
                    ?>
                    <option value="<?php echo $cat_name->cat_id; ?>">
                    <?php
                    echo $cat_name->cat_name;
                         } ?>
                     </option>
                </select>
                <select name="brand_id" class="form-control" id="sel1">
                    <option>CHOOSE BRAND</option>
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
                <select name="for_who_id" class="form-control" id="sel1">
                    <option>CHOOSE GENDER</option>
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
  <input type="text" class="form-control" placeholder="Enter status" id="pwd" name="status_name">
  <button type="submit" class="btn btn-primary" name="add_prd">Add</button>
</form>            
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
       <?php
            $p->get_delete_productID();
            $show = $p->show_full_product();
            foreach($show as $show_p){
            ?>
      <tr>
        <td><?php echo $show_p->product_id; ?></td>
        <td><?php echo $show_p->product_name; ?></td>
        <td><?php echo $show_p->product_price; ?></td>
        <td><img src="../img_product/<?php echo $show_p->product_img; ?>" alt="" class="img-thumbnail" style="width: 60px;"></td>
        <td><?php echo $show_p->product_text; ?></td>
        <td><?php echo $show_p->cat_name; ?></td>
        <td><?php echo $show_p->brand_name; ?></td>
        <td><?php echo $show_p->for_who_name; ?></td>
        <td><?php echo $show_p->status_name; ?></td>
        <td><a href="product.php?del_id=<?php echo $show_p->product_id;  ?>" class="link-dark"><i class="bi bi-x-circle-fill"></i></a>
          <a href="edit_product.php?edit_id=<?php echo $show_p->product_id;  ?>" class="link-dark"><i class="bi bi-pencil-fill"></i></a>
    </td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
</div>  
  </div>
<?php 
$interface->footer();


?>