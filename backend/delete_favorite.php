<?php 
include 'config.php';

// Retrieve the user_id and photo_id from the AJAX request
$user_id = $_POST['user_id'];
$photo_id = $_POST['photo_id'];

// Prepare the SQL statement to delete the favorite
$stmt = $conn->prepare("DELETE FROM favorites WHERE user_id = ? AND photo_id = ?");
$stmt->bind_param("ii", $user_id, $photo_id);

// Execute the statement
$stmt->execute();

// Check if the deletion was successful
if ($stmt->affected_rows > 0) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 400, "error" => "Unable to delete favorite."));
}