<?php
    require __DIR__ . "/config.php";
    require $_SERVER['DOCUMENT_ROOT'] . '/solyx/vendor/autoload.php';

    

    function guildName()
    {
        $url = 'https://discord.com/api/v9/guilds/'. $GLOBALS["userinfo"]["guild"];

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL            => $url, 
            CURLOPT_HTTPHEADER     => array('Authorization: Bot NDk1OTI4OTE0MDQ1MzA0ODQ3.W7C7yw.j34KiABsl4X-cgDn2LmJL1xvbBU'), 
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_VERBOSE        => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

    function getUserinfo()
    {
        
        $client = new MongoDB\Client('mongodb+srv://max:abc@solyx.7mjw2.mongodb.net/Solyxbot?retryWrites=true&w=majority');
        $db = $client->Solyx;
        $document = $db->Users->find(['_id' => $_SESSION['user_id']])->ToArray();
        foreach($document as $user) {
        }
        return  $user;
    }   

    function updateUserinfo($filter)
    {
        if ($filter == "None"){
            $filter = ['$set' => $GLOBALS["userinfo"]];
        }
        $client = new MongoDB\Client('mongodb+srv://max:abc@solyx.7mjw2.mongodb.net/Solyxbot?retryWrites=true&w=majority');
        $db = $client->Solyx;
        $db->Users->updateOne(['_id' =>$GLOBALS["userinfo"]['_id']], $filter, ['upsert' => true] );
        
    }

    