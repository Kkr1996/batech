<?php
session_start();

// code to set session variables

session_destroy();
$urls =  "http://" . $_SERVER['SERVER_NAME'].'/batech/admin'; 
echo '<h2>Please go the home page, You looks logout</h2>';
echo '<a href="'.$urls.'">Please Login</a>';

