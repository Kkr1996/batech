<?php
// parse the incoming request data

include 'config.php';

$path =  "http://" . $_SERVER['SERVER_NAME'].'/batech/text.txt'; 

$data = json_decode(file_get_contents($path),true);



foreach($data as $keys=>$vals){
//echo '<pre>',var_dump($vals['name']); echo '</pre>';
    // check if all required fields are present
    if (!isset($vals['name']) || !isset($vals['email']) || !isset($vals['password'])) {
        http_response_code(400); // bad request
        echo json_encode(['error' => 'Missing required fields']);
        exit;
    }
    // validate the data
    $name     = filter_var($vals['name'],     FILTER_SANITIZE_STRING);
    $email    = filter_var($vals['email'],    FILTER_SANITIZE_EMAIL);
    $password = filter_var($vals['password'], FILTER_SANITIZE_STRING);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400); // bad request
        echo json_encode(['error' => 'Invalid email address']);
        exit;
    }

        // hash the password
    $password = md5($password, PASSWORD_DEFAULT);

    //connect to the database
 
    // insert the user into the database

    $date         = date("YmdHis");
    $reference_id = "REF". $date.rand(100,999);
    $query = "INSERT INTO register (name, email, password,reference_id) VALUES ('$name', '$email', '$password','$reference_id')";
    $result = mysqli_query($conn, $query);

    if($result){
        http_response_code(201); // created
        echo json_encode(['message' => 'User created successfully']);
    }else{
        http_response_code(500); // internal server error
        echo json_encode(['error' => 'Failed to create user']);
    }


}







