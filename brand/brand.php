<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
 $brand = new Brand_View();
 $brand->add_brand_view();


 ?>
  <div class="w3-panel">
  <div class="container mt-3">
  <h2>Brand section</h2>
  <p>Add new brand</p>
  <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="text" class="form-control" placeholder="Enter category" id="pwd" name="brand_name">
  <button type="submit" class="btn btn-primary" name="add_brand">Add</button>
</form>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Brand</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       <?php
            $brand->get_delete_brandID();
            $show = $brand->show_brand();
            foreach($show as $show_brand){
            ?>
      <tr>
        <td><?php echo $show_brand->brand_id; ?></td>
        <td><?php echo $show_brand->brand_name; ?></td>
        <td><a href="brand.php?del_id=<?php echo $show_brand->brand_id;  ?>" class="link-dark"><i class="bi bi-x-circle-fill"></i></a>
          <a href="brand_edit.php?edit_id=<?php echo $show_brand->brand_id;  ?>" class="link-dark"><i class="bi bi-pencil-fill"></i></a>
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