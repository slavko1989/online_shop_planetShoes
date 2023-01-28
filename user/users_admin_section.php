<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");

$interface = new Interface_admin();
$interface->head();
$interface->top_c();
$interface->sidebar();
$interface->dashboard();
?>
 <div class="w3-panel">
    <?php
    $user = new UserView();
    ?>
    
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="container mt-3">
        <h5>All users</h5>
        <img src="../../../php_projects/planet_shoes/images/p.jpg" style="width:100%" alt="">
      </div>
      <div class="container mt-3">
        <h5>Users</h5>
        <table class="table">
        	<thead>
        	<tr>
        		<th>Name</th>
        		<th>Email</th>
        		<th>Some info</th>
        		<th>Image</th>
            <th>Password</th>
        		<th>Actions</th>
        	</tr>
        	</thead>
        	<tbody>
        		<?php
        		$user->delete_user();
			    $users = $user->show_user();
			    foreach($users as $admin){
    			?>
          <tr>
            <td><?php echo $admin->user_name; ?></td>
            <td><?php echo $admin->user_email; ?></td>
            <td><?php echo $admin->user_info; ?></td>
            <td><img src="../../../php_projects/planet_shoes/user_img/<?php echo $admin->user_img; ?>" style="width: 50px;height: 50px;"></td>
            <td><?php echo $admin->user_pass; ?></td>
            <td><a href=""><i class="bi bi-pen-fill"></i></a> OR <a href=""><i class="bi bi-trash3-fill"></i></a></td>          
          </tr>
          <?php } ?>
      </tbody>
        </table>
      </div>
    </div>
  
  </div>
<?php
$interface->footer();



?>