<?php
include 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Objective</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Oswald:wght@400;700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/ceca6c7c7a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/hero.css">
	<link rel="stylesheet" href="css/objective.css">
    <link rel="stylesheet" href="css/community.css">
	<link rel="stylesheet" href="css/loader.css">
    <script src="js/objective.js"></script>
    <script src="js/community.js"></script>
</head>
<body>
	<div id="loading-overlay"><div class="loader"></div></div>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <a href="#" class="logo">Lensspire</a>
            </div>
            <div class="navbar-right">   
                <a class="navbar-link" href="#">Home</a>
                <a class="navbar-link active" href="/ple/">Objectives</a>
                <a class="navbar-link" href="/ple/highlights.php">Highlights</a>
                <?php
                    session_start();
                    if(empty($_SESSION['user_id'])){
                        echo '<a class="navbar-link login-link" href="/ple/login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a>';
                    } else {
                        echo '<a class="navbar-link login-link" href="/ple/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>';
                    }
                ?>
            </div>
        </div>
    </nav>
	<div class="hero">
        <div class="hero-content">
            <div class="hero-left">
                <h1 class="hero-title"></h1>
				<p class="hero-subtitle"></p>
                <p class="hero-description"></p>
            </div>
            <div class="hero-right">
                <?php
                    if(empty($_SESSION['user_id'])){
                        echo '<a class="button hero-button" href="/ple/login.php"><i class="fa-solid fa-camera"></i> Upload my photo</a>';
                    } else {
                        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
                        $currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                        preg_match('/[?&]id=([^&]+)/', $currentURL, $matches); // Match the 'id' parameter
                        $objective_id = $matches[1]; // Get the value of the 'id' parameter
                        
                        if(file_exists("gfx/objectives/photos/" . $objective_id . "_" . $_SESSION['user_id'] . ".jpg")) {
                            // Photo exists
                            echo '<button class="button hero-button"><i class="fa-solid fa-check"></i> Photo uploaded</button>';
                        } else {
                            // Photo does not exist
                            echo '<button id="hero-button" class="button hero-button"><i class="fa-solid fa-camera"></i> Upload my photo</button>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <main>
        <div class="objective-container">
            <div class="instructions-container padding-m">
                <h2 class="title">Instructions</h2>
                <p class="instructions"></p>
            </div>
            <div class="examples padding-m"></div>
            <?php
                if($_SESSION['user_id']) {
                    $result = mysqli_query($conn,"SELECT * FROM photos WHERE user_id !=" . $_SESSION['user_id'] . " AND objective_id = " . $objective_id);
                } else {
                    $result = mysqli_query($conn,"SELECT * FROM photos WHERE objective_id =" . $objective_id);
                }
                $i=1;
                if (mysqli_num_rows($result) > 0) {
                    ?>
                    <div class="community padding-m">
                        <h2 class="title">See what other people came up with</h2>
                        <div class="community-container">
                        <?php
                            while($row = mysqli_fetch_array($result)) {
                                // Check if the current photo is already favorited by the logged-in user
                                $isFavorited = false;
                                if ($_SESSION['user_id']) {
                                    $favoriteCheckQuery = "SELECT * FROM favorites WHERE user_id = " . $_SESSION['user_id'] . " AND photo_id = " . $row['id'];
                                    $favoriteCheckResult = mysqli_query($conn, $favoriteCheckQuery);
                                    if (mysqli_num_rows($favoriteCheckResult) > 0) {
                                        $isFavorited = true;
                                    }
                                }
                                ?>
                                <div class="community-image">
                                    <img src="gfx/objectives/photos/<?= $row['photo'] ?>" alt="Image 1">
                                    <?php  if(!empty($_SESSION['user_id'])){ ?>
                                        <span class="favorite-button">
                                            <i class="favorite fas fa-heart <?= $isFavorited ? 'favorited' : '' ?>" 
                                                data-user_id="<?= $_SESSION["user_id"]; ?>" data-photo_id="<?= $row["id"]; ?>">
                                            </i>
                                        </span>
                                    <?php } ?>
                                </div>
                                <?php
                            } 
                            ?>
                        </div>
                    <div>
                </div>
            <?php
                } 
            ?>
        <!-- Modal content -->
        <div id="uploadModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <form id="photo_form">
                    <input type="file" id="photo" name="photo" class="file-input" accept="image/*">
                    <input type="hidden" id="objective_id" name="objective_id" class="objective_id">
                    <input type="hidden" id="user_id" name="user_id" class="user_id" value="<?= $_SESSION['user_id'] ?>">
                    <button type="button" class="button" id="btn-add">Upload</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>                                		                            