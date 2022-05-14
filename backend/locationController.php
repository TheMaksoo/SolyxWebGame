<?php 
require __DIR__ . "/config.php";
require $_SERVER['DOCUMENT_ROOT'] . '/solyx/vendor/autoload.php';

$imgname = str_replace(' ', '', $_POST['name']);
$name = $_POST['name'];
$unlocklevel = $_POST["unlocklevel"];
$backstory = $_POST['backstory'];
$image = $_FILES['image'];
$msg = "";
$imageFileType = substr($image["type"], 6);

if(empty($name))
{
    $msg = $msg . "<br>Fill in a location name.";
}

if(!is_numeric($unlocklevel) && $unlocklevel >= 0)
{
    $msg = $msg . "<br>Fill in a level in (Above 0).";
}

if(empty($backstory))
{
    $msg = $msg . "<br>Fill in a backstory.";
}

if(empty($creator))
{
    $creator = "Generator";
}
if(!isset($image)){
    $msg = $msg . "<br>Upload an image.";
}


if ($msg == ""){
    move_uploaded_file($image['tmp_name'],"../img/locations/" . $imgname . "." . $imageFileType);

    $client = new MongoDB\Client('mongodb+srv://max:abc@solyx.7mjw2.mongodb.net/Solyxbot?retryWrites=true&w=majority');
    $db = $client->Solyx;
    $insertOneResult = $db->locations->insertOne([
        'name' => $name,
        'unlocklevel' => $unlocklevel,
        'backstory' => $backstory,
        'creator' => $creator,
    ]);
    $msg = $msg . "<br>Added the location.";
    $msg = $msg . "../img/locations/" . $name . "." . $imageFileType;
}
header("Location: $base_url/onlineCode.php?msg=$msg");