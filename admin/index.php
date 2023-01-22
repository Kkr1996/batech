<?php
include "header.php";
session_start();
error_reporting(0);



?>


<?php

 if (!isset($_SESSION["verify"]))
 {
      // echo  $referer = $_SERVER['HTTP_REFERER'].'/batech/admin';
      // header("location:$referer");
 }
 else{
      echo  $referer = $_SERVER['HTTP_REFERER'].'/batech/admin/dashboard.php';
      header("location:$referer");
 }


?>
<div class="container">
 
 <?php
    echo '<h4 class="invalid">'.$_SESSION["invalid"].'</h4>';
  ?>
<h3>Admin - Login</h3>

  
  <h5><b>Email:</b> admin@gmail.com<h5>
  <h5><b>Password:</b> KRishna@123</h5>


  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
         
     
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" id="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" name="password" placeholder="Enter password" id="pwd">
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox"> Remember me
            </label>
          </div>
          <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>

    </div>
   

  </div>
</div>





<?php
include "footer.php";
?>
