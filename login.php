<?php

//start session to know if there is a session already started
session_start();

if ($_SESSION) {
    //redirect to profile
    header("Location:index.php");
}

//check if user tryed to log in


if ($_POST) {
    $sjData = file_get_contents(__DIR__ . '/data/data.json');
    $jData = json_decode($sjData);
    $jUsers = $jData->users;

    foreach ($jUsers as $sUserId => $jUser) {
        $sCorrectEmail = $jUser->email;
        $sCorrectPassword = $jUser->password;
        //THEN ONLY THEN CHECK IF EMAIL MATCHES WITH PASSWORD
        if ($_POST['inpEmail'] == $sCorrectEmail && $_POST['inpPassword'] == $sCorrectPassword) {
            $_SESSION['sUserId'] = $sUserId;
            header("Location:index.php");
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Document</title>
</head>

<body>
    <nav>
        <a href="index.php">LOGO</a>
        <a href="properties-main.php">Buy Property</a>
        <a href="">Find Agent</a>
        <a href="">Become an Agent</a>
        <div>
            <a href="signup.php">Signup</a>
            /
            <a href="login.php">Login</a>
        </div>
        <a class="logout__link" href="">Logout</a>
    </nav>


    <div class="loginContainer">
        <form method="POST">
            <input name="inpEmail" type="text" placeholder="email">
            <input name="inpPassword" type="text" placeholder="password">
            <button>LOGIN</button>
        </form>
    </div>

</body>

</html>