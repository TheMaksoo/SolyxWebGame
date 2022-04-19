<?php
    require __DIR__ . "/config.php";
    
    use MongoDB\Client as Mongo;


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
   
        $mongo = new Mongo("mongodb://localhost:27017/?readPreference=primary&appname=MongoDB%20Compass%20Community&ssl=false");
        $db = $mongo->solyx;
        $db_users = $db->users;
        $document = $db_users->find(['_id' => $_SESSION['user_id']])->toArray();
        foreach ($document as $userinfo) 
        {}
        return  $userinfo;
    }

    function updateUserinfo($userinfo)
    {
        $mongo = new Mongo("mongodb://localhost:27017/?readPreference=primary&appname=MongoDB%20Compass%20Community&ssl=false");
        $db = $mongo->solyx;
        $db->users->updateOne(['_id' => $userinfo['_id']], ['$set' => $userinfo], ['upsert' => true] );
        
    }