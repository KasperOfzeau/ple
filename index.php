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
    <header class="header">
        <div class="header-container">
            <!-- Logo -->
            <a href="/ple/" class="logo">Lensspire</a>
            <!-- Hamburger icon -->
            <input class="side-menu" type="checkbox" id="side-menu"/>
            <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>
            <!-- Menu -->
            <nav class="nav">
                <ul class="menu">
                    <li><a href="/ple/">Home</a></li>
                    <li><a href="/ple/objectives.php">Objectives</a> </li>
                    <li><a href="/ple/highlights.php">Highlights</a></li>
                    <?php
                        session_start();
                        if(empty($_SESSION['user_id'])){
                            echo '<li><a class="login-link" href="/ple/login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>';
                        } else {
                            echo '<li><a class="login-link" href="/ple/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>';
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </header>

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
            ) f ON p.id = f.photo_id
            ORDER BY f.favorites_count DESC
            LIMIT 6");
            $i=1;
            if (mysqli_num_rows($result) > 0) {
                ?>
                <div class="home-community padding-m">
                    <h2 class="title">See what other people came up with</h2>
                    <div class="home-community-container">
                    <?php
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                            <div class="community-image">
                                <a href="/ple/highlights.php#<?= $row['id']?>">
                                    <img src="gfx/objectives/photos/<?= $row['photo'] ?>" alt="Image 1">
                                    <?php  if(!empty($_SESSION['user_id'])){ ?>
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