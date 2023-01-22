<?php
// Start the session

include 'config.php';

session_start();
if(isset($_POST['login'])){
	$email    = $_POST['email'];
	$password = $_POST['password'];

	$password = md5($password);

	$query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result)==1){

	    //start a session
		session_start();
		$_SESSION['verify'] = 1;
		$referer = $_SERVER['HTTP_REFERER'].'/dashboard.php';
		header("Location:$referer");

	}else{
      $_SESSION['invalid'] = "Invalid Email and password";
      $urls =  "http://" . $_SERVER['SERVER_NAME'].'/batech/admin'; 
	  header("Location:$urls");

	}
}


