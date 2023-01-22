<?php
// parse the incoming request data



$path = "test.txt";

$data = json_decode(file_get_contents($path));



// check if all required fields are present
if (!isset($data['name']) || !isset($data['email']) || !isset($data['password'])) {
    http_response_code(400); // bad request
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

// validate the data
$name     = filter_var($data['name'],     FILTER_SANITIZE_STRING);
$email    = filter_var($data['email'],    FILTER_SANITIZE_EMAIL);
$password = filter_var($data['password'], FILTER_SANITIZE_STRING);



if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400); // bad request
    echo json_encode(['error' => 'Invalid email address']);
    exit;
}

// hash the password
$password = md5($password, PASSWORD_DEFAULT);

//connect to the database
$conn = mysqli_connect('localhost','username','root','batech');

// insert the user into the database
$query = "INSERT INTO register (name, email, password) VALUES ('$name', '$email', '$password')";
$result = mysqli_query($conn, $query);

if($result){
    http_response_code(201); // created
    echo json_encode(['message' => 'User created successfully']);
}else{
    http_response_code(500); // internal server error
    echo json_encode(['error' => 'Failed to create user']);
}
