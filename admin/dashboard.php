

<?php
include "header.php";
 session_start();
 if (!isset($_SESSION["verify"]))
 {
     // $referer = $_SERVER['HTTP_REFERER'];
     // header("location:$referer");
      echo  $referer = $_SERVER['HTTP_REFERER'].'/batech/admin';
      header("location:$referer");
 }
 else{
   
 }

include 'config.php';


$sql  =  "SELECT * from register";

$result = $conn->query($sql);




?>

<div class="container">
  <div>
    <a href="logout.php" class="btn btn-primary">Logout</a>
  </div>

  <h2>Users Information</h2>
          
<table class="table table-striped">
    <thead>
      <tr>
        <th>REF. ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody>

<?php

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$row['reference_id']."</td>
        <td>".$row['name']."</td>
        <td>".$row['email']."</td>
        <td>".$row['phone']."</td>
      </tr>";
  }
} 
else {
  echo "0 results";
}
$conn->close();
?>

   
    </tbody>
  </table>
</div>

<?php
  include "footer.php";