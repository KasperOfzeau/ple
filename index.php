<?php
include 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Oswald:wght@400;700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/ceca6c7c7a.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/hero.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="css/community.css">
    <script href="js/community.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <a href="/ple/" class="logo">Lensspire</a>
            </div>
            <div class="navbar-right">   
                <a class="navbar-link active" href="/ple/">Home</a>
                <a class="navbar-link" href="/ple/objectives.php">Objectives</a>
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
                <h1 class="hero-title">Get inspired with our photography objectives, start shooting now!</h1>
                <p class="hero-description">Join us and connect with a community of like-minded photographers while exploring new ideas and pushing your boundaries.</p>
                <a href="/ple/objectives.php" class="button hero-button">Get started</a>
            </div>
            <div class="hero-right"></div>
        </div>
    </div>
        <?php
            $result = mysqli_query($conn,
            "SELECT p.*
            FROM photos p
            JOIN (
              SELECT photo_id, COUNT(*) AS favorites_count
              FROM favorites
              GROUP BY photo_id
              HAVING COUNT(*) = (
                SELECT COUNT(*) AS max_favorites
                FROM favorites
                GROUP BY photo_id
                ORDER BY max_favorites DESC
                LIMIT 1
              )
            ) f ON p.id = f.photo_id;");
            $i=1;
            if (mysqli_num_rows($result) > 0) {
                ?>
                <div class="home-community padding-m">
                    <h2 class="title">See what other people came up with</h2>
                    <div class="home-community-container">
                    <?php
                        while($row = mysqli_fetch_array($result)) {
                            // Check if the current photo is already favorited by the logged-in user
                            $isFavorited = false;
                            if (!empty($_SESSION['user_id'])) {
                                $favoriteCheckQuery = "SELECT * FROM favorites WHERE user_id = " . $_SESSION['user_id'] . " AND photo_id = " . $row['id'];
                                $favoriteCheckResult = mysqli_query($conn, $favoriteCheckQuery);
                                if (mysqli_num_rows($favoriteCheckResult) > 0) {
                                    $isFavorited = true;
                                }
                            }
                            ?>
                            <div class="community-image">
                                <a href="/ple/highlights.php#<?= $row['id']?>">
                                    <img src="gfx/objectives/photos/<?= $row['photo'] ?>" alt="Image 1">
                                    <?php  if(!empty($_SESSION['user_id'])){ ?>
                                        <span class="favorite-button">
                                            <i class="favorite fas fa-heart <?= $isFavorited ? 'favorited' : '' ?>" 
                                                data-user_id="<?= $_SESSION["user_id"]; ?>" data-photo_id="<?= $row["id"]; ?>">
                                            </i>
                                        </span>
                                    <?php } ?>
                                </a>
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
    </div>
</body>
</html>                                		                            