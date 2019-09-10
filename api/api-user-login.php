<?php


/* 
 IF THE USER ALREADY IS LOGGED IN
*/
session_start();
if ($_SESSION) {
    echo '{"status":1,"message":"Successful logged in"}';
    exit;
}



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


$sjData = file_get_contents(__DIR__ . '/../data/data.json');
$jData = json_decode($sjData);
$jUsers = $jData->users;

foreach ($jUsers as $sUserId => $jUser) {
    $sCorrectEmail = $jUser->email;
    $sCorrectPassword = $jUser->password;
    //THEN ONLY THEN CHECK IF EMAIL MATCHES WITH PASSWORD
    if (!($_POST['inpEmail'] == $sCorrectEmail && $_POST['inpPassword'] == $sCorrectPassword)) {
        sendErrorMessage('incorrect email and password combination ', __LINE__);
    }
}



$sInputEmail = $_POST['inpEmail'];
$sInputPassword = $_POST['inpPassword'];

//session_start();
$_SESSION['sUserId'] = 'x';

echo '{"status":1,"message":"Successful logged in"}';









/** FUNCTIONS **/

function sendErrorMessage($sErrorMessage, $iLineNumber)
{
    echo '{"status":0,"message":"' . $sErrorMessage . '","line":' . $iLineNumber . '}';
    exit;
}
