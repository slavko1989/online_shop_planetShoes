<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
 $g = new G_View();


 ?>
  <div class="w3-panel">
 	<div class="container mt-3">
  <h2>Gender section edit</h2>
             
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Gender</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    	 <?php
          $g->get_edit_Gender();
          if(isset($_GET['edit_id'])){
                $id = $_GET['edit_id'];
                $stmt = $g->get_db()->prepare("select * from for_who where for_who_id=:for_who_id");
                $stmt->bindValue("for_who_id",$id);
                $stmt->execute();
                $edit = $stmt->fetch(PDO::FETCH_OBJ);
                ?>
      <tr>
        <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <td><input type="hidden" class="form-control"  name="for_who_id" value="<?php echo $edit->for_who_id; ?>"></td>
        <td><input type="text" class="form-control"  id="pwd" name="for_who_name" value="<?php echo $edit->for_who_name; ?>"></td>
        <td><button type="submit" class="btn btn-primary" name="ed_gender">EDIT</button></td>
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