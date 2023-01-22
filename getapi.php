<?php
//connect to the database
include 'config.php';
// retrieve the user from the database
$query = "SELECT * FROM register;
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);
    http_response_code(200); // OK
    echo json_encode($user);
}else{
    http_response_code(404); // Not Found
    echo json_encode(['error' => 'User not found']);
}
