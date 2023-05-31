<?php
include 'config.php';

// Retrieve the user_id and photo_id from the AJAX request
$user_id = $_POST['user_id'];
$photo_id = $_POST['photo_id'];

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO favorites (user_id, photo_id) VALUES (?, ?)");

// Bind the parameters and execute the statement
$stmt->bind_param("ii", $user_id, $photo_id);
$stmt->execute();

// Check if the insertion was successful
if ($stmt->affected_rows > 0) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(["statusCode" => 201, "message" => "Failed to update the objectives in the database."]);
}
