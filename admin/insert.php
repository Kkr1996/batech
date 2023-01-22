<?php
// Start the session

include 'config.php';



	$name     = "krishna";
	$email    = "admin@gmail.com";
	$custom_password = "KRishna@123";
	$password = md5($custom_password);
	$created_at = date("Y-m-d");


	// $insert_admin = "INSERT INTO admin (name,email,password,created_at )
	// VALUES ('$name','$email','$password','$created_at')";

	// if ($conn->query($insert_admin) === TRUE) {
	//   echo "Insert successfully";

	// } else {
	//   echo "Error: " . $insert_admin . "<br>" . $conn->error;
	// }








?>