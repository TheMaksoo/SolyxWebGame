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
        if (!isset($user["name"])){
            newuser();
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

    function updatePartyinfo($filter, $partyinfo)
    {
        if ($filter == "None"){
            $filter = ['$set' => $partyinfo];
        }
        $client = new MongoDB\Client('mongodb+srv://max:abc@solyx.7mjw2.mongodb.net/Solyxbot?retryWrites=true&w=majority');
        $db = $client->Solyx;
        $db->Users->updateOne(['_id' => $partyinfo['_id']], $filter, ['upsert' => true] );
        
    }

    function getLocations(){
        $locations = array();
        $client = new MongoDB\Client('mongodb+srv://max:abc@solyx.7mjw2.mongodb.net/Solyxbot?retryWrites=true&w=majority');
        $db = $client->Solyx;
        $document = $db->locations->find()->ToArray();
        $array = json_decode(json_encode($document), true);
        return  $array;
    }

    function getCurrentLocation(){
        $client = new MongoDB\Client('mongodb+srv://max:abc@solyx.7mjw2.mongodb.net/Solyxbot?retryWrites=true&w=majority');
        $db = $client->Solyx;
        $document = $db->locations->find(['name' =>$GLOBALS["userinfo"]['location']])->ToArray();
        $array = json_decode(json_encode($document), true);
        return  $array;
    }

    function getskillInfo($skill){
        
        $client = new MongoDB\Client('mongodb+srv://max:abc@solyx.7mjw2.mongodb.net/Solyxbot?retryWrites=true&w=majority');
        $db = $client->Solyx;
        $document = $db->skills->find(['name' => $skill])->ToArray();
        $array = json_decode(json_encode($document), true);
        return  $array;
    }

    function newuser(){
        $client = new MongoDB\Client('mongodb+srv://max:abc@solyx.7mjw2.mongodb.net/Solyxbot?retryWrites=true&w=majority');
        $db = $client->Solyx;
        $db->Users->insertOne(getdefaultuser());
    }
    
    function getdefaultuser(){
        return [
            "_id" => $_SESSION['user_id'],
            "name" => $_SESSION['username'],
            "race" => "None",
            "class" => "None",
            "role" => "Player", 
            "health" => 100,
            "enemyhp" => 50,
            "enemylvl" => 0,
            "lvl" => 0,
            "gold" => 10,
            "wood" => 0,
            "metal" => 0,
            "stone" => 0,
            "enemieskilled" => 0,
            "selected_enemy" => "None",
            "deaths" => 0,
            "exp" => 0,
            "lootbag" => 0,
            "wearing" => "None",
            "guild" => "None",
            "skills_learned" => [],
            "inventory" => [],
            "equip" => "None",
            "title" => "None",
            "location" => "Golden Temple",
            "daily_block" => 0,
            "vote_block" => 0,
            "voted" => "False",
            "hp_potions" => 0,
            "keys" => 0,
            "mine_block" => 0,
            "chop_block" => 0,
            "background" => "https://i.imgur.com/L6JFu3m.jpg",
            "online" => 0,
            "blacklisted" => "False",
            "Rachikilled" => 0,
            "Draugrkilled" => 0,
            "Debinkilled" => 0,
            "Stalkerkilled" => 0,
            "FireGolemkilled" => 0,
            "Wyvernkilled" => 0,
            "Ooferkilled" => 0,
            "Souleaterkilled" => 0,
            "Wolfkilled" => 0,
            "Goblinkilled" => 0,
            "Zombiekilled" => 0,
            "Phantasmkilled" => 0,
            "TheCorruptedkilled" => 0,
            "TheAccursedkilled" => 0,
            "ElderDragonkilled" => 0,
            "Hadeskilled" => 0,
            "EbonyGuardiankilled" => 0,
            "Harpykilled" => 0,
            "Dormammukilled" => 0,
            "Ettinkilled" => 0,
            "TheNamelessKingkilled" => 0,
            "Largoskilled" => 0,
            "Deathclawkilled" => 0,
            "Sauriankilled" => 0,
            "TheVenomouskilled" => 0,
            "Skeletonkilled" => 0,
            "Lizardmenkilled" => 0,
            "Giantkilled" => 0,
            "DeathKnightkilled" => 0,
            "IceWolveskilled" => 0,
            "FrostOrckilled" => 0,
            "FrostGoblinkilled" => 0,
            "FrostDragonkilled" => 0,
            "exp_potions" => 0,
            "enemydifficulty" => "None",
            "MaxHealth" => 100,
            "EnemyStun" => 0,
            "SkillCooldown1" => 0,
            "SkillCooldown2" => 0,
            "Buff1" => "None",
            "Buff1Time" => 0,
            "cooldown_infraction" => 0,
            "monthlyrewards" => 0,
            "sawmill" => "False",
            "masonry" => "False",
            "smeltery" => "False",
            "planks" => 0,
            "bricks" => 0,
            "iron_plates" => 0,
            "saw_block" => 0,
            "mason_block" => 0,
            "smelt_block" => 0,
            "camp" => "False",
            "trap" => 0,
            "trap1" => 0,
            "trap2" => 0,
            "trap3" => 0,
            "trap4" => 0,
            "trap5" => 0,
            "trap6" => 0,
            "trap7" => 0,
            "trap8" => 0,
            "trap9" => 0,
            "trap10" => 0,
            "trap11" => 0,
            "trap12" => 0,
            "trap13" => 0,
            "trap_block" => 0,
            "axelvl" => 0,
            "pickaxelvl" => 0,
            "sawlvl" => 0,
            "chisellvl" => 0,
            "hammerlvl" => 0,
            "trader_time" => 0,
            "trader_rarity" => "False",
            "trader_block" => 0,
            "trader_wood" => 0,
            "trader_stone" => 0,
            "trader_metal" => 0,
            "trader_planks" => 0,
            "trader_bricks" => 0,
            "trader_iron_plates" => 0,
            "trader_profit" => 0,
            "Stunned" => 0,
            "Debuff1" => "None",
            "DebuffTime1" => 0,
            "pvpcooldown1" => 0,
            "pvpcooldown2" => 0,
            "TrapKills" => 0,
            "friend_list" => [],
            "friend_amount" => 0,
            "friend_max_amount" => 10,
            "party" => "None",
            "pet_find" => "None",
            "pet_list" => [],
            "equipped_pet" => [],
            "pet_stage" => "Golden Goose",
            "pet_food" => 0,
            "head" => "None",
            "neck" => "None",
            "body" => "None",
            "hand" => "None",
            "legs" => "None",
            "feet" => "None",
            "toggle" => ["loot" => False, "level" => False, "crate" => False, "tools" => False, "history" => False, "basic" => False, "buildings" => False, "items" => False, "traps" => False],
            "quests" => ["ongoing_quests" => [["name" => "Tutorial A","progress" => 0, "part" => "None"]],
            "tutorial_quests" => [],
            "repeated_quests" => [],
            "story_quests" => [],
            "trader" => [["time" => 0,"rarity" => "Common","block" => 0,"wood" => 0,"stone" => 0,"metal" => 0,"planks" => 0,"bricks" => 0,"iron_plates" => 0,"profit" => 0],["bought_recources" => [["wood" => 0,"stone" => 0,"metal" => 0,"planks" => 0,"bricks" => 0,"iron_plates" => 0,"expenses" => 0]]]],
            "statistics" => [["monster_kills" => [], "deaths" => 0, "user_kills" => [], "user_deaths" => [], "recources" => [[ "gathered" => [[ "total" => 0 ]], "sold" => [[ "total" => 0 ]], "sawed" => 0 , "masoned" => 0 , "smelted" => 0 ]], "money_gained" => 0, "damage_done" => 0 ]]
            ]
        ];
    }
