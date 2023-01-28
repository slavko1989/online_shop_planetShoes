<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
 $brand = new Brand_View();


 ?>
  <div class="w3-panel">
 	<div class="container mt-3">
  <h2>Brand section edit</h2>
             
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Brand</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    	 <?php
          $brand->get_edit_Brand();
          if(isset($_GET['edit_id'])){
                $id = $_GET['edit_id'];
                $stmt = $brand->get_db()->prepare("select * from brand_ecommerce where brand_id=:brand_id");
                $stmt->bindValue("brand_id",$id);
                $stmt->execute();
                $edit = $stmt->fetch(PDO::FETCH_OBJ);
                ?>
      <tr>
        <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <td><input type="hidden" class="form-control"  name="brand_id" value="<?php echo $edit->brand_id; ?>"></td>
        <td><input type="text" class="form-control"  id="pwd" name="brand_name" value="<?php echo $edit->brand_name; ?>"></td>
        <td><button type="submit" class="btn btn-primary" name="ed_brand">EDIT</button></td>
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