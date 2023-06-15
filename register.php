<?php
include 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register | Lenspire</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/register.js"></script>
    </head>
    <body>
    <div class="container">
            <h1>Register</h1>
            <div class="card">
                <div class="card-body">
                    <div id="error-msg" class="alert alert-danger" role="alert"></div>
                    <form id="register-form" method="post" name="register-form">
                        <div class="mb-3">
                            <label for="first-name">First name</label> 
                            <input id="first-name" name="first-name" type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="mb-3">
                            <label for="last-name">Last name</label> 
                            <input id="last-name" name="last-name" type="text" class="form-control" placeholder="Last name">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email address</label> 
                            <input id="email" class="form-control" name="email" type="email" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label> 
                            <input id="password" class="form-control" name="password" type="password" placeholder="Password">
                        </div>
                        <button id="register" class="btn btn-primary" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>