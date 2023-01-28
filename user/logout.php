<?php 
include_once(__DIR__."../../spl_autoload_class/autoload_class.php");
$interface = new Interface_class();
$interface->head();
$logout = new UserControler();
$logout->logout();

?>
<div class="container mt-3">
  <h2>Logout</h2>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Go back on website
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Logout heading</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <a href="../../../php_projects/planet_shoes/index.php" class="btn">LOGOUT</a>
        </div>
        
      </div>
    </div>
  </div>
  
</div>