<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
 $cat = new Cat_View();
 $cat->add_category_view();


 ?>
  <div class="w3-panel">
 	<div class="container mt-3">
  <h2>Category section</h2>
  <p>Add new category</p>
  <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="text" class="form-control" placeholder="Enter category" id="pwd" name="cat_name">
  <button type="submit" class="btn btn-primary" name="add_cat">Add</button>
</form>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Category</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	 <?php
            $cat->get_delete_catID();
            $show = $cat->show_category();
            foreach($show as $show_cat){
            ?>
      <tr>
        <td><?php echo $show_cat->cat_id; ?></td>
        <td><?php echo $show_cat->cat_name; ?></td>
        <td><a href="category.php?del_id=<?php echo $show_cat->cat_id;  ?>" class="link-dark"><i class="bi bi-x-circle-fill"></i></a>
        	<a href="category_edit.php?edit_id=<?php echo $show_cat->cat_id;  ?>" class="link-dark"><i class="bi bi-pencil-fill"></i></a>
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