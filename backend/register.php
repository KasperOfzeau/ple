<?php
require_once 'config.php';

$error = array();
$res = array();

$firstName = $_POST['first-name'];
$lastName = $_POST['last-name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($firstName)) {
    $error[] = "First name field is required";
}

if (empty($lastName)) {
    $error[] = "Last name field is required";
}

if (empty($email)) {
    $error[] = "Email field is required";
}

if (empty($password)) {
    $error[] = "Password field is required";
}

if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error[] = "Enter a valid email address";
}

if (count($error) > 0) {
    $resp['msg'] = $error;
    $resp['status'] = false;
    echo json_encode($resp);
    exit;
}

// Check if the email is already registered
$sql = "SELECT * FROM `users` WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $error[] = "Email is already registered";
    $resp['msg'] = $error;
    $resp['status'] = false;
    echo json_encode($resp);
    exit;
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert the user into the database
$insertSql = "INSERT INTO `users` (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$hashedPassword')";
$insertResult = mysqli_query($conn, $insertSql);

if ($insertResult) {
    $resp['redirect'] = "/ple/login.php";
    $resp['status'] = true;
    echo json_encode($resp);
    exit;
} else {
    $error[] = "Registration failed";
    $resp['msg'] = $error;
    $resp['status'] = false;
    echo json_encode($resp);
    exit;
}
?>