<?php
include 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Highlights</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Oswald:wght@400;700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/ceca6c7c7a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/hero.css">
	<link rel="stylesheet" href="css/highlights.css">
    <script src="js/highlights.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <a href="/ple/" class="logo">Lensspire</a>
            </div>
            <div class="navbar-right">   
                <a class="navbar-link" href="/ple/">Home</a>
                <a class="navbar-link" href="/ple/objectives.php">Objectives</a>
                <a class="navbar-link active" href="/ple/highlights.php">Highlights</a>
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
    <main>
        <div class="hero">
            <div class="hero-content">
                <div class="hero-left">
                    <h1 class="hero-title">Highlights</h1>
                    <p class="hero-description">Where photographic brilliance shines! Explore the most beloved photos, curated for your inspiration. Let the power of visuals captivate your imagination on Lenspire.</p>
                </div>
                <div class="hero-right"></div>
            </div>
        </div>
        <div class="highlights padding-m">
            <div class="highlights-container">
                <h2 class="title">Highlights</h2>
                <div class="highlights-wrapper">
                    <?php 
                        // Prepare and execute the SQL query to retrieve the photos ordered by the most favorites
                        $sql = "SELECT photos.photo, favorites.photo_id, COUNT(favorites.photo_id) AS favorites_count, users.first_name, users.last_name, objectives.title, objectives.id
                        FROM photos
                        LEFT JOIN favorites ON photos.id = favorites.photo_id
                        LEFT JOIN users ON photos.user_id = users.user_id
                        LEFT JOIN objectives ON photos.objective_id = objectives.id
                        GROUP BY photos.id
                        ORDER BY favorites_count DESC;";
                        $result = $conn->query($sql);

                        // Check if any photos were found
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="highlight" id="<?= $row['photo_id'] ?>">
                                <img 
                                    class="highlight-img" 
                                    src="gfx/objectives/photos/<?= $row["photo"]; ?>" 
                                    alt="photo by: <?= $row["first_name"] . " " . $row['last_name']; ?>"
                                    data-id="<?= $row['id']; ?>"
                                    data-photo="<?= $row["photo"]; ?>"
                                    data-name="<?= $row["first_name"] . " " . $row['last_name']; ?>"
                                    data-title="<?= $row["title"]; ?>"
                                    data-favorites="<?= $row["favorites_count"]; ?>"
                                >
                                <div class="highlight-body">
                                    <a href="/ple/objective.php?id=<?= $row['id']; ?>" class="highlight-link">
                                        <h3 class="highlight-title"><?= $row['title'];?></h3>
                                    </a>
                                    <p class="highlight-text">By: <?= $row["first_name"] . " " . $row['last_name']; ?></p>
                                    <p class="highlight-text">Favorites: <?= $row["favorites_count"]; ?></p>
                                </div>   
                            </div>
                        <?php
                        }
                        } else {
                            echo "No photos found.";
                        }
                    ?>
                </div> 
            </div>
        </div>
        <div id="highlight-modal" class="modal">
            <span class="close">&times;</span>
            <div class="modal-content">
                <img id="modal-img">
                <div id="caption">
                    <div class="caption-container">
                        <a href="" class="modal-link">
                            <h3 id="modal-title" class="title"></h3>
                        </a>
                        <p id="modal-name"></p>
                        <p id="modal-favorites-count"></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>    