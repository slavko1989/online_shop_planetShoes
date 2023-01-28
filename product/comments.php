<?php
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$comm = new Comm_View();
$comm->send_comm();
$comm->get_delete_commID();

?>
<form method="post" name="form_comm" onclick="return validate()" action="<?php echo$_SERVER['PHP_SELF']; ?>">
  <div class="form-group">
    <input type="hidden" name="user_id">
    <input type="hidden" name="product_id" value="<?php echo @$prd->product_id; ?>">
    <input type="hidden" name="date_comm">
    <textarea name="text_comm" class="form-control" type="text"   rows="3"></textarea>
    <p id="error"></p>
  </div>
    <input type="submit" class="btn btn-success"  name="send" value="Send comments">
</form>
<script>
  function validate(){
  var comments = document.forms["form_comm"]["text_comm"].value;
  if(comments==""){
  document.getElementById("error").innerHTML="Text something";
      }
    }
</script>
<br><br>
<p><?php echo $comm->view_number_of_comm(@$prd->product_id); ?> Comments:</p><br>
  <div class="row">
  <?php $join = $comm->view_comments(@$prd->product_id);
    foreach($join as $comm){?>
    <div class="col-sm-2 text-center">
    <img src="../../../php_projects/planet_shoes/user_img/<?php echo $comm->user_img; ?>" class="img-circle" height="65" width="65" alt="">
    </div>
    <div class="col-sm-10">
    <h4><?php echo $comm->user_name;  ?> <small><?php echo $comm->date_comm; ?></small></h4>
    <p><?php echo $comm->text_comm; ?></p>
    <?php if($comm->user_id == $_SESSION["user_id"]){ 
    if(isset($_SESSION["user_id"])) {?>
    <a href="../../../php_projects/planet_shoes/product/singl_product.php?singl_id=<?php echo $comm->comm_id; ?>">Delete</a>
    <?php } }?>
     <br>
   </div><?php } ?> 
    <script>
    function replayComm(id){
    var input = document.getElementById("parentComm");
    input.value=id;
         }
    $(document).ready(function(){
    $("#replay").click(function(}{
    var search = $("#text_comm").val();
    $.ajax({
           url:"comments.php",
           method:"POST",
           data:{search:search},
           success:function(data)
           {
            body.onload("single_product.php?id=<?php
              if($comm->product_id()){ 
              echo $comm->product_id(); } ?>");
             },
           });
          });
        
    </script>
    </div>

