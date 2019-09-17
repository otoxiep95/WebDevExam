<?php
session_start();
if (empty($_SESSION['id'])) {
    sendErrorMessage('could not update user', __LINE__);
}
if ($_SESSION['id'][0] != 'U' && strlen($_SESSION['id']) != 33) {
    sendErrorMessage('could not update user', __LINE__);
}
if ($_SESSION['id'] != $_POST['id']) {
    sendErrorMessage('could not update user', __LINE__);
}

if (empty($_POST['key'])) {
    sendErrorMessage('could not update user', __LINE__);
}
if (empty($_POST['value'])) {
    sendErrorMessage('new value is missing', __LINE__);
}

switch ($_POST['type']) {
    case "string":
        if (strlen($_POST['value']) < 2) {
            sendErrorMessage('value too small', __LINE__);
        }
        if (strlen($_POST['value']) > 20) {
            sendErrorMessage('value too big', __LINE__);
        }
        break;
    case "email":
        if (!filter_var($_POST['value'], FILTER_VALIDATE_EMAIL)) {
            sendErrorMessage('not a valid email', __LINE__);
        }
        break;
    default:
        sendErrorMessage('could not update agent', __LINE__);
}


$sUserId = $_POST['id'];
$sKeyToUpdate = $_POST['key'];
$sNewValue = $_POST['value'];


$sjUsers = file_get_contents(__DIR__ . '/../data/users.json');
$jUsers = json_decode($sjUsers);

//Update the data
$jUsers->$sUserId->$sKeyToUpdate = $sNewValue;

$sjUsers = json_encode($jUsers, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . '/../data/users.json', $sjUsers);


echo '{"status":1, "message": "user updated"}';

function sendErrorMessage($sErrorMessage, $iLine)
{
    echo '{"status":0, "message":"' . $sErrorMessage . '", "line":' . $iLine . '}';
    exit;
}
