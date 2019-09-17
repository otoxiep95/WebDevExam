<?php
session_start();
if (empty($_SESSION['id'])) {
    sendErrorMessage('could not update agent', __LINE__);
}
if ($_SESSION['id'][0] != 'A' && strlen($_SESSION['id']) != 33) {
    sendErrorMessage('could not update agent', __LINE__);
}
if ($_SESSION['id'] != $_POST['id']) {
    sendErrorMessage('could not update agent', __LINE__);
}

if (empty($_POST['key'])) {
    sendErrorMessage('could not update agent', __LINE__);
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


$sAgentId = $_POST['id'];
$sKeyToUpdate = $_POST['key'];
$sNewValue = $_POST['value'];


$sjAgents = file_get_contents(__DIR__ . '/../data/agents.json');
$jAgents = json_decode($sjAgents);

//Update the data
$jAgents->$sAgentId->$sKeyToUpdate = $sNewValue;

$sjAgents = json_encode($jAgents, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . '/../data/agents.json', $sjAgents);


echo '{"status":1, "message": "agent updated"}';

function sendErrorMessage($sErrorMessage, $iLine)
{
    echo '{"status":0, "message":"' . $sErrorMessage . '", "line":' . $iLine . '}';
    exit;
}
