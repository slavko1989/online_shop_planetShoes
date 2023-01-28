<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$interface->head();
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
 $g = new G_View();
 $g->add_gender_view();


 ?>
  <div class="w3-panel">
  <div class="container mt-3">
  <h2>Gender section</h2>
  <p>Add new gender</p>
  <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="text" class="form-control" placeholder="Enter category" id="pwd" name="for_who_name">
  <button type="submit" class="btn btn-primary" name="add_gender">Add</button>
</form>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Gender</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       <?php
            $g->get_delete_genderID();
            $show = $g->show_gender();
            foreach($show as $show_g){
            ?>
      <tr>
        <td><?php echo $show_g->for_who_id; ?></td>
        <td><?php echo $show_g->for_who_name; ?></td>
        <td><a href="gender.php?del_id=<?php echo $show_g->for_who_id;  ?>" class="link-dark"><i class="bi bi-x-circle-fill"></i></a>
          <a href="gender_edit.php?edit_id=<?php echo $show_g->for_who_id;  ?>" class="link-dark"><i class="bi bi-pencil-fill"></i></a>
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