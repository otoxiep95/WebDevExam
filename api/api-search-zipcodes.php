<?php


if (!isset($_GET['searchZip'])) {
    echo '[]';
    exit;
}
//VALIDATION

$sSearchFor = $_GET['searchZip']; // the users input

$saProperties = file_get_contents(__DIR__ . '/../data/properties.json');
$aProperties = json_decode($saProperties);


$matches = [];

foreach ($aProperties as $jProperty) {
    if (strpos($jProperty->zipcode, $sSearchFor) !== false) {
        if (!in_array($jProperty->zipcode, $matches)) {
            array_push($matches, $jProperty->zipcode);
        }
    }
}
$sMatches = json_encode($matches);

echo '{"status":1, "matches":' . $sMatches . ', "message": "matches found"}';
