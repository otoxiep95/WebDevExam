<?php

session_start();

if (!$_SESSION) {
    sendBackToMainPage();
}

if ($_SESSION['id'][0] != 'U' && strlen($_SESSION['id']) != 33) {
    sendBackToMainPage();
}

$userId = $_SESSION['id'];

$sjUsers = file_get_contents(__DIR__ . '/data/users.json');
$jUsers = json_decode($sjUsers);

unset($jUsers->$userId);

$sjUsers = json_encode($jUsers, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . '/data/users.json', $sjUsers);
session_destroy();

sendBackToMainPage();



function sendBackToMainPage()
{
    header('Location:index.php');
}
