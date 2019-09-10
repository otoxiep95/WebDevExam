<?php

if ($_POST) {
    //FIRST VERIFY IS USER FILLED UP EMAIL AND PASSWORD
    if (empty($_POST['inpEmail'])) {
        sendErrorMessage('email is missing', __LINE__);
    }

    if (empty($_POST['inpPassword'])) {
        sendErrorMessage('password is missing', __LINE__);
    }

    // //THEN VALIDATE THE CONTENT OF THE INPUT EMAIL
    // if (!filter_var($_POST['inpEmail'], FILTER_VALIDATE_EMAIL)) {
    //     sendErrorMessage('inpEmail is invalid, please enter a valid email', __LINE__);
    // }
    // //VALIDATE LENGTH OF PASSWORD
    // if (strlen($_POST['inpPassword']) < 8) {
    //     sendErrorMessage('password is too short', __LINE__);
    // }
    // if (strlen($_POST['inpPassword']) > 100) {
    //     sendErrorMessage('password is too long', __LINE__);
    // }

    $sNewUserId = bin2hex(random_bytes(16)); //better than uniqid(), 32 chars

    $sNewUserName = $_POST['inpName'];
    $sNewUserLastName = $_POST['inpLastName'];
    $sNewUserEmail = $_POST['inpEmail'];
    $sNewUserPassword = $_POST['inpPassword'];



    $sjData = file_get_contents(__DIR__ . '/data/data.json');
    $jData = json_decode($sjData);

    //Update the data

    $jData->users->$sNewUserId = new stdClass();
    $jData->users->$sNewUserId->name = $sNewUserName;
    $jData->users->$sNewUserId->lastName = $sNewUserLastName;
    $jData->users->$sNewUserId->email = $sNewUserEmail;
    $jData->users->$sNewUserId->password = $sNewUserPassword;
    $jData->users->$sNewUserId->image = 'default.png';

    $sjData = json_encode($jData, JSON_PRETTY_PRINT);
    file_put_contents(__DIR__ . '/data/data.json', $sjData);
}
//echo the id of the agent to create the new element in the DOM with it to be able to update it without refreshing the page




/** FUNCTIONS **/

function sendErrorMessage($sErrorMessage, $iLineNumber)
{
    echo '{"status":0,"message":"' . $sErrorMessage . '","line":' . $iLineNumber . '}';
    exit;
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

    <div class="signupContainer">
        <form method="POST">
            <input name="inpName" type="text" placeholder="name">
            <input name="inpLastName" type="text" placeholder="last name">
            <input name="inpEmail" type="text" placeholder="email">
            <input name="inpPassword" type="text" placeholder="password">
            <button>SIGNUP AS USER</button>
        </form>
    </div>



</body>

</html>