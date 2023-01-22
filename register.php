<?php
// Start the session

include 'config.php';

session_start();
if(isset($_POST['submit'])){

	$name     = $_POST['name'];
	$email    = $_POST['email'];
	$phone    = $_POST['phone'];
	$password = md5($_POST['password']);
	$created_at = date("Y-m-d");



	$date         = date("YmdHis");
	$reference_id = "REF". $date;



	$insert_register = "INSERT INTO register (name,email,password,created_at,phone,reference_id )
	VALUES ('$name','$email','$password','$created_at','$phone','$reference_id')";

	if ($conn->query($insert_register) === TRUE) {
		$_SESSION["success"] = "Registed successfully, Please login";
		$referer = $_SERVER['HTTP_REFERER'];
		header("Location:$referer");

	} else {
	  echo "Error: " . $insert_register . "<br>" . $conn->error;
	}

	
}








?>