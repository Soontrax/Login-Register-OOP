<?php
    $file_path = realpath(dirname(__FILE__));
    include_once $file_path.'/../lib/Session.php';
    Session::init();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Register OOP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="inc/bootstrap.min.css" />
    <script src="inc/bootstrap.min.js"></script>
    <script src="inc/jquery.min.js"></script>

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand">Title</a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Text</a>
                    </li>
                </ul>
            </div>

            <ul class="nav navbar-nav pull-right">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="#">Logout</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </div>