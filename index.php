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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/hero.css">
    <link rel="stylesheet" href="css/cards.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <a href="#" class="logo">Logo</a>
            </div>
            <div class="navbar-right">   
                <a class="navbar-link" href="#">Home</a>
                <a class="navbar-link active" href="#">Objectives</a>
                <a class="navbar-link" href="#">Highlights</a>
            </div>
        </div>
    </nav>
    <div class="hero">
        <div class="hero-content">
            <div class="hero-left">
                <h1 class="hero-title">Objectives</h1>
                <p class="hero-description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes</p>
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