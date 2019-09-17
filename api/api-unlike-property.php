<?php

session_start();

if (!$_SESSION) {
    sendErrorMessage('could not like property', __LINE__);
}

if ($_SESSION['id'][0] != 'U' && strlen($_SESSION['id']) != 33) {
    sendErrorMessage('could not like property', __LINE__);
}

if (empty($_GET)) {
    sendErrorMessage('could not like property', __LINE__);
}

if (strlen($_GET['propertyId']) != 13) {
    sendErrorMessage('could not like property', __LINE__);
}


$propertyId = $_GET['propertyId'];
$sjUsers = file_get_contents(__DIR__ . '/../data/users.json');
$jUsers = json_decode($sjUsers);
$userId = $_SESSION['id'];
$aLikedProperties = $jUsers->$userId->likedProperties;


if (in_array($propertyId, $aLikedProperties)) {
    for ($i = 0; $i < count($aLikedProperties); $i++) {
        if ($aLikedProperties[$i] == $propertyId) {
            array_splice($jUsers->$userId->likedProperties, $i, 1);

            $sjUsers = json_encode($jUsers, JSON_PRETTY_PRINT);
            file_put_contents(__DIR__ . '/../data/users.json', $sjUsers);
            echo '{"status":1, "message":"property unliked", "line":"' . __LINE__ . '"}';
        }
    }
}






function sendErrorMessage($sErrorMessage, $iLine)
{
    echo '{"status":0, "message":"' . $sErrorMessage . '", "line":' . $iLine . '}';
    exit;
}
