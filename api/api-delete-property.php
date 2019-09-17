<?php


session_start();

if (!$_SESSION) {
    sendErrorMessage('cannot delete property', __LINE__);
}

if ($_SESSION['id'][0] != 'A' && strlen($_SESSION['id']) != 33) {
    sendErrorMessage('cannot delete property', __LINE__);
}

$saProperties = file_get_contents(__DIR__ . '/../data/properties.json');
$aProperties = json_decode($saProperties);
$i = 0;
foreach ($aProperties as $jProperty) {
    if ($_GET['id'] == $jProperty->id) {
        //found property
        if ($_SESSION['id'] == $jProperty->agentId) {
            //match agent id
            unlink(__DIR__ . '/../images/property-img/' . $jProperty->image . '');
            array_splice($aProperties, $i, 1);
            //unset($aProperties[$i]);
            $saProperties = json_encode($aProperties, JSON_PRETTY_PRINT);
            file_put_contents(__DIR__ . '/../data/properties.json', $saProperties);

            echo '{"status":1, "message":"property deleted"}';
            exit;
        }
    }
    $i++;
}
sendErrorMessage('cannot delete property', __LINE__);



function sendErrorMessage($sErrorMessage, $iErrorLineNumber)
{
    echo '{"status":0,"message":"' . $sErrorMessage . '","line":' . $iErrorLineNumber . '}';
    exit;
}
