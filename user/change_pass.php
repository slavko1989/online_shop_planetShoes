<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$user_panel = new Interface_class();

$interface->head();
$interface->top_c();
$user_panel->user_sidebar();
$user_panel->user_dashboard();
$count = new Prd_View();

?>

<div>

  <div class="w3-panel">
    <?php
    $view = new UserView();
    $view->delete_user_account();
    $view->update_pass();
    $view->delete_user();
    if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
    $account = $view->show_user_account();
    foreach ($account as $admin)
    { ?>
    
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Profile photo</h5>
        <img src="../user_img/<?php echo $admin->user_img; ?>" style="width:100%" alt="">
      </div>
      <div class="w3-twothird">
        <h5>Your profile</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td><?php echo $admin->user_name; ?></td>
            <td><i>Name</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
            <td><?php echo $admin->user_email; ?></td>
            <td><i>Email</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
            <td><?php echo $admin->user_info; ?></td>
            <td><i>Informations</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>Action</td>
            <td><a href=""><i class="bi bi-pen-fill"></i></a> OR <a href=""><i class="bi bi-trash3-fill"></i></a></td>          
          </tr>
        </table>

 <div class="container">
  <h2 style="color: darkred;">CHANGE YOUR PASSWORD</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
      <label for="usr">Old password:</label>
      <input type="text" class="form-control" id="usr" name="user_pass">
    </div>
    <div class="form-group">
      <label for="pwd">New Password:</label>
      <input type="text" class="form-control" id="pwd" name="new_pass">
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="text" class="form-control" id="pwd" name="confirm_pass">
    </div>
    <input type="submit" class="btn btn-primary" name="new" value="EXECUTE">
  </form>
</div>



      </div>
    </div>
  <?php } }?>
 
  </div>
<?php
$interface->footer();



?>