<?php 
require __DIR__ . "/config.php";
require $_SERVER['DOCUMENT_ROOT'] . '/solyx/vendor/autoload.php';

$imgname = str_replace(' ', '', $_POST['name']);
$name = $_POST['name'];
$attacks1 = $_POST["attacks1"];
$attacks2 = $_POST['attacks2'];
$attacks3 = $_POST['attacks3'];


if(empty($name))
{
    $msg = $msg . "<br>Fill in a skill name.";
}

if(empty($attacks1))
{
    $msg = $msg . "<br>Fill in a low level skill text.";
}

if(empty($attacks2))
{
    $msg = $msg . "<br>Fill in a medium level skill text.";
}

if(empty($attacks3))
{
    $msg = $msg . "<br>Fill in a high level skill text.";
}



if ($msg == ""){
    $attack1 = explode('*', $attacks1);
    $attack2 = explode('*', $attacks2);
    $attack3 = explode('*', $attacks3);
    $client = new MongoDB\Client('mongodb+srv://max:abc@solyx.7mjw2.mongodb.net/Solyxbot?retryWrites=true&w=majority');
    $db = $client->Solyx;
    $insertOneResult = $db->skills->insertOne([
        'name' => $name,
        'attack1' => $attack1,
        'attack2' => $attack2,
        'attack3' => $attack3,
    ]);
    $msg = $msg . "<br>Added the skill text.";
}
header("Location: $base_url/onlineCode.php?msg=$msg");