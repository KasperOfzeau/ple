<?php
require_once 'config.php';

$error = array();
$res = array();

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email)) {
    $error[] = "Email field is required";
}

if (empty($password)) {
    $error[] = "Password field is required";
}
if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error[] = "Enter Valid Email address";
}

if (count($error) > 0) {
    $resp['msg'] = $error;
    $resp['status'] = false;
    echo json_encode($resp);
    exit;
}

$sql = "SELECT * FROM `users` WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (!password_verify($password, $row['password'])) {
        $error[] = "Password is not valid";
        $resp['msg'] = $error;
        $resp['status'] = false;
        echo json_encode($resp);
        exit;
    }
    session_start();
    $_SESSION['user_id'] = $row['user_id'];
    $resp['redirect'] = "/ple/index.php";
    $resp['status'] = true;
    echo json_encode($resp);
    exit;
} else {
    $error[] = "Email does not match";
    $resp['msg'] = $error;
    $resp['status'] = false;
    echo json_encode($resp);
    exit;
}