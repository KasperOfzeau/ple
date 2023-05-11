<?php
include 'database.php';
$directory = "../gfx/objectives/thumbnails/";

if(count($_POST) > 0){
	if($_POST['type'] == 1) {

		$title = $_POST['title'];
		$description = $_POST['description'];
		$thumbnail = $_FILES['thumbnail']['name'];
		$end_time = $_POST['end_time'];

		$sql = "INSERT INTO `objectives`( `title`, `description`,`thumbnail`,`end_time`) 
		VALUES ('$title','$description','$thumbnail','$end_time')";
		if (mysqli_query($conn, $sql)) {

			$directory = "../gfx/objectives/thumbnails/";  // Specify the directory where you want to save the file
			$targetFile = $directory . basename($_FILES["thumbnail"]["name"]);
			
			// Move the uploaded file to the desired location
			if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile)) {
				// File was successfully uploaded and saved
				echo json_encode(array("statusCode" => 200));
			}
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if (count($_POST) > 0) {
    if ($_POST['type'] == 2) {

        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $end_time = $_POST['end_time'];

		if(isset($_FILES['thumbnail']['name']) && $_FILES['thumbnail']['name'] != "") {
			// Retrieve the existing filename from the database
			$sql = "SELECT thumbnail FROM `objectives` WHERE id = $id";
			$result = mysqli_query($conn, $sql);

			if ($result && mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				$existingThumbnail = $row['thumbnail'];

				// Delete the existing thumbnail image file
				$existingFilePath = $directory . $existingThumbnail;

				if (file_exists($existingFilePath)) {
					if (unlink($existingFilePath)) {
						// Existing thumbnail image file deleted successfully

						// Handle the upload of the new thumbnail image file
						if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0) {
							$newThumbnail = $_FILES["thumbnail"]["name"];
							$newThumbnailPath = $directory . $newThumbnail;
			
							// Move the uploaded file to the desired location
							if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $newThumbnailPath)) {
								// New thumbnail image file uploaded and saved successfully

								// Update the record in the database with the new information
								$updateSql = "UPDATE `objectives` SET `title`='$title', `description`='$description', `thumbnail`='$newThumbnail', `end_time`='$end_time' WHERE id = $id";
			
								if (mysqli_query($conn, $updateSql)) {
									echo json_encode(array("statusCode" => 200));
								} else {
									echo json_encode(["statusCode" => 201, "message" => "Failed to update the objectives in the database."]);
								}
							} else {
								echo json_encode(["statusCode" => 201, "message" => "Failed to save the new thumbnail image file."]);
							}
						} else {
							echo json_encode(["statusCode" => 201, "message" => "No new thumbnail image file uploaded or an error occurred during upload."]);
						}
					} else {
						echo json_encode(["statusCode" => 201, "message" => "Failed to delete the existing thumbnail image file."]);
						exit;
					}	
				} else {
					echo json_encode(["statusCode" => 201, "message" => "Existing thumbnail image file not found."]);
					exit;
				}
			} else {
				echo json_encode(["statusCode" => 201, "message" => "No record found for the given ID."]);
			}
		} else {
			// Update the record in the database with the new information
			$updateSql = "UPDATE `objectives` SET `title`='$title', `description`='$description', `end_time`='$end_time' WHERE id = $id";
			
			if (mysqli_query($conn, $updateSql)) {
				echo json_encode(array("statusCode" => 200));
			} else {
				echo json_encode(["statusCode" => 201, "message" => "Failed to update the objectives in the database."]);
			}

			mysqli_close($conn);
		}
    }
}

if (count($_POST) > 0) {
    if ($_POST['type'] == 3) {

        $id = $_POST['id'];

        // Retrieve the thumbnail from the database
        $sql = "SELECT thumbnail FROM `objectives` WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $filename = $row['thumbnail'];

            // Delete the image file
            $filePath = $directory . $filename;

            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    // Delete the record from the database
					$sql = "DELETE FROM `objectives` WHERE id = $id";

					if (mysqli_query($conn, $sql)) {
						echo $id;
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
                } else {
                    echo json_encode(["statusCode" => 201, "message" => "Failed to delete the image file."]);
                }
            } else {
                echo json_encode(["statusCode" => 201, "message" => "Image file not found."]);
            }
        } else {
            echo json_encode(["statusCode" => 201, "message" => "No record found for the given ID."]);
        }

        mysqli_close($conn);
    }
}

if (count($_POST) > 0) {
    if ($_POST['type'] == 4) {

        $id = $_POST['id'];

        // Retrieve the thumbnail from the database
        $sql = "SELECT thumbnail FROM `objectives` WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $filename = $row['thumbnail'];

            // Delete the image file
            $filePath = $directory . $filename;

            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    // Delete the record from the database
					$sql = "DELETE FROM `objectives` WHERE id = $id";

					if (mysqli_query($conn, $sql)) {
						echo $id;
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
                } else {
                    echo json_encode(["statusCode" => 201, "message" => "Failed to delete the image file."]);
                }
            } else {
                echo json_encode(["statusCode" => 201, "message" => "Image file not found."]);
            }
        } else {
            echo json_encode(["statusCode" => 201, "message" => "No record found for the given ID."]);
        }

        mysqli_close($conn);
    }
}

?>