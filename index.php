<?php
include "header.php";
session_start();
error_reporting(0);
?>


<div class="container">
  <h2>TEST</h2>

 
 <div class="admin_login">
    <div class="">
      <a href="admin">Admin Login</a>
    </div>
 </div>
  
  <?php
    echo '<h4 class="sucess">'.$_SESSION["success"].'</h4>';
  ?>


  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="tab" href="#home">Login</a></li>
    <li><a data-toggle="tab" href="#menu1">Register</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
 <?php
    echo '<h4 class="invalid">'.$_SESSION["invalid"].'</h4>';
  ?>
         <h3>Login</h3>
     
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
       <div id="menu1" class="tab-pane fade">
      <h3>Register</h3>
     

        <form action="register.php" method="post">

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" maxlength="20" placeholder="Name" id="name">
          </div>


          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" id="email">
          </div>


          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" name="phone" maxlength="10" placeholder="Phone Number" id="number">
          </div>


          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd">
          </div>


          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox"> Remember me
            </label>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>


        </form>


    </div>

  </div>
</div>



<script>
setTimeout(function(){
  $.ajax({
    type: 'POST',
    url: 'session_destroy.php',
    success: function(response) {
      console.log(response);
    }
  });
}, 5000);
</script>


<?php
include "footer.php";
?>
