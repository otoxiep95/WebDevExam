<?php

session_start();

if (!$_SESSION) {
    sendBackToMainPage();
}

if ($_SESSION['id'][0] != 'A' && strlen($_SESSION['id']) != 33) {
    sendBackToMainPage();
}

$agentId = $_SESSION['id'];

$sjAgents = file_get_contents(__DIR__ . '/data/users.json');
$saProperties = file_get_contents(__DIR__ . '/data/properties.json');
$jAgents = json_decode($sjAgents);
$aProperties = json_decode($saProperties);

unset($jAgents->$agentId);
$i = 0;
foreach ($aProperties as $jProperty) {
    if ($jProperty->agentId == $agentId) {
        unlink(__DIR__ . '/images/property-img/' . $jProperty->image . '');
        array_splice($aProperties, $i, 1);
    }
    $i++;
}
$saProperties = json_encode($aProperties, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . '/data/properties.json', $saProperties);

$sjAgents = json_encode($jAgents, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . '/data/users.json', $sjAgents);
session_destroy();

sendBackToMainPage();



function sendBackToMainPage()
{
    header('Location:index.php');
}
