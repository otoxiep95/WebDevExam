<?php

session_start();
$agentId = $_SESSION['id'];
if (!$_SESSION) {
    sendErrorMessage('Error', __LINE__);
}
if (!$_SESSION['id'][0] == "A" && strlen($_SESSION['id']) == 33) {
    sendErrorMessage('Error', __LINE__);
}

if (empty($_POST['inpPrice'])) {
    sendErrorMessage('Price is missing', __LINE__);
}

if (empty($_POST['inpAddress'])) {
    sendErrorMessage('Address is missing', __LINE__);
}

if (empty($_POST['inpZip'])) {
    sendErrorMessage('Zipcode is missing', __LINE__);
}

if (empty($_FILES['inpImage'])) {
    sendErrorMessage('Property image is missing', __LINE__);
}

if (!ctype_digit($_POST['inpPrice'])) {
    sendErrorMessage('error, price is not a number', __LINE__);
}
if ($_POST['inpPrice'] < 1) {
    sendErrorMessage('inpPrice is not valid. Value must be bigger than 0', __LINE__);
}
if ($_POST['inpPrice'] >= 9999999999999) {
    sendErrorMessage('inpPrice is not valid. Value must be smaller than 9999999999999', __LINE__);
}

if (strlen($_POST['inpAddress']) < 5) {
    sendErrorMessage('inpAddress is not valid', __LINE__);
}
if (strlen($_POST['inpAddress']) > 100) {
    sendErrorMessage('inpAddress is not valid', __LINE__);
}
$pattern = "/^(?:[1-24-9]\d{3}|3[0-8]\d{2})$/";

if (!preg_match($pattern, $_POST['inpZip'])) {
    sendErrorMessage('Zipcode is not valid', __LINE__);
}

$sExtention = pathinfo($_FILES['inpImage']['name'], PATHINFO_EXTENSION);
$sExtention = strtolower($sExtention);
$aAllowedExtentions = ['png', 'jpg', 'jpeg', 'gif'];
if (!in_array($sExtention, $aAllowedExtentions)) {
    sendErrorMessage('The uploaded file is not an image. It must be png, jpg...', __LINE__);
}
//size of image
if ($_FILES['inpImage']['size'] < 20480) { //bytes20480
    sendErrorMessage('The image uploaded is too small. Min size 20Kb ', __LINE__);
}
if ($_FILES['inpImage']['size'] > 5242880) { //5242880
    sendErrorMessage('The image uploaded is too large. Max size 5Mb ', __LINE__);
}

$sjaProperties = file_get_contents(__DIR__ . '/../data/properties.json');
$aProperties = json_decode($sjaProperties);

$sUniqueImageName = uniqid();
//TODO create new property
$jProperty = new stdClass();

$jProperty->id = uniqid();
$jProperty->agentId = $agentId;
$jProperty->price = intVal($_POST['inpPrice']);
$jProperty->address = $_POST['inpAddress'];
$jProperty->zipcode = $_POST['inpZip'];
$jProperty->image = $sUniqueImageName . '.' . $sExtention;
$jProperty->geometry = new stdClass();

$randLon = (float) rand(12322222, 12619999) * 0.000001;
$randLat = (float) rand(55660000, 55729999) * 0.000001;


$jProperty->geometry->coordinates = [$randLon, $randLat];
$jProperty->geometry->type = "Point";



move_uploaded_file($_FILES['inpImage']['tmp_name'], __DIR__ . "/../images/property-img/$sUniqueImageName.$sExtention");
array_push($aProperties, $jProperty);

$sjaProperties = json_encode($aProperties, JSON_PRETTY_PRINT);
//echo $sjaProperties;
file_put_contents(__DIR__ . '/../data/properties.json', $sjaProperties);




echo '{"status":1,"message":"property created","property":' . json_encode($jProperty) . ', "line":"' . __LINE__ . '"}';

function sendErrorMessage($sErrorMessage, $iErrorLineNumber)
{
    echo '{"status":0,"message":"' . $sErrorMessage . '","line":' . $iErrorLineNumber . '}';
    exit;
}
