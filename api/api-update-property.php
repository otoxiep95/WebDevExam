<?php

session_start();
if (empty($_SESSION['id'])) {
    sendErrorMessage('could not update agent', __LINE__);
}
if ($_SESSION['id'][0] != 'A' && strlen($_SESSION['id']) != 33) {
    sendErrorMessage('could not update agent', __LINE__);
}

// if (empty($_POST['key'])) {
//     sendErrorMessage('could not update agent', __LINE__);
// }
if (empty($_POST['value'])) {
    sendErrorMessage('new value is missing', __LINE__);
}

if (!ctype_digit($_POST['value'])) {
    sendErrorMessage('error, price is not a number', __LINE__);
}
if ($_POST['value'] < 1) {
    sendErrorMessage('value is not valid. Value must be bigger than 0', __LINE__);
}
if ($_POST['value'] >= 9999999999999) {
    sendErrorMessage('value is not valid. Value must be smaller than 9999999999999', __LINE__);
}



$saProperties = file_get_contents(__DIR__ . '/../data/properties.json');
$aProperties = json_decode($saProperties);

$i = 0;
foreach ($aProperties as $jProperty) {
    echo 'looking';
    if ($_POST['id'] == $jProperty->id) {
        //found property
        echo 'found property';
        if ($_SESSION['id'] == $jProperty->agentId) {
            //match agent id
            echo 'agent id match';
            $jProperty->price = $_POST['value'];

            $saProperties = json_encode($aProperties, JSON_PRETTY_PRINT);
            file_put_contents(__DIR__ . '/../data/properties.json', $saProperties);

            echo '{"status":1, "message":"property updated"}';
            exit;
        }
    }
    $i++;
}
sendErrorMessage('cannot update property', __LINE__);

function sendErrorMessage($sErrorMessage, $iLine)
{
    echo '{"status":0, "message":"' . $sErrorMessage . '", "line":' . $iLine . '}';
    exit;
}
