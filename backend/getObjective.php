<?php
include 'config.php';

// checking if data exists
if ($_POST['id'] != null){
    $id = $_POST['id'];

    $stmt = $conn->prepare("SELECT * FROM objectives WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $jsonData = json_encode($row);
    echo $jsonData;

    $stmt->close();
}else{
    // either of the values doesn't exist
    echo json_encode(["statusCode" => 201, "message" => "No ID given."]);
}