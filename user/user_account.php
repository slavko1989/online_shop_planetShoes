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
    if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
    $account = $view->show_user_account();
    foreach ($account as $admin)
    { ?>
    
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Profile photo</h5>
        <img src="../user_img/<?php echo $admin->user_img; ?>" style="width:100%; height: 500px;" alt="">
      </div>
      <div class="w3-twothird">
        <h5>Your profile</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class='fas fa-child'></i></td>
            <td><?php echo $admin->user_name; ?></td>
            <td><i>Name</i></td>
          </tr>
          <tr>
            <td><i class='far fa-envelope-open'></i></td>
            <td><?php echo $admin->user_email; ?></td>
            <td><i>Email</i></td>
          </tr>
          <tr>
            <td><i class='far fa-edit'></i></td>
            <td><?php echo $admin->user_info; ?></td>
            <td><i>Informations</i></td>
          </tr>
          <tr>
            <td><i class='fas fa-skull-crossbones'></i></td>
            <td>Action</td>
            <td><a href=""><i class="bi bi-pen-fill"></i></a> OR 
              <a href="user_account.php?del_id=<?php echo $admin->user_id; ?>"><i class="bi bi-trash3-fill"></i></a></td>          
          </tr>
        </table>



      </div>
    </div>
  <?php } }?>
  </div>
<?php
$interface->footer();



?>