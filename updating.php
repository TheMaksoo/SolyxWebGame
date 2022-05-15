<?php
    require $_SERVER['DOCUMENT_ROOT'] .'/solyx/backend/fightFunctions.php';
    $locations = getLocations();

    foreach ($locations as $location){
        foreach ($location["monsters"] as $monster){
            $client = new MongoDB\Client('mongodb+srv://max:abc@solyx.7mjw2.mongodb.net/Solyxbot?retryWrites=true&w=majority');
            $db = $client->Solyx;
            $updateResult  = $db->locations->updateOne(
                ['name' => $location], 
                [ '$push' => [
                    'monsters' => $m[
                        'img' => false
                        ]
                    ]
                ]
            ); 
        }
    }
?>  

<!DOCTYPE html>
<html>  
    <body>

    </body>
</html>    