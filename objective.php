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
	<link rel="stylesheet" href="css/loader.css">
    <script src="js/objective.js"></script>
</head>
<body>
	<div id="loading-overlay"><div class="loader"></div></div>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <a href="#" class="logo">Logo</a>
            </div>
            <div class="navbar-right">   
                <a class="navbar-link" href="#">Home</a>
                <a class="navbar-link active" href="/ple/">Objectives</a>
                <a class="navbar-link" href="#">Highlights</a>
                <?php
                    session_start();
                    if(empty($_SESSION['user_id'])){
                        echo '<a class="navbar-link" href="/ple/login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a>';
                    } else {
                        echo '<a class="navbar-link" href="/ple/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>';
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
                <a href="#" class="button hero-button"><i class="fa-solid fa-camera"></i> Upload my photo</a>
            </div>
        </div>
    </div>

    <main>
        <div class="objective-container">
            <div class="instructions-container padding-m">
                <h2>Instructions</h2>
                <p class="instructions"></p>
            </div>
            <div class="examples padding-m"></div>
        </div>
    </main>
</body>
</html>                                		                            