<?php


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


$sjData = file_get_contents(__DIR__ . '/../data/data.json');
$jData = json_decode($sjData);

//Update the data

$jData->users->$sNewUserId = new stdClass();
$jData->users->$sNewUserId->name = $sNewUserName;
$jData->users->$sNewUserId->lastName = $sNewUserLastName;
$jData->users->$sNewUserId->email = $sNewUserEmail;
$jData->users->$sNewUserId->password = $sNewUserPassword;
$jData->users->$sNewUserId->image = 'default.png';

$sjData = json_encode($jData, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . '/../data/data.json', $sjData);
//echo the id of the agent to create the new element in the DOM with it to be able to update it without refreshing the page
echo '{"status": 1, "message": "agent created", "id":"' . $sNewUserId . '"}';



/** FUNCTIONS **/

function sendErrorMessage($sErrorMessage, $iLineNumber)
{
    echo '{"status":0,"message":"' . $sErrorMessage . '","line":' . $iLineNumber . '}';
    exit;
}
