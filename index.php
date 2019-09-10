<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>HOME</title>
</head>

<body>
    <nav>
        <a href="index.php">LOGO</a>
        <a href="properties-main.php">Buy Property</a>
        <a href="">Find Agent</a>
        <a href="">Become an Agent</a>
        <div>
            <?php   
            session_start();
            var_dump($_SESSION);
            if (!$_SESSION) {
                echo '<a href="signup.php">Signup</a>
                    /
                    <a href="login.php">Login</a>';
            } else {
                echo '<a href="logout.php">Logout</a>';
            }


            ?>

            <!-- <a href="signup.php">Signup</a>
            /
            <a href="login.php">Login</a> -->
        </div>
        <a class="logout__link" href="">Logout</a>
    </nav>

    <div class="main__search">
        <div>
            <h1>Welcome to you home finder</h1>
            <h3>We'll help you find a place to call home</h3>
            <form>
                <input type="text" placeholder="Enter ZIP or adress"><a href="properties-main.php?zip=2222"><img src="images/icons/search.svg"></a>
            </form>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/app.js"></script>

</body>

</html>