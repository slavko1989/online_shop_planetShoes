<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_admin();
$user_panel = new Interface_class();

$interface->head();
$interface->top_c();
$user_panel->user_sidebar();
$user_panel->user_dashboard();
$count = new Prd_View();
$view = new UserView();
$view->add_user_info();


?>

<div>

  <div class="w3-panel">
   
    

 <div class="container">
  <h2 style="color: darkred;">Add your informations for order</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
      <input type="text" class="form-control" id="usr" name="state" placeholder="STATE">
      <input type="text" class="form-control" id="usr" name="city" placeholder="CITY">
      <input type="text" class="form-control" id="usr" name="streat" placeholder="STREAT">
      <input type="text" class="form-control" id="usr" name="phone" placeholder="PHONE">
      <input type="text" class="form-control" id="usr" name="p_code" placeholder="POSTAL CODE">
      <textarea class="form-control" id="exampleFormControlTextarea3" rows="7" name="add_text" placeholder="ADDITIONAL INFORMATIONS"></textarea>
      <input type="hidden" class="form-control" id="usr" name="user_id">
    </div>
    <input type="submit" class="btn btn-primary" name="info" value="CONFIRM">
  </form>
  <hr style="color: black;">
   <h5>Your address</h5>
        <table class="w3-table w3-striped w3-white">
           <?php
    if(isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])){
    $account = $view->return_user_info();
    if (is_array($account) || is_object($account))
        {
    foreach ($account as $info)
    { ?>
          <tr>
            <td><i class="bi bi-house-heart"></i></td>
            <td><?php echo $info->state; ?></td>
            <td><i>State</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-house-heart"></i></td>
            <td><?php echo  $info->city; ?></td>
            <td><i>City</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-house"></i></i></td>
            <td><?php echo  $info->streat; ?></td>
            <td><i>Streat</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-phone-vibrate"></i></i></td>
            <td><?php echo  $info->phone; ?></td>
            <td><i>Phone</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-file-earmark-code"></i></i></td>
            <td><?php echo  $info->p_code; ?></td>
            <td><i>P_CODE</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-file-text"></i></td>
            <td><?php echo  $info->add_text; ?></td>
            <td><i>Additional Informations</i></td>
          </tr>
          <tr>
            <td><i class="bi bi-backspace-reverse-fill"></i></td>
            <td>Action</td>
            <td><a href=""><i class="bi bi-pen-fill"></i></a> OR <a href="user_info.php?del_id=<?php echo $info->user_info_id; ?>"><i class="bi bi-trash3-fill"></i></a></td>          
          </tr>
          <?php } } }?>
        </table>
</div>



      </div>
    </div>
  
 
  </div>
<?php
$interface->footer();



?>