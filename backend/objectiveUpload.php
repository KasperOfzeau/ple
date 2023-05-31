<?php
include 'config.php';

$directory_photos = "../gfx/objectives/photos/";

$objective_id = $_POST['objective_id'];
$user_id = $_POST['user_id'];

$originalPhotoName = $_FILES['photo']['name'];
$newPhotoName = $objective_id . '_' . $user_id . '.jpg';

$sql = "INSERT INTO `photos`( `objective_id`, `user_id`, `photo`) 
VALUES ('$objective_id','$user_id','$newPhotoName')";

if (mysqli_query($conn, $sql)) {

    $uploadedFiles = [];

    // Function to handle file upload and check for errors
    function handleFileUpload($file, $targetDirectory, $newName){
        
        $targetFile = $targetDirectory . basename($newName);
        $photo = imagecreatefromstring(file_get_contents($file['tmp_name']));
        imagejpeg($photo, $targetFile, 90);
        imagedestroy($photo);

         // Check if the image was successfully converted and saved
        if (file_exists($targetFile)) {
            return true;
        } else {
            return false;
        }
    }

    // Handle photo upload
    if (!empty($originalPhotoName)) {
        if (handleFileUpload($_FILES["photo"], $directory_photos, $newPhotoName)) {
            $uploadedFiles[] = $originalPhotoName;
        } else {
            $uploadErrors[] = "Error uploading photo.";
        }
    }

    if (empty($uploadErrors)) {
        // All files were successfully uploaded
        echo json_encode(array("statusCode" => 200));
    } else {
        // There were errors in file uploads
        echo json_encode(array("statusCode" => 400, "errors" => $uploadErrors));
    }
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
