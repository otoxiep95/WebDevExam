<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.css' rel='stylesheet' />
    <title>HOME</title>
</head>

<body>

    <nav>
        <a href="index.php"><img src=" images/logo.svg"></a>
        <a href="properties-main.php">Buy Property</a>

        <?php
        if (!$_SESSION) {
            echo '<div class="dropdown">
          <div class="dropbtn">I&#39;m an Agent</div>
          <div class="dropdown_content">
              <a href="agent-login.php">Login</a>
              <a href="agent-signup.php">Signup</a>
          </div>

      </div>';
        } else {

            if ($_SESSION['id'][0] == 'A') {
                echo '<a href="agent-profile.php">My Profile</a>';
            } elseif ($_SESSION['id'][0] == 'U') {
                echo '<a href="user-profile.php">My Profile</a>';
            }
        }

        ?>

        <div>
            <?php

            // var_dump($_SESSION);
            if (!$_SESSION) {
                echo '<a href="user-signup.php">Signup</a>
                    /
                    <a href="user-login.php">Login</a>';
            } else {
                echo '<a href="logout.php">Logout</a>';
            }

            ?>


        </div>

    </nav>