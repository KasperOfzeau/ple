<?php
include 'config.php';
$directory_thumb = "../gfx/objectives/thumbnails/";
$directory_examples = "../gfx/objectives/examples/";

if(count($_POST) > 0){
	if($_POST['type'] == 1) {

		$title = $_POST['title'];
		$description = $_POST['description'];
		$instructions = $_POST['instructions'];
		$thumbnail = $_FILES['thumbnail']['name'];
		$example1 = $_FILES['example-1']['name'];
		$example2 = $_FILES['example-2']['name'];
		$example3 = $_FILES['example-3']['name'];
		$example4 = $_FILES['example-4']['name'];
		$end_time = $_POST['end_time'];

		$sql = "INSERT INTO `objectives`( `title`, `description`, `instructions`, `thumbnail`, `example_image1`, `example_image2`, `example_image3`, `example_image4`, `end_time`) 
		VALUES ('$title','$description','$instructions','$thumbnail','$example1','$example2','$example3','$example4','$end_time')";
		if (mysqli_query($conn, $sql)) {

			$uploadedFiles = [];

			// Function to handle file upload and check for errors
			function handleFileUpload($file, $targetDirectory)
			{
				$targetFile = $targetDirectory . basename($file['name']);

				if (move_uploaded_file($file['tmp_name'], $targetFile)) {
					// File was successfully uploaded and saved
					return true;
				} else {
					return false;
				}
			}

			// Handle thumbnail upload
			if (!empty($thumbnail)) {
				if (handleFileUpload($_FILES["thumbnail"], $directory_thumb)) {
					$uploadedFiles[] = $thumbnail;
				} else {
					$uploadErrors[] = "Error uploading thumbnail.";
				}
			}

			// Handle example images upload
			$exampleFiles = [$example1, $example2, $example3, $example4];

			foreach ($exampleFiles as $key => $exampleFile) {
				if (!empty($exampleFile)) {
					if (handleFileUpload($_FILES["example-" . ($key + 1)], $directory_examples)) {
						$uploadedFiles[] = $exampleFile;
					} else {
						$uploadErrors[] = "Error uploading example image: " . $exampleFile;
					}
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
	}
}

if (count($_POST) > 0) {
    if ($_POST['type'] == 2) {

        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
		$instructions = $_POST['instructions'];
        $end_time = $_POST['end_time'];

		if(isset($_FILES['thumbnail']['name']) && $_FILES['thumbnail']['name'] != "") {
			// Retrieve the existing filename from the database
			$sql = "SELECT thumbnail FROM `objectives` WHERE id = $id";
			$result = mysqli_query($conn, $sql);

			if ($result && mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				$existingThumbnail = $row['thumbnail'];

				// Delete the existing thumbnail image file
				$existingFilePath = $directory_thumb . $existingThumbnail;

				if (file_exists($existingFilePath)) {
					if (unlink($existingFilePath)) {
						// Existing thumbnail image file deleted successfully

						// Handle the upload of the new thumbnail image file
						if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == 0) {
							$newThumbnail = $_FILES["thumbnail"]["name"];
							$newThumbnailPath = $directory_thumb . $newThumbnail;
			
							// Move the uploaded file to the desired location
							if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $newThumbnailPath)) {
								// New thumbnail image file uploaded and saved successfully

								// Update the record in the database with the new information
								$updateSql = "UPDATE `objectives` SET `title`='$title', `description`='$description', `instructions`='$instructions', `thumbnail`='$newThumbnail', `end_time`='$end_time' WHERE id = $id";
			
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
			$updateSql = "UPDATE `objectives` SET `title`='$title', `description`='$description', `instructions`='$instructions', `end_time`='$end_time' WHERE id = $id";
			
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
            $filePath = $directory_thumb . $filename;

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
			$example1 = $row['example_image1'];
			$example2 = $row['example_image2'];
			$example3 = $row['example_image3'];
			$example4 = $row['example_image4'];

            // Delete the image file
            $filePath = $directory_thumb . $filename;

            if (file_exists($filePath)) {
                if (unlink($filePath)) {
					
					// Delete the example images
					$uploadedFiles = [];
					$uploadErrors = [];

					$exampleFiles = [$example1, $example2, $example3, $example4];

					foreach ($exampleFiles as $exampleFile) {
						if (!empty($exampleFile)) {
							$exampleFilePath = $directory_examples . $exampleFile;
							if (file_exists($exampleFilePath)) {
								if (unlink($exampleFilePath)) {
									// Example image deleted successfully
									$uploadedFiles[] = $exampleFile;
								} else {
									// Error deleting example image
									$uploadErrors[] = "Error uploading example image: " . $exampleFile;
								}
							} else {
								// Example image not found
								$uploadErrors[] = "Example image not found: " . $exampleFile;
							}
						} else {
							// Example image not found
							$uploadErrors[] = "Example image not found: " . $exampleFile;
						}
					}

					if($uploadErrors == []) {
						// Delete the record from the database
						$sql = "DELETE FROM `objectives` WHERE id = $id";

						if (mysqli_query($conn, $sql)) {
							echo $id;
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
					} else {
						echo json_encode(["statusCode" => 201, "message" => "Failed to delete the example images."]);
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