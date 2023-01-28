<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
 $cat = new Cat_View();


 ?>
  <div class="w3-panel">
 	<div class="container mt-3">
  <h2>Category section edit</h2>
             
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Category</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    	 <?php
          $cat->get_edit_Category();
          if(isset($_GET['edit_id'])){
                $id = $_GET['edit_id'];
                $stmt = $cat->get_db()->prepare("select * from category_ecommerce where cat_id=:cat_id");
                $stmt->bindValue("cat_id",$id);
                $stmt->execute();
                $edit = $stmt->fetch(PDO::FETCH_OBJ);
                ?>
      <tr>
        <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <td><input type="hidden" class="form-control"  name="cat_id" value="<?php echo $edit->cat_id; ?>"></td>
        <td><input type="text" class="form-control" placeholder="Enter category" id="pwd" name="cat_name" value="<?php echo $edit->cat_name; ?>"></td>
        <td><button type="submit" class="btn btn-primary" name="ed_cat">EDIT</button></td>
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