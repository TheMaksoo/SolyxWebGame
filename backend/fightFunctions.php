<?php
    require __DIR__ . "/config.php";
    require $_SERVER['DOCUMENT_ROOT'] . '/solyx/vendor/autoload.php';

    function getEnemy()
    {
        $chance = rand(1, 100);
        if ($GLOBALS["userinfo"]["location"] == "Golden Temple"){
            if ($chance >= 90){
                $debi = "Fire Golem";
            }
            elseif  ($chance >= 60){
                $debi = "Wyvern";
            }
            elseif  ($chance >= 40){
                $debi = "Rachi";
            }
            elseif  ($chance >= 20){
                $debi = "debin";
            }
            elseif ($chance >= 0){
                $debi = "Oofer";
            }
        }
 
        if ($GLOBALS["userinfo"]["location"] == "Saker Keep"){
            if ($chance >= 90){
                $debi = "The Corrupted";
            }
            elseif  ($chance  >= 60){
                $debi = "Souleater";
            }
            elseif   ($chance >= 30){
                $debi = "Draugr";
            }
            elseif  ($chance >= 0){
                $debi = "Stalker";
            }
        }

        if ($GLOBALS["userinfo"]["location"] == "The Forest"){
            if ($chance >= 90){
                $debi = "Phantasm";
            }
            elseif  ($chance  >= 60){
                $debi = "Zombie";
            }
            elseif  ($chance >= 30){
                $debi = "Wolf";
            }
            elseif ($chance >= 0){
                $debi = "Goblin";
            }
        }
 
        if ($GLOBALS["userinfo"]["location"] == "Ebony Mountains"){
            if ($chance >= 90){
                $debi = "The Accursed";
            }
            elseif  ($chance  >= 60){
                $debi = "Ebony Guardian";
            }
            elseif  ($chance >= 30){
                $debi = "Elder Dragon";
            }
            elseif ($chance >= 0){
                $debi = "Hades";
            }
        }

        if ($GLOBALS["userinfo"]["location"] == "Township of Arkina"){
            if ($chance >= 90){
                $debi = "The Nameless King";
            }
            elseif  ($chance  >= 60){
                $debi = "Harpy";
            }
            elseif  ($chance >= 30){
                $debi = "Ettin";
            }
            elseif ($chance >= 0){
                $debi = "Dormammu";
            }
        }

        if ($GLOBALS["userinfo"]["location"] == "Zulanthu"){
            if ($chance >= 90){
                $debi = "The Venomous";
            }
            elseif  ($chance  >= 60){
                $debi = "Largos";
            }
            elseif  ($chance >= 30){
                $debi = "Saurian";
            }
            elseif ($chance >= 0){
                $debi = "Deathclaw";
            }
        }

        if ($GLOBALS["userinfo"]["location"] == "Lost City"){
            if ($chance >= 90){
                $debi = "Death Knight";
            }
            elseif  ($chance  >= 60){
                $debi = "Giant";
            }
            elseif  ($chance >= 30){
                $debi = "Skeleton";
            }
            elseif ($chance >= 0){
                $debi = "Lizardmen";
            }
        }

        if ($GLOBALS["userinfo"]["location"] == "Drenheim"){
            if ($chance >= 90){
                $debi = "Frost Dragon";
            }
            elseif  ($chance  >= 60){
                $debi = "Frost Orc";
            }
            elseif  ($chance >= 30){
                $debi = "Ice Wolves";
            }
            elseif ($chance >= 0){
                $debi = "Frost Goblin";
            }
        }

        if ($GLOBALS["userinfo"]["location"] == "Havelow"){
            if ($chance >= 90){
                $debi = "Giant Sand Worm";
            }
            elseif  ($chance  >= 60){
                $debi = "Anakore";
            }
            elseif  ($chance >= 30){
                $debi = "Skorpikis";
            }
            elseif ($chance >= 0){
                $debi = "Sandcrawler";
            }
        }

        if ($debi == "Fire Golem" || $debi == "Phantasm" || $debi == "The Corrupted" || $debi == "The Accursed" || $debi == "The Nameless King" || $debi == "The Venomous" || $debi == "Death Knight" || $debi == "Frost Dragon"){
            $enemyname = "&#128305; " . $debi;
        }
        elseif ($debi == "Wyvern" || $debi == "Souleater" || $debi == "Zombie" || $debi == "Ebony Guardian" || $debi == "Harpy" || $debi == "Largos" || $debi == "Giant" || $debi == "Frost Orc"){
            $enemyname = "&#9884; " . $debi;
            }
        else{
            $enemyname = " " . $debi;
        }
        return $enemyname;
    }

    function getDifficulty()
    {
        $difficulty = rand(1, 100);
		$GLOBALS["userinfo"]["enemydifficulty"] = "Common";
        if ($difficulty >= 99){
            $difficulty = "<:Mythical:573784881386225694> Mythical " ;
            $GLOBALS["userinfo"]["enemydifficulty"] = "Mythical";
        }
        elseif ($difficulty >= 90){
            $difficulty = "<:Legendary:639425368167809065> Legendary " ;
            $GLOBALS["userinfo"]["enemydifficulty"] = "Legendary";
        }
        elseif ($difficulty >= 70){
            $difficulty = "<:Rare:573784880815538186> Rare ";
            $GLOBALS["userinfo"]["enemydifficulty"] = "Rare";
        }
        elseif ($difficulty >= 40){
            $difficulty = "<:Uncommon:641361853817159685> Uncommon ";
            $GLOBALS["userinfo"]["enemydifficulty"] = "Uncommon";
        }
        elseif ($difficulty >= 0){
            $difficulty = "<:Common:573784881012932618> Common "; 
            $GLOBALS["userinfo"]["enemydifficulty"] = "Common";
        }
        return $difficulty;
    }

    function getBossImage($debi)
    {
        if ($debi == "Phantasm"){
            $img = "/img/phantasm.jpg";
        }
        elseif ($debi == "Fire Golem"){
            $img = "/img/fire_golem_by_sourshade.jpg";
        }
        elseif ($debi == "The Corrupted"){
            $img = "/img/corrupted.jpg";
        }
        elseif ($debi == "Death Knight"){
            $img = "/img/deathKnight.jpg";
        }
        elseif ($debi == "Frost Dragon"){
            $img = "/img/frostDragon.jpg";
        }
        return $img;
    }