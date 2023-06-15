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
                <h1 class="hero-title">Objectives</h1>
                <p class="hero-description">Unleash your creativity, discover new techniques, and find inspiration to capture the extraordinary. Join our vibrant community on a quest for photographic excellence. Elevate your artistry with objectives on Lenspire.</p>
            </div>
            <div class="hero-right"></div>
        </div>
    </div>
    <div class="cards padding-m">
        <div class="cards-container">
            <h2 class="title">Objectives</h2>
            <div class="cards-wrapper">
                <?php
                $result = mysqli_query($conn,"SELECT * FROM objectives WHERE end_time > NOW() ORDER BY end_time ASC");
                $i=1;
                while($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="card">
                        <img class="card-img" src="gfx/objectives/thumbnails/<?= $row["thumbnail"]; ?>" alt="thumbnail_<?= $row["title"]; ?>">
                        <div class="card-body">
                            <h3 class="card-title"><?= $row["title"]; ?></h3>
                            <?php
                                $end_time = strtotime($row["end_time"]);
                                $now = time();
                                $timeleft = $end_time - $now;
                            
                                if ($timeleft > 86400) { // More than a day remaining
                                    $daysleft = floor($timeleft / 86400);
                                    echo "<p class='card-subtitle'>$daysleft days left</p>";
                                } elseif ($timeleft > 3600) { // More than an hour remaining
                                    $hoursleft = floor($timeleft / 3600);
                                    $minutesleft = floor(($timeleft % 3600) / 60);
                                    echo "<p class='card-subtitle'>$hoursleft hours $minutesleft minutes left</p>";
                                } elseif ($timeleft > 60) { // More than a minute remaining
                                    $minutesleft = floor($timeleft / 60);
                                    echo "<p class='card-subtitle'>$minutesleft minutes left</p>";
                                } else { // Less than a minute remaining
                                    echo "<p>Less than a minute left</p>";
                                }
                            ?>
                            <p class="card-text"><?= $row["description"]; ?></p>
                            <a href="objective.php?id=<?= $row["id"]; ?>" class="button card-button">Get started</a>
                        </div>
                    </div>
                <?php
                $i++;
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>                                		                            