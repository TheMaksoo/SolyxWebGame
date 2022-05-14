<?php 
require __DIR__ . "/config.php";
require $_SERVER['DOCUMENT_ROOT'] . '/solyx/vendor/autoload.php';

$imgname = str_replace(' ', '', $_POST['name']);
$name = $_POST['name'];
$type = $_POST["type"];
$location = $_POST["location"];
$healthMin = $_POST['healthMin'];
$healthMax = $_POST['healthMax'];
$damageMin = $_POST['damageMin'];
$damageMax = $_POST['damageMax'];
$goldMin = $_POST['goldMin'];
$goldMax = $_POST['goldMax'];
$experienceMin = $_POST['experienceMin'];
$experienceMax = $_POST['experienceMax'];
$attack = $_POST['attacks'];
$backstory = $_POST['backstory'];
$creator = $_POST['creator'];

$image = $_FILES['image'];
$imageFileType = substr($image["type"], 6);

$msg = "";


if(empty($name))
{
    $msg = $msg . "<br>Fill in a monster name.";
}

if(empty($type))
{
    $msg = $msg . "<br>Fill in a monster type.";
}

if(empty($location))
{
    $msg = $msg . "<br>Fill in a monster location.";
}

if($healthMin <= 0 || $damageMin <= 0 || $goldMin <= 0 || $experienceMin <= 0)
{
    $msg = $msg . "<br>Only fill in numbers above 0.";
}

if(empty($attack))
{
    $msg = $msg . "<br>Fill in 2 / 3 attacks please.";
}

if(empty($backstory))
{
    $backstory = "Contact us to add your own backstory!";
}

if(empty($creator))
{
    $creator = "~ Create your own ~";
}

if ($msg == ""){
    move_uploaded_file($image['tmp_name'],"../img/monsters/" . $imgname . "." . $imageFileType);

    $attacks = explode('*', $attack);

    $client = new MongoDB\Client('mongodb+srv://max:abc@solyx.7mjw2.mongodb.net/Solyxbot?retryWrites=true&w=majority');
    $db = $client->Solyx;
    $updateResult  = $db->locations->updateOne(
        ['name' => $location], 
        [ '$push' => [
            'monsters' => [ 
                'name' => $name, 
                'type' => $type, 
                'healthMin' => $healthMin, 
                'healthMax' => $healthMax, 
                'damageMin' => $damageMin, 
                'damageMax' => $damageMax, 
                'goldMin' => $goldMin, 
                'goldMax' => $goldMax, 
                'experienceMin' => $experienceMin, 
                'experienceMax' => $experienceMax, 
                'attacks' => $attacks,
                'backstory' => $backstory, 
                'creator' => $creator,
                ]
            ]
        ]
        );

    $msg = $msg . "<br>Added the Monster.<br>" . $name;
    $msg = $msg . "<br>../img/monsters/" . $name . "." . $imageFileType;
}
header("Location: $base_url/onlineCode.php?msg=$msg");