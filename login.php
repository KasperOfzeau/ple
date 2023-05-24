<?php
include 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | Objectives Data</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/login.js"></script>
    </head>
    <body>
    <div class="container">
            <h1>Login Page</h1>
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <div id="error-msg" class="alert alert-danger" role="alert"></div>
                    <form id="login-form" method="post" name="login-form">
                    <div class="mb-3">
                            <label for="email">Email address</label> 
                            <input id="email" class="form-control" name="email" type="email" placeholder="Enter email"></div>
                            <div class="mb-3">
                            <label for="password">Password</label> 
                            <input id="password" class="form-control" name="password" type="password" placeholder="Password">
                        </div>
                        <button id="login" class="btn btn-primary" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>