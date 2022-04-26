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

        return $debi;
    }
    function getDebiName($debi)
    {
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

    function addEnemyToUser(){
        $GLOBALS["userinfo"]["selected_enemy"] = $_SESSION['debi'];

        if ($GLOBALS["userinfo"]["selected_enemy"] == "Rachi" || $GLOBALS["userinfo"]["selected_enemy"] == "Debin" || $GLOBALS["userinfo"]["selected_enemy"] == "Oofer"){ 
                $GLOBALS["userinfo"]["enemyhp"] = rand(10, 30);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Wyvern"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(30, 50);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Fire Golem"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(40, 60);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Draugr" || $GLOBALS["userinfo"]["selected_enemy"] == "Stalker"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(20, 40);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Souleater"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(40, 60);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Corrupted"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(40, 60);
        }  
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Wolf" || $GLOBALS["userinfo"]["selected_enemy"] == "Goblin"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(50, 70);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Zombie"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(60, 80);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Phantasm"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(70, 90);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Elder Dragon" || $GLOBALS["userinfo"]["selected_enemy"] == "Hades"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(70, 90);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ebony Guardian"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(80, 100);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Accursed"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(90, 110);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ettin" || $GLOBALS["userinfo"]["selected_enemy"] == "Dormammu"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(90, 110);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Harpy"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(100, 120);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Nameless King"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(110, 130);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Saurian" || $GLOBALS["userinfo"]["selected_enemy"] == "Deathclaw"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(90, 110);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Largos"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(100, 120);
        }  
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Venomous"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(110, 130);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Skeleton" || $GLOBALS["userinfo"]["selected_enemy"] == "Lizardmen"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(120, 140);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Giant"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(130, 150);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Death Knight"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(140, 160);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ice Wolves" || $GLOBALS["userinfo"]["selected_enemy"] == "Frost Goblin"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(150, 170);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Orc"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(160, 180);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Dragon"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(170, 190);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Skorpikis" || $GLOBALS["userinfo"]["selected_enemy"] == "Sandcrawler"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(180, 200);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Anakore"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(190, 210);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Giant Sand Worm"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(200, 220);
        }
        
        $uncommon = (($GLOBALS["userinfo"]["enemyhp"] / 100) * 20);
        $rare = (($GLOBALS["userinfo"]["enemyhp"] / 100) * 30);
        $legendary = (($GLOBALS["userinfo"]["enemyhp"] / 100) * 40);
        $mythical = (($GLOBALS["userinfo"]["enemyhp"] / 100) * 50);
        
        if ($GLOBALS["userinfo"]["enemydifficulty"] == "Uncommon"){
            $GLOBALS["userinfo"]["enemyhp"] += $uncommon;
        }
        elseif  ($GLOBALS["userinfo"]["enemydifficulty"] == "Rare"){
            $GLOBALS["userinfo"]["enemyhp"] += $rare;
        }
        elseif  ($GLOBALS["userinfo"]["enemydifficulty"] == "Legendary"){
            $GLOBALS["userinfo"]["enemyhp"] += $legendary;
        }
        elseif  ($GLOBALS["userinfo"]["enemydifficulty"] == "Mythical"){
            $GLOBALS["userinfo"]["enemyhp"] += $mythical;
        }
    }

    function getEnemyinfo(){
        if ($GLOBALS["userinfo"]["selected_enemy"] == "Rachi" || $GLOBALS["userinfo"]["selected_enemy"] == "Debin" || $GLOBALS["userinfo"]["selected_enemy"] == "Oofer"){
			$attack = ["chomp and", "dash and", "bite and"];
			$enemydmg = rand(5, 10);
			$enemygold = rand(10, 30);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(5, 25);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Wyvern"){
			$attack = ["slash and", "scratch and", "bite and"];
			$enemydmg = rand(10, 15);
			$enemygold = rand(15, 35);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(10, 30);
        }
	
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Fire Golem"){
			$attack = ["smash and", "throw and throw's a rock.<br>Fire Golem", "hot head and spews lava.<br>Fire Golem"];
			$enemydmg = rand(20, 30);
			$enemygold = rand(25, 50);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(20, 40);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Draugr" || $GLOBALS["userinfo"]["selected_enemy"] == "Stalker"){
			$attack = ["swing and", "chase and", "stab and"];
			$enemydmg = rand(15, 20);
			$enemygold = rand(20, 40);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(15, 35);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Souleater"){
			$attack = ["devour and", "shatter and", "rip and"];
			$enemydmg = rand(20, 25);
			$enemygold = rand(25, 45);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(20, 40);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Corrupted"){
			$attack = ["toxicity and breathes toxic flames<br>The Corrupted", "sense and hits a weak spot<br>The Corrupted", "flash appreaing right infront of you.<br>The Corrupted"];
			$enemydmg = rand(30, 40);
			$enemygold = rand(35, 55);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(30, 50);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Wolf" || $GLOBALS["userinfo"]["selected_enemy"] == "Goblin"){
			$attack = ["chase and", "impact and", "gauge and"];
			$enemydmg = rand(25, 30);
			$enemygold = rand(30, 50);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(25, 45);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Zombie"){
			$attack = ["devour and", "bite and", "sratch and"];
			$enemydmg = rand(30, 35);
			$enemygold = rand(35, 55);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(30, 50);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Phantasm"){
			$attack = ["lighting and striking you<br>Phantasm", "storm cloud and hides in the storm to attack you.<br>Phantasm", "lightning guide and charges up and guides the energy towards you.<br>Phantasm"];
			$enemydmg = rand(40, 50);
			$enemygold = rand(45, 65);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(40, 60);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Elder Dragon" || $GLOBALS["userinfo"]["selected_enemy"] == "Hades"){
			$attack = ["decay and", "rage and", "mutilate and"];
			$enemydmg = rand(35, 40);
			$enemygold = rand(40, 60);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(35, 55);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ebony Guardian"){
			$attack = ["oblitirate and", "pounce and", "impair and"];
			$enemydmg = rand(40, 45);
			$enemygold = rand(45, 65);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(40, 60);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Accursed"){
			$attack = ["soul burn and making u feel pain withing.<br>The Accursed", "Agony making your mind flooded with Agony.<br>The Accursed", "chain and furiously attacks you with its chains.<br>The Accursed"];
			$enemydmg = rand(50, 60);
			$enemygold = rand(55, 75);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(50, 70);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ettin" || $GLOBALS["userinfo"]["selected_enemy"] == "Dormammu"){
			$attack = ["charge and", "whack and", "revenge and"];
			$enemydmg = rand(45, 50);
			$enemygold = rand(50, 70);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(45, 65);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Harpy"){
			$attack = ["backstab and", "rage and", "grasp and"];
			$enemydmg = rand(50, 55);
			$enemygold = rand(55, 75);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(50, 70);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Nameless King"){
			$attack = ["DOOM and deals a deadly critical strike.<br>The Nameless king", "Nightmare vanishing from view and attacking you from behind scaring you.<br>The Nameless king", "Overpower making you see why they call him a king...<br>The Namelss King"];
			$enemydmg = rand(60, 70);
			$enemygold = rand(65, 85);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(60, 80);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Deathclaw" || $GLOBALS["userinfo"]["selected_enemy"] == "Saurian"){
			$attack = ["lacerate and", "cauterize and", "torment and"];
			$enemydmg = rand(55, 65);
			$enemygold = rand(60, 80);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(55, 75);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Largos"){
			$attack = ["curse and", "reckoning and", "exterminate and"];
			$enemydmg = rand(60, 70);
			$enemygold = rand(65, 85);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(60, 80);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Venomous"){
			$attack = ["poise  biting you and temporarily poisoning you for 1 turn<br> The Venomous", "spoil creates this spoiled food smell in the air making you feel unwell.<br> The Venomous", "Headbutt simple but harmfull attack.<br> The Venomous"];
			$enemydmg = rand(70, 80);
			$enemygold = rand(75, 95);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(70, 90);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Skeleton" || $GLOBALS["userinfo"]["selected_enemy"] == "Lizardmen"){
			$attack = ["dread and", "pierce and", "whip and"];
			$enemydmg = rand(65, 75);
			$enemygold = rand(70, 90);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(65, 85);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Giant"){
			$attack = ["fracture and", "embrace and", "avalanche and"];
			$enemydmg = rand(70, 80);
			$enemygold = rand(75, 95);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(70, 90);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Death Knight"){
			$attack = ["swift strike and strikes you with out noticing. <br>Death Knight", "sidestep and hits yu in the side by surprise.<br>Death Knight", "devastate swings his massive sword down on top of you devestating your armor.<br>Death Knight"];
			$enemydmg = rand(80, 90);
			$enemygold = rand(85, 105);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(80, 100);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ice Wolves" || $GLOBALS["userinfo"]["selected_enemy"] == "Frost Goblin"){
			$attack = ["freeze and", "fake hibernate and", "bolt and"];
			$enemydmg = rand(75, 85);
			$enemygold = rand(80, 100);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(75, 95);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Orc"){
			$attack = ["terror and", "maul and", "smite and"];
			$enemydmg = rand(80, 90);
			$enemygold = rand(85, 105);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(80, 100);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Dragon"){
			$attack = ["snow storm hiding its appearance while attacking you from all sides. <br>Frost dragon.", "Icy breath slowing you down and giving you slight frostbite.<br>Frost Dragon", "Cold Fire breathe icy cold fire at you instead of burning you freezing you.<br>Frost dragon"];
			$enemydmg = rand(90, 100);
			$enemygold = rand(95, 115);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(90, 110);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Skorpikis"){
			$attack = ["sting and", "slash and", "claw and"];
			$enemydmg = rand(85, 95);
			$enemygold = rand(85, 110);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(85, 105);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Sandcrawler"){
			$attack = ["bite and", "slam and", "throw sand and"];
			$enemydmg = rand(85, 95);
			$enemygold = rand(85, 110);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(85, 105);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Anakore"){
			$attack = ["multiattack and", "smite and", " pounce and"];
			$enemydmg = rand(90, 100);
			$enemygold = rand(90, 115);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(95, 110);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Giant Sand Worm"){
			$attack = ["sand Shifter and shakes the whole ground catching you off balance. <br>Giant Sand Worm.", "tunneler hiding its position and attack from where you least exspect it.<br>Giant Sand Worm", "devour and consumes everything in its way.<br>Giant Sand Worm"];
			$enemydmg = rand(100, 120);
			$enemygold = rand(95, 115);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(105, 120);
        }


		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Gortac the Indestructible"){
			$mindmg =  $GLOBALS["userinfo"]["equip"]["stats_min"];
			$maxdmg =  $GLOBALS["userinfo"]["equip"]["stats_max"];
			$bossdmg = rand($mindmg, $maxdmg);
			$enemydmg = (($bossdmg / 100) * 140);
			$minreward = ( $GLOBALS["userinfo"]["MaxHealth"] * 4);
			$maxreward = ( $GLOBALS["userinfo"]["MaxHealth"] * 4) +  $GLOBALS["userinfo"]["MaxHealth"];
			$enemygold = rand($minreward, $maxreward);
			$xpgain = rand($minreward, $maxreward);
			$goldlost =  rand($minreward, $maxreward) * 1.5;
        }


		if ($GLOBALS["userinfo"]["enemydifficulty"] == "Uncommon"){
			$enemydmg = (($enemydmg / 100) * 120);
			$enemygold = (($enemygold / 100) * 120);
			$goldlost = (($goldlost / 100) * 120);
			$xpgain = (($xpgain / 100) * 120);
        }

		elseif ($GLOBALS["userinfo"]["enemydifficulty"] == "Rare"){
			$enemydmg = (($enemydmg / 100) * 130);
			$enemygold = (($enemygold / 100) * 130);
			$goldlost = (($goldlost / 100) * 130);
			$xpgain = (($xpgain / 100) * 130);
        }

		elseif ($GLOBALS["userinfo"]["enemydifficulty"] == "Legendary"){
			$enemydmg = (($enemydmg / 100) * 140);
			$enemygold = (($enemygold / 100) * 140);
			$goldlost = (($goldlost / 100) * 140);
			$xpgain = (($xpgain / 100) * 140);
        }

		elseif ($GLOBALS["userinfo"]["enemydifficulty"] == "Mythical"){
			$enemydmg = (($enemydmg / 100) * 150);
			$enemygold = (($enemygold / 100) * 150);
			$goldlost = (($goldlost / 100) * 150);
			$xpgain = (($xpgain / 100) * 150);
        }

        if ($GLOBALS["userinfo"]["selected_enemy"] == "Phantasm"){
            $img = "/img/phantasm.jpg";}
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Fire Golem"){
            $img = "/img/fire_golem_by_sourshade.jpg";}
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Corrupted"){
            $img = "/img/corrupted.jpg";}
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Death Knight"){
            $img = "/img/deathKnight.jpg";}
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Dragon"){
            $img = "/img/frostDragon.jpg";}

        $num = array_rand($attack); 
        return array($attack[$num], $enemydmg, $enemygold, $goldlost, $xpgain, $img);
    }

    function getmove($skill){

        if ($skill == 'Swing'){
            $move = ["You swing your weapon and hit a light blow", "You strike a light blow"];
            if ($GLOBALS["userinfo"]["lvl"] >= 30){
                $move = ["You swing your weapon and hit a strong blow", "You strike a strong blow"];
            }
            if ($GLOBALS["userinfo"]["lvl"] >= 90){
                $move = ["You swing your weapon and hit a heavy blow", "You strike a heavy blow"];
            }
        }

        $num = array_rand($move);
        return $move[$num];
    }

    function getYouDmg(){
        $mindmg = $GLOBALS["userinfo"]["equip"]["stats_min"];
		$maxdmg = $GLOBALS["userinfo"]["equip"]["stats_max"];
		$youdmg = rand($mindmg, $maxdmg);
        return $youdmg;
    }

    function getYouDef(){
        $youdef = 0;
		if ($GLOBALS["userinfo"]["class"] == "Knight"){
			$youdef += rand(5, 10);
        }
		elseif ($GLOBALS["userinfo"]["class"] == "Paladin"){
			$youdef += rand(8, 15);
        }
		elseif ($GLOBALS["userinfo"]["class"] == "Grand Paladin"){
			$youdef += rand(11, 20);
        }

        $mindef = $GLOBALS["userinfo"]["wearing"]["stats_min"];
        $maxdef = $GLOBALS["userinfo"]["wearing"]["stats_max"];
        $youdef = rand($mindef, $maxdef);

        return $youdef;

    }

    function everyTurn(){
        if ($GLOBALS["userinfo"]["EnemyStun"] <= 0){
            $GLOBALS["userinfo"]["EnemyStun"] = 0;
            $GLOBALS["userinfo"]["SkillCooldown1"] -= 1;
        }
        if ($GLOBALS["userinfo"]["SkillCooldown1"] <= 0){
            $GLOBALS["userinfo"]["SkillCooldown1"] = 0;
            $GLOBALS["userinfo"]["SkillCooldown2"] -= 1;
        }
        if ($GLOBALS["userinfo"]["SkillCooldown2"] <= 0){
            $GLOBALS["userinfo"]["SkillCooldown2"] = 0;
        }
        if ($GLOBALS["userinfo"]["Buff1"] != "None"){
            $GLOBALS["userinfo"]["Buff1Time"] -= 1;
        }
        if ($GLOBALS["userinfo"]["Buff1Time"] <= 0){
            $GLOBALS["userinfo"]["Buff1"] = "None";
            $GLOBALS["userinfo"]["Buff1Time"] = 0;
        }
    }

    function deadCheck($enemyhp, $enemygold, $userhealth, $goldlost, $xpgain){
        $msg = "";
        if ($enemyhp <= 0 && $userhealth <= 0){
			$msg = ":skull: You both died!\n<:Gold:639484869809930251> " . $GLOBALS["userinfo"]["name"] . " lost " . $goldlost . " gold.";
            $GLOBALS["userinfo"]["gold"] -= $goldlost;
			if ( $GLOBALS["userinfo"]["gold"] < 0){
                $GLOBALS["userinfo"]["gold"] = 0;
            }
			if ( $GLOBALS["userinfo"]["health"] < 0){
                $GLOBALS["userinfo"]["health"] = 0;
            }
			if ( $GLOBALS["userinfo"]["Buff1"] == "Corrupt"){
                $GLOBALS["userinfo"]["Buff1"] = "None";
                $GLOBALS["userinfo"]["Buff1Time"] = 0;
            }
            $GLOBALS["userinfo"]["health"] = 0;
            $GLOBALS["userinfo"]["selected_enemy"] = "None";
            $GLOBALS["userinfo"]["enemydifficulty"] = "None";
            $GLOBALS["userinfo"]["enemieskilled"] += 1;
            $GLOBALS["userinfo"]["deaths"] += 1;
            
        }

        elseif ($userhealth <= 0){
            $msg = ":skull: " . $GLOBALS["userinfo"]["selected_enemy"] . " killed  " . $GLOBALS["userinfo"]["name"] . "<br><:Gold:639484869809930251> " . $GLOBALS["userinfo"]["name"] . " lost " . $goldlost . " gold";
			$GLOBALS["userinfo"]["gold"] -= $goldlost;
			if ($GLOBALS["userinfo"]["gold"] < 0){
				$GLOBALS["userinfo"]["gold"] = 0;
            }
			if ($GLOBALS["userinfo"]["health"] < 0){
				$GLOBALS["userinfo"]["health"] = 0;
            }
			if ($GLOBALS["userinfo"]["Buff1"] == "Corrupt"){
				$GLOBALS["userinfo"]["Buff1"] = "None";
				$GLOBALS["userinfo"]["Buff1Time"] = 0;
            }
            $GLOBALS["userinfo"]["selected_enemy"] = "None";
            $GLOBALS["userinfo"]["enemydifficulty"] = "None";
            $GLOBALS["userinfo"]["deaths"] += 1;
        }

        elseif ($enemyhp <= 0)
			$lootbag_chance = 3;
			try{
				$pterodactyl_bonus = 0;
				$pterodactyl_bonus_text = "";
				$fox_bonus_text = "";
				$goose_bonus_text = "";
				$goose_bonus = 0;
				foreach ($GLOBALS["userinfo"]["pet_list"] as $i){
					$petinfo = $i;
					$pet_level = $petinfo["level"];
					$pet_type = $petinfo["type"];
					if ($pet_type == "Goose"){
						if ($pet_level <= 10){
							$goose_bonus = (($enemygold / 100) * 5);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 20){
							$goose_bonus = (($enemygold / 100) * 10);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 30){
							$goose_bonus = (($enemygold / 100) * 15);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 40){
							$goose_bonus = (($enemygold / 100) * 20);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 50){
							$goose_bonus = (($enemygold / 100) * 25);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
						elseif ($pet_level >= 51){
							$goose_bonus = (($enemygold / 100) * 30);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
                    }
					if ($pet_type == "Pterodactyl"){
						if ($pet_level <= 10){
							$pterodactyl_bonus = (($xpgain / 100) * 2.5);
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 20){
							$pterodactyl_bonus = (($xpgain / 100) * 5);					
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 30){
							$pterodactyl_bonus = (($xpgain / 100) * 7.5);							
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 40){
							$pterodactyl_bonus = (($xpgain / 100) * 10);						
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 50){
							$pterodactyl_bonus = (($xpgain / 100) * 12.5);
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
						elseif ($pet_level >= 51){
							$pterodactyl_bonus = (($xpgain / 100) * 15);
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
                    }
					if ($pet_type == "Fox"){
						if ($pet_level <= 10){
							$lootbag_chance = 8;
							$fox_bonus_text = "\n:sparkles: +5% pet bonus chance.";
                        }
						elseif ($pet_level <= 20){
							$lootbag_chance = 13;
							$fox_bonus_text = "\n:sparkles: +10% pet bonus chance.";
                        }
						elseif ($pet_level <= 30){
							$lootbag_chance = 18;
							$fox_bonus_text = "\n:sparkles: +15% pet bonus chance.";
                        }
						elseif ($pet_level <= 40){	
							$lootbag_chance = 23;
							$fox_bonus_text = "\n:sparkles: +20% pet bonus chance.";
                        }
						elseif ($pet_level <= 50){
							$lootbag_chance = 28;
							$fox_bonus_text = "\n:sparkles: +25% pet bonus chance.";
                        }
						elseif ($pet_level >= 51){
							$lootbag_chance = 33;
							$fox_bonus_text = "\n:sparkles: +30% pet bonus chance.";
                        }
                    }
                }
            }
            catch(Exception $e){
            }

            if ($GLOBALS["userinfo"]["party"] != "None"){
				// $partyinfo = db.party.find_one({"_id": $GLOBALS["userinfo"]["party"]})
				$party_reward_list = " ";
                $lvl_up_text = " ";
                for($i = 0; $i < count($partyinfo["amount"]); ++$i) 

					$shared_gold = 0;
					$shared_xpgain = 0;
					$friend_id = $partyinfo["members"][$i];
					//$friend_info = db.users.find_one({"_id": $friend_id})
		
					if ($friend_info["role"] == "Player"){
						$shared_gold = ($enemygold / 100) * 10;
						$shared_xpgain = ($xpgain / 100) * 10;
                    }
					if ($friend_info["role"] == "Developer"){
						$shared_gold = ($enemygold / 100) * 10;
						$shared_xpgain = ($xpgain / 100) * 10;
                    }
					if ($friend_info["role"] == "patreon1"){
						$shared_gold = ($enemygold / 100) * 15;
						$shared_xpgain = ($xpgain / 100) * 15;
                    }
					if ($friend_info["role"] == "patreon2"){
						$shared_gold = ($enemygold / 100) * 20;
						$shared_xpgain = ($xpgain / 100) * 20;
                    }
					if ($friend_info["role"] == "patreon3"){
						$shared_gold = ($enemygold / 100) * 25;
						$shared_xpgain = ($xpgain / 100) * 25;
                    }
					if ($friend_info["role"] == "patreon4"){
						$shared_gold = ($enemygold / 100) * 30;
						$shared_xpgain = ($xpgain / 100) * 30;
                    }

					$friend_info["gold"] += $shared_gold;
					$friend_info["exp"] += $shared_xpgain;
				
					$flist = ($friend_info["name"] . ": <:Gold:639484869809930251>" . $shared_gold . "  Shared gold, :sparkles: " . $shared_xpgain . " Shared Exp<br>";
					$party_reward_list = $party_reward_list . $flist;
					
					if ($friend_info["exp"] >= 100 + (($friend_info["lvl"] + 1) * 3.5)){
						$friend_info["exp"] = $friend_info["exp"] - (100 + (($friend_info["lvl"] + 1) * 3.5));
						$friend_info["lvl"] = $friend_info["lvl"] + 1;
						$friend_info["health"] = $friend_info["MaxHealth"];
                        $lvl_up_text = ":tada: **" . <?php
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

        return $debi;
    }
    function getDebiName($debi)
    {
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

    function addEnemyToUser(){
        $GLOBALS["userinfo"]["selected_enemy"] = $_SESSION['debi'];

        if ($GLOBALS["userinfo"]["selected_enemy"] == "Rachi" || $GLOBALS["userinfo"]["selected_enemy"] == "Debin" || $GLOBALS["userinfo"]["selected_enemy"] == "Oofer"){ 
                $GLOBALS["userinfo"]["enemyhp"] = rand(10, 30);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Wyvern"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(30, 50);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Fire Golem"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(40, 60);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Draugr" || $GLOBALS["userinfo"]["selected_enemy"] == "Stalker"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(20, 40);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Souleater"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(40, 60);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Corrupted"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(40, 60);
        }  
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Wolf" || $GLOBALS["userinfo"]["selected_enemy"] == "Goblin"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(50, 70);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Zombie"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(60, 80);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Phantasm"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(70, 90);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Elder Dragon" || $GLOBALS["userinfo"]["selected_enemy"] == "Hades"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(70, 90);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ebony Guardian"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(80, 100);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Accursed"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(90, 110);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ettin" || $GLOBALS["userinfo"]["selected_enemy"] == "Dormammu"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(90, 110);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Harpy"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(100, 120);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Nameless King"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(110, 130);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Saurian" || $GLOBALS["userinfo"]["selected_enemy"] == "Deathclaw"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(90, 110);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Largos"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(100, 120);
        }  
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Venomous"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(110, 130);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Skeleton" || $GLOBALS["userinfo"]["selected_enemy"] == "Lizardmen"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(120, 140);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Giant"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(130, 150);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Death Knight"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(140, 160);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ice Wolves" || $GLOBALS["userinfo"]["selected_enemy"] == "Frost Goblin"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(150, 170);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Orc"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(160, 180);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Dragon"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(170, 190);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Skorpikis" || $GLOBALS["userinfo"]["selected_enemy"] == "Sandcrawler"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(180, 200);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Anakore"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(190, 210);
        }
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Giant Sand Worm"){
                $GLOBALS["userinfo"]["enemyhp"] = rand(200, 220);
        }
        
        $uncommon = (($GLOBALS["userinfo"]["enemyhp"] / 100) * 20);
        $rare = (($GLOBALS["userinfo"]["enemyhp"] / 100) * 30);
        $legendary = (($GLOBALS["userinfo"]["enemyhp"] / 100) * 40);
        $mythical = (($GLOBALS["userinfo"]["enemyhp"] / 100) * 50);
        
        if ($GLOBALS["userinfo"]["enemydifficulty"] == "Uncommon"){
            $GLOBALS["userinfo"]["enemyhp"] += $uncommon;
        }
        elseif  ($GLOBALS["userinfo"]["enemydifficulty"] == "Rare"){
            $GLOBALS["userinfo"]["enemyhp"] += $rare;
        }
        elseif  ($GLOBALS["userinfo"]["enemydifficulty"] == "Legendary"){
            $GLOBALS["userinfo"]["enemyhp"] += $legendary;
        }
        elseif  ($GLOBALS["userinfo"]["enemydifficulty"] == "Mythical"){
            $GLOBALS["userinfo"]["enemyhp"] += $mythical;
        }
    }

    function getEnemyinfo(){
        if ($GLOBALS["userinfo"]["selected_enemy"] == "Rachi" || $GLOBALS["userinfo"]["selected_enemy"] == "Debin" || $GLOBALS["userinfo"]["selected_enemy"] == "Oofer"){
			$attack = ["chomp and", "dash and", "bite and"];
			$enemydmg = rand(5, 10);
			$enemygold = rand(10, 30);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(5, 25);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Wyvern"){
			$attack = ["slash and", "scratch and", "bite and"];
			$enemydmg = rand(10, 15);
			$enemygold = rand(15, 35);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(10, 30);
        }
	
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Fire Golem"){
			$attack = ["smash and", "throw and throw's a rock.<br>Fire Golem", "hot head and spews lava.<br>Fire Golem"];
			$enemydmg = rand(20, 30);
			$enemygold = rand(25, 50);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(20, 40);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Draugr" || $GLOBALS["userinfo"]["selected_enemy"] == "Stalker"){
			$attack = ["swing and", "chase and", "stab and"];
			$enemydmg = rand(15, 20);
			$enemygold = rand(20, 40);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(15, 35);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Souleater"){
			$attack = ["devour and", "shatter and", "rip and"];
			$enemydmg = rand(20, 25);
			$enemygold = rand(25, 45);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(20, 40);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Corrupted"){
			$attack = ["toxicity and breathes toxic flames<br>The Corrupted", "sense and hits a weak spot<br>The Corrupted", "flash appreaing right infront of you.<br>The Corrupted"];
			$enemydmg = rand(30, 40);
			$enemygold = rand(35, 55);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(30, 50);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Wolf" || $GLOBALS["userinfo"]["selected_enemy"] == "Goblin"){
			$attack = ["chase and", "impact and", "gauge and"];
			$enemydmg = rand(25, 30);
			$enemygold = rand(30, 50);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(25, 45);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Zombie"){
			$attack = ["devour and", "bite and", "sratch and"];
			$enemydmg = rand(30, 35);
			$enemygold = rand(35, 55);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(30, 50);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Phantasm"){
			$attack = ["lighting and striking you<br>Phantasm", "storm cloud and hides in the storm to attack you.<br>Phantasm", "lightning guide and charges up and guides the energy towards you.<br>Phantasm"];
			$enemydmg = rand(40, 50);
			$enemygold = rand(45, 65);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(40, 60);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Elder Dragon" || $GLOBALS["userinfo"]["selected_enemy"] == "Hades"){
			$attack = ["decay and", "rage and", "mutilate and"];
			$enemydmg = rand(35, 40);
			$enemygold = rand(40, 60);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(35, 55);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ebony Guardian"){
			$attack = ["oblitirate and", "pounce and", "impair and"];
			$enemydmg = rand(40, 45);
			$enemygold = rand(45, 65);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(40, 60);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Accursed"){
			$attack = ["soul burn and making u feel pain withing.<br>The Accursed", "Agony making your mind flooded with Agony.<br>The Accursed", "chain and furiously attacks you with its chains.<br>The Accursed"];
			$enemydmg = rand(50, 60);
			$enemygold = rand(55, 75);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(50, 70);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ettin" || $GLOBALS["userinfo"]["selected_enemy"] == "Dormammu"){
			$attack = ["charge and", "whack and", "revenge and"];
			$enemydmg = rand(45, 50);
			$enemygold = rand(50, 70);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(45, 65);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Harpy"){
			$attack = ["backstab and", "rage and", "grasp and"];
			$enemydmg = rand(50, 55);
			$enemygold = rand(55, 75);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(50, 70);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Nameless King"){
			$attack = ["DOOM and deals a deadly critical strike.<br>The Nameless king", "Nightmare vanishing from view and attacking you from behind scaring you.<br>The Nameless king", "Overpower making you see why they call him a king...<br>The Namelss King"];
			$enemydmg = rand(60, 70);
			$enemygold = rand(65, 85);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(60, 80);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Deathclaw" || $GLOBALS["userinfo"]["selected_enemy"] == "Saurian"){
			$attack = ["lacerate and", "cauterize and", "torment and"];
			$enemydmg = rand(55, 65);
			$enemygold = rand(60, 80);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(55, 75);
        }
			
		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Largos"){
			$attack = ["curse and", "reckoning and", "exterminate and"];
			$enemydmg = rand(60, 70);
			$enemygold = rand(65, 85);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(60, 80);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Venomous"){
			$attack = ["poise  biting you and temporarily poisoning you for 1 turn<br> The Venomous", "spoil creates this spoiled food smell in the air making you feel unwell.<br> The Venomous", "Headbutt simple but harmfull attack.<br> The Venomous"];
			$enemydmg = rand(70, 80);
			$enemygold = rand(75, 95);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(70, 90);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Skeleton" || $GLOBALS["userinfo"]["selected_enemy"] == "Lizardmen"){
			$attack = ["dread and", "pierce and", "whip and"];
			$enemydmg = rand(65, 75);
			$enemygold = rand(70, 90);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(65, 85);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Giant"){
			$attack = ["fracture and", "embrace and", "avalanche and"];
			$enemydmg = rand(70, 80);
			$enemygold = rand(75, 95);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(70, 90);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Death Knight"){
			$attack = ["swift strike and strikes you with out noticing. <br>Death Knight", "sidestep and hits yu in the side by surprise.<br>Death Knight", "devastate swings his massive sword down on top of you devestating your armor.<br>Death Knight"];
			$enemydmg = rand(80, 90);
			$enemygold = rand(85, 105);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(80, 100);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ice Wolves" || $GLOBALS["userinfo"]["selected_enemy"] == "Frost Goblin"){
			$attack = ["freeze and", "fake hibernate and", "bolt and"];
			$enemydmg = rand(75, 85);
			$enemygold = rand(80, 100);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(75, 95);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Orc"){
			$attack = ["terror and", "maul and", "smite and"];
			$enemydmg = rand(80, 90);
			$enemygold = rand(85, 105);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(80, 100);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Dragon"){
			$attack = ["snow storm hiding its appearance while attacking you from all sides. <br>Frost dragon.", "Icy breath slowing you down and giving you slight frostbite.<br>Frost Dragon", "Cold Fire breathe icy cold fire at you instead of burning you freezing you.<br>Frost dragon"];
			$enemydmg = rand(90, 100);
			$enemygold = rand(95, 115);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(90, 110);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Skorpikis"){
			$attack = ["sting and", "slash and", "claw and"];
			$enemydmg = rand(85, 95);
			$enemygold = rand(85, 110);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(85, 105);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Sandcrawler"){
			$attack = ["bite and", "slam and", "throw sand and"];
			$enemydmg = rand(85, 95);
			$enemygold = rand(85, 110);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(85, 105);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Anakore"){
			$attack = ["multiattack and", "smite and", " pounce and"];
			$enemydmg = rand(90, 100);
			$enemygold = rand(90, 115);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(95, 110);
        }

		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Giant Sand Worm"){
			$attack = ["sand Shifter and shakes the whole ground catching you off balance. <br>Giant Sand Worm.", "tunneler hiding its position and attack from where you least exspect it.<br>Giant Sand Worm", "devour and consumes everything in its way.<br>Giant Sand Worm"];
			$enemydmg = rand(100, 120);
			$enemygold = rand(95, 115);
			$goldlost = ($enemygold * 2);
			$xpgain = rand(105, 120);
        }


		elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Gortac the Indestructible"){
			$mindmg =  $GLOBALS["userinfo"]["equip"]["stats_min"];
			$maxdmg =  $GLOBALS["userinfo"]["equip"]["stats_max"];
			$bossdmg = rand($mindmg, $maxdmg);
			$enemydmg = (($bossdmg / 100) * 140);
			$minreward = ( $GLOBALS["userinfo"]["MaxHealth"] * 4);
			$maxreward = ( $GLOBALS["userinfo"]["MaxHealth"] * 4) +  $GLOBALS["userinfo"]["MaxHealth"];
			$enemygold = rand($minreward, $maxreward);
			$xpgain = rand($minreward, $maxreward);
			$goldlost =  rand($minreward, $maxreward) * 1.5;
        }


		if ($GLOBALS["userinfo"]["enemydifficulty"] == "Uncommon"){
			$enemydmg = (($enemydmg / 100) * 120);
			$enemygold = (($enemygold / 100) * 120);
			$goldlost = (($goldlost / 100) * 120);
			$xpgain = (($xpgain / 100) * 120);
        }

		elseif ($GLOBALS["userinfo"]["enemydifficulty"] == "Rare"){
			$enemydmg = (($enemydmg / 100) * 130);
			$enemygold = (($enemygold / 100) * 130);
			$goldlost = (($goldlost / 100) * 130);
			$xpgain = (($xpgain / 100) * 130);
        }

		elseif ($GLOBALS["userinfo"]["enemydifficulty"] == "Legendary"){
			$enemydmg = (($enemydmg / 100) * 140);
			$enemygold = (($enemygold / 100) * 140);
			$goldlost = (($goldlost / 100) * 140);
			$xpgain = (($xpgain / 100) * 140);
        }

		elseif ($GLOBALS["userinfo"]["enemydifficulty"] == "Mythical"){
			$enemydmg = (($enemydmg / 100) * 150);
			$enemygold = (($enemygold / 100) * 150);
			$goldlost = (($goldlost / 100) * 150);
			$xpgain = (($xpgain / 100) * 150);
        }

        if ($GLOBALS["userinfo"]["selected_enemy"] == "Phantasm"){
            $img = "/img/phantasm.jpg";}
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Fire Golem"){
            $img = "/img/fire_golem_by_sourshade.jpg";}
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Corrupted"){
            $img = "/img/corrupted.jpg";}
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Death Knight"){
            $img = "/img/deathKnight.jpg";}
        elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Dragon"){
            $img = "/img/frostDragon.jpg";}

        $num = array_rand($attack); 
        return array($attack[$num], $enemydmg, $enemygold, $goldlost, $xpgain, $img);
    }

    function getmove($skill){

        if ($skill == 'Swing'){
            $move = ["You swing your weapon and hit a light blow", "You strike a light blow"];
            if ($GLOBALS["userinfo"]["lvl"] >= 30){
                $move = ["You swing your weapon and hit a strong blow", "You strike a strong blow"];
            }
            if ($GLOBALS["userinfo"]["lvl"] >= 90){
                $move = ["You swing your weapon and hit a heavy blow", "You strike a heavy blow"];
            }
        }

        $num = array_rand($move);
        return $move[$num];
    }

    function getYouDmg(){
        $mindmg = $GLOBALS["userinfo"]["equip"]["stats_min"];
		$maxdmg = $GLOBALS["userinfo"]["equip"]["stats_max"];
		$youdmg = rand($mindmg, $maxdmg);
        return $youdmg;
    }

    function getYouDef(){
        $youdef = 0;
		if ($GLOBALS["userinfo"]["class"] == "Knight"){
			$youdef += rand(5, 10);
        }
		elseif ($GLOBALS["userinfo"]["class"] == "Paladin"){
			$youdef += rand(8, 15);
        }
		elseif ($GLOBALS["userinfo"]["class"] == "Grand Paladin"){
			$youdef += rand(11, 20);
        }

        $mindef = $GLOBALS["userinfo"]["wearing"]["stats_min"];
        $maxdef = $GLOBALS["userinfo"]["wearing"]["stats_max"];
        $youdef = rand($mindef, $maxdef);

        return $youdef;

    }

    function everyTurn(){
        if ($GLOBALS["userinfo"]["EnemyStun"] <= 0){
            $GLOBALS["userinfo"]["EnemyStun"] = 0;
            $GLOBALS["userinfo"]["SkillCooldown1"] -= 1;
        }
        if ($GLOBALS["userinfo"]["SkillCooldown1"] <= 0){
            $GLOBALS["userinfo"]["SkillCooldown1"] = 0;
            $GLOBALS["userinfo"]["SkillCooldown2"] -= 1;
        }
        if ($GLOBALS["userinfo"]["SkillCooldown2"] <= 0){
            $GLOBALS["userinfo"]["SkillCooldown2"] = 0;
        }
        if ($GLOBALS["userinfo"]["Buff1"] != "None"){
            $GLOBALS["userinfo"]["Buff1Time"] -= 1;
        }
        if ($GLOBALS["userinfo"]["Buff1Time"] <= 0){
            $GLOBALS["userinfo"]["Buff1"] = "None";
            $GLOBALS["userinfo"]["Buff1Time"] = 0;
        }
    }

    function deadCheck($enemyhp, $enemygold, $userhealth, $goldlost, $xpgain){
        $msg = "";
        if ($enemyhp <= 0 && $userhealth <= 0){
			$msg = ":skull: You both died!\n<:Gold:639484869809930251> " . $GLOBALS["userinfo"]["name"] . " lost " . $goldlost . " gold.";
            $GLOBALS["userinfo"]["gold"] -= $goldlost;
			if ( $GLOBALS["userinfo"]["gold"] < 0){
                $GLOBALS["userinfo"]["gold"] = 0;
            }
			if ( $GLOBALS["userinfo"]["health"] < 0){
                $GLOBALS["userinfo"]["health"] = 0;
            }
			if ( $GLOBALS["userinfo"]["Buff1"] == "Corrupt"){
                $GLOBALS["userinfo"]["Buff1"] = "None";
                $GLOBALS["userinfo"]["Buff1Time"] = 0;
            }
            $GLOBALS["userinfo"]["health"] = 0;
            $GLOBALS["userinfo"]["selected_enemy"] = "None";
            $GLOBALS["userinfo"]["enemydifficulty"] = "None";
            $GLOBALS["userinfo"]["enemieskilled"] += 1;
            $GLOBALS["userinfo"]["deaths"] += 1;
            
        }

        elseif ($userhealth <= 0){
            $msg = ":skull: " . $GLOBALS["userinfo"]["selected_enemy"] . " killed  " . $GLOBALS["userinfo"]["name"] . "<br><:Gold:639484869809930251> " . $GLOBALS["userinfo"]["name"] . " lost " . $goldlost . " gold";
			$GLOBALS["userinfo"]["gold"] -= $goldlost;
			if ($GLOBALS["userinfo"]["gold"] < 0){
				$GLOBALS["userinfo"]["gold"] = 0;
            }
			if ($GLOBALS["userinfo"]["health"] < 0){
				$GLOBALS["userinfo"]["health"] = 0;
            }
			if ($GLOBALS["userinfo"]["Buff1"] == "Corrupt"){
				$GLOBALS["userinfo"]["Buff1"] = "None";
				$GLOBALS["userinfo"]["Buff1Time"] = 0;
            }
            $GLOBALS["userinfo"]["selected_enemy"] = "None";
            $GLOBALS["userinfo"]["enemydifficulty"] = "None";
            $GLOBALS["userinfo"]["deaths"] += 1;
        }

        elseif ($enemyhp <= 0){
			$lootbag_chance = 3;
			try{
				$pterodactyl_bonus = 0;
				$pterodactyl_bonus_text = "";
				$fox_bonus_text = "";
				$goose_bonus_text = "";
				$goose_bonus = 0;
				foreach ($GLOBALS["userinfo"]["pet_list"] as $i){
					$petinfo = $i;
					$pet_level = $petinfo["level"];
					$pet_type = $petinfo["type"];
					if ($pet_type == "Goose"){
						if ($pet_level <= 10){
							$goose_bonus = (($enemygold / 100) * 5);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 20){
							$goose_bonus = (($enemygold / 100) * 10);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 30){
							$goose_bonus = (($enemygold / 100) * 15);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 40){
							$goose_bonus = (($enemygold / 100) * 20);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 50){
							$goose_bonus = (($enemygold / 100) * 25);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
						elseif ($pet_level >= 51){
							$goose_bonus = (($enemygold / 100) * 30);
							$goose_bonus_text = "\n<:Gold:639484869809930251> +" . $goose_bonus . " pet bonus.";
                        }
                    }
					if ($pet_type == "Pterodactyl"){
						if ($pet_level <= 10){
							$pterodactyl_bonus = (($xpgain / 100) * 2.5);
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 20){
							$pterodactyl_bonus = (($xpgain / 100) * 5);					
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 30){
							$pterodactyl_bonus = (($xpgain / 100) * 7.5);							
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 40){
							$pterodactyl_bonus = (($xpgain / 100) * 10);						
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
						elseif ($pet_level <= 50){
							$pterodactyl_bonus = (($xpgain / 100) * 12.5);
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
						elseif ($pet_level >= 51){
							$pterodactyl_bonus = (($xpgain / 100) * 15);
							$pterodactyl_bonus_text = "\n:sparkles: +" . $pterodactyl_bonus . " pet bonus.";
                        }
                    }
					if ($pet_type == "Fox"){
						if ($pet_level <= 10){
							$lootbag_chance = 8;
							$fox_bonus_text = "\n:sparkles: +5% pet bonus chance.";
                        }
						elseif ($pet_level <= 20){
							$lootbag_chance = 13;
							$fox_bonus_text = "\n:sparkles: +10% pet bonus chance.";
                        }
						elseif ($pet_level <= 30){
							$lootbag_chance = 18;
							$fox_bonus_text = "\n:sparkles: +15% pet bonus chance.";
                        }
						elseif ($pet_level <= 40){	
							$lootbag_chance = 23;
							$fox_bonus_text = "\n:sparkles: +20% pet bonus chance.";
                        }
						elseif ($pet_level <= 50){
							$lootbag_chance = 28;
							$fox_bonus_text = "\n:sparkles: +25% pet bonus chance.";
                        }
						elseif ($pet_level >= 51){
							$lootbag_chance = 33;
							$fox_bonus_text = "\n:sparkles: +30% pet bonus chance.";
                        }
                    }
                }
            }
            catch(Exception $e){
            }

            if ($GLOBALS["userinfo"]["party"] != "None"){
				// $partyinfo = db.party.find_one({"_id": $GLOBALS["userinfo"]["party"]})
				$party_reward_list = " ";
                $lvl_up_text = " ";
                for($i = 0; $i < count($partyinfo["amount"]); ++$i){

					$shared_gold = 0;
					$shared_xpgain = 0;
					$friend_id = $partyinfo["members"][$i];
					//$friend_info = db.users.find_one({"_id": $friend_id})
		
					if ($friend_info["role"] == "Player"){
						$shared_gold = ($enemygold / 100) * 10;
						$shared_xpgain = ($xpgain / 100) * 10;
                    }
					if ($friend_info["role"] == "Developer"){
						$shared_gold = ($enemygold / 100) * 10;
						$shared_xpgain = ($xpgain / 100) * 10;
                    }
					if ($friend_info["role"] == "patreon1"){
						$shared_gold = ($enemygold / 100) * 15;
						$shared_xpgain = ($xpgain / 100) * 15;
                    }
					if ($friend_info["role"] == "patreon2"){
						$shared_gold = ($enemygold / 100) * 20;
						$shared_xpgain = ($xpgain / 100) * 20;
                    }
					if ($friend_info["role"] == "patreon3"){
						$shared_gold = ($enemygold / 100) * 25;
						$shared_xpgain = ($xpgain / 100) * 25;
                    }
					if ($friend_info["role"] == "patreon4"){
						$shared_gold = ($enemygold / 100) * 30;
						$shared_xpgain = ($xpgain / 100) * 30;
                    }

					$friend_info["gold"] += $shared_gold;
					$friend_info["exp"] += $shared_xpgain;
				
					$flist = ($friend_info["name"] . ": <:Gold:639484869809930251>" . $shared_gold . "  Shared gold, :sparkles: " . $shared_xpgain . " Shared Exp<br>";
					$party_reward_list = $party_reward_list . $flist;
					
					if ($friend_info["exp"] >= 100 + (($friend_info["lvl"] + 1) * 3.5)){
						$friend_info["exp"] = $friend_info["exp"] - (100 + (($friend_info["lvl"] + 1) * 3.5));
						$friend_info["lvl"] = $friend_info["lvl"] + 1;
						$friend_info["health"] = $friend_info["MaxHealth"];
                        $lvl_up_text = $lvl_up_text . ":tada: " . $friend_info["name"] . " gained a level! :tada:<br>";
                    }
				
					if ($GLOBALS["userinfo"]["exp"] >= 100 + (($GLOBALS["userinfo"]["lvl"] + 1) * 3.5)){
						$GLOBALS["userinfo"]["exp"] = $GLOBALS["userinfo"]["exp"] - (100 + (($GLOBALS["userinfo"]["lvl"] + 1) * 3.5));
						$GLOBALS["userinfo"]["lvl"] = $GLOBALS["userinfo"]["lvl"] + 1;
						$GLOBALS["userinfo"]["health"] = $GLOBALS["userinfo"]["MaxHealth"];
                        $lvl_up_text = $lvl_up_text . ":tada: " . $GLOBALS["userinfo"]["name"] . " gained a level! :tada:<br>";
                    }
						
					//db.users.replace_one({"_id": $friend_id}, $friend_info, upsert=True)

					$lvl_up_text = $lvl_up_text . ":dagger:". $GLOBALS["userinfo"]["name"] . " Killed the " . $GLOBALS["userinfo"]["selected_enemy"] . "<br><:PvP:573580993055686657>The Party gets <br> " .$party_reward_list;
                }
            }

			if ($GLOBALS["userinfo"]["Buff1"] == "Corrupt"){
				$GLOBALS["userinfo"]["Buff1"] = "None";
				$GLOBALS["userinfo"]["Buff1Time"] = 0;
            }
			if ($GLOBALS["userinfo"]["selected_enemy"] == "Oofer")
				try{
					$mission = "Kill 100 Oofers";
					$add = 1;
					guild_mission_check($user, $mission, $guild, $add);
                }
                catch(Exception $e){
                    }

			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Goblin"){
                try{
					$mission = "Kill 100 Goblins";
					$add = 1;
					_guild_mission_check($user, $mission, $guild, $add);
				}
                catch(Exception $e){
                    }
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Rachi"){
				try{
					$GLOBALS["userinfo"]["statistics"][0]["monster_kills"][0]["rachi"] + 1;
				}
                catch(Exception $e){
					try{
						$GLOBALS["userinfo"]["statistics"][0]["monster_kills"].array_push(["rachi" => $GLOBALS["userinfo"]["Rachikilled"] + 1]);
                        $filter = ['$unset' => ['Rachikilled' => 0]];
						updateUserinfo($filter);
					}
                    catch(Exception $e){
                        }
                    }
                }
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Draugr":
				$GLOBALS["userinfo"]["Draugrkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Debin":
				$GLOBALS["userinfo"]["Debinkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Stalker":
				$GLOBALS["userinfo"]["Stalkerkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Fire Golem":
				$GLOBALS["userinfo"]["FireGolemkilled"] += 1
				pet_spawn = random.randint(1, 100)
				if pet_spawn >= 90:
					if $GLOBALS["userinfo"]["pet_stage"] == "Golden Goose":
						em = discord.Embed(title="A pet!", description="A tameable pet has spawned! It's a goose.\nTo tame it type `{}pet tame`".format(ctx.prefix), color=discord.Colour(0xbb4424))
						em.set_image(url="")
						await ctx.send(embed=em)
						$GLOBALS["userinfo"]["pet_find"] = "Golden Goose"
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Wyvern":
				$GLOBALS["userinfo"]["Wyvernkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Oofer":
				$GLOBALS["userinfo"]["Ooferkilled"]  += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Souleater":
				$GLOBALS["userinfo"]["Souleaterkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Wolf":
				$GLOBALS["userinfo"]["Wolfkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Goblin":
				$GLOBALS["userinfo"]["Goblinkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Zombie":
				$GLOBALS["userinfo"]["Zombiekilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Phantasm":
				$GLOBALS["userinfo"]["Phantasmkilled"] += 1
				pet_spawn = random.randint(1, 100)
				if pet_spawn >= 90:
					if $GLOBALS["userinfo"]["pet_stage"] == "Polar Bear":
						em = discord.Embed(title="A pet!", description="A tameable pet has spawned! It's a polar bear.\nTo tame it type `{}pet tame`".format(ctx.prefix), color=discord.Colour(0xD4D8D7))
						em.set_image(url="")
						await ctx.send(embed=em)
						$GLOBALS["userinfo"]["pet_find"] = "Polar Bear"
			elif $GLOBALS["userinfo"]["selected_enemy"] == "The Corrupted":
				$GLOBALS["userinfo"]["TheCorruptedkilled"] += 1
				pet_spawn = random.randint(1, 100)
				if pet_spawn >= 90:
					if $GLOBALS["userinfo"]["pet_stage"] == "Fox":
						em = discord.Embed(title="A pet!", description="A tameable pet has spawned! It's a fox.\nTo tame it type `{}pet tame`".format(ctx.prefix), color=discord.Colour(0x7a2c05))
						em.set_image(url="")
						await ctx.send(embed=em)
						$GLOBALS["userinfo"]["pet_find"] = "Fox"
			elif $GLOBALS["userinfo"]["selected_enemy"] == "The Accursed":
				$GLOBALS["userinfo"]["TheAccursedkilled"] += 1
				pet_spawn = random.randint(1, 100)
				if pet_spawn >= 90:
					if $GLOBALS["userinfo"]["pet_stage"] == "Small Cerberus":
						em = discord.Embed(title="A pet!", description="A tameable pet has spawned! It's a small cerberus.\nTo tame it type `{}pet tame`".format(ctx.prefix), color=discord.Colour(0xcb2004))
						em.set_image(url="")
						await ctx.send(embed=em)
						$GLOBALS["userinfo"]["pet_find"] = "Small Cerberus"
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Elder Dragon":
				$GLOBALS["userinfo"]["ElderDragonkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Hades":
				$GLOBALS["userinfo"]["Hadeskilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Ebony Guardian":
				$GLOBALS["userinfo"]["EbonyGuardiankilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Harpy":
				$GLOBALS["userinfo"]["Harpykilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Dormammu":
				$GLOBALS["userinfo"]["Dormammukilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Ettin":
				$GLOBALS["userinfo"]["Ettinkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "The Nameless King":
				$GLOBALS["userinfo"]["TheNamelessKingkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Largos":
				$GLOBALS["userinfo"]["Largoskilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Deathclaw":
				$GLOBALS["userinfo"]["Deathclawkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Saurian":
				$GLOBALS["userinfo"]["Sauriankilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "The venemous":
				$GLOBALS["userinfo"]["TheVenomouskilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Skeleton":
				$GLOBALS["userinfo"]["Skeletonkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Lizardmen":
				$GLOBALS["userinfo"]["Lizardmenkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Giant":
				$GLOBALS["userinfo"]["Giantkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Death Knight":
				$GLOBALS["userinfo"]["DeathKnightkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Ice Wolves":
				$GLOBALS["userinfo"]["IceWolveskilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Frost Orc":
				$GLOBALS["userinfo"]["FrostOrckilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Frost Goblin":
				$GLOBALS["userinfo"]["FrostGoblinkilled"] += 1
			elif $GLOBALS["userinfo"]["selected_enemy"] == "Frost Dragon":
				$GLOBALS["userinfo"]["FrostDragonkilled"] += 1

			try: 
				if $GLOBALS["userinfo"]["toggle"][0]["loot"] == True:
					db.users.replace_one({"_id": user.id}, $GLOBALS["userinfo"], upsert=True)			
					await _level_up_check_user(self, ctx, user)
					
				if $GLOBALS["userinfo"]["toggle"][0]["loot"] == False:
					em = discord.Embed(description=":dagger: {} killed the {}\n<:GoldBars:573781770709893130> {} gained {} gold{}\n:sparkles: {} gained {} experience{}".format($GLOBALS["userinfo"]["name"], $GLOBALS["userinfo"]["selected_enemy"], $GLOBALS["userinfo"]["name"], int(enemygold), goose_bonus_text, $GLOBALS["userinfo"]["name"], xpgain, pterodactyl_bonus_text), color=discord.Colour(0x00ff00))
					await ctx.send(embed=em)
					db.users.replace_one({"_id": user.id}, $GLOBALS["userinfo"], upsert=True)
					await _level_up_check_user(self, ctx, user)
					
			except:
				pass

			$GLOBALS["userinfo"]["selected_enemy"] = "None"
			$GLOBALS["userinfo"]["enemydifficulty"] = "None"
			$GLOBALS["userinfo"]["gold"] += int(enemygold + goose_bonus)
			$GLOBALS["userinfo"]["exp"] += int(xpgain + pterodactyl_bonus)	

		
			eventinfo = db.users.find_one({ "_id": 387317544228487168 })
			if eventinfo["events"][1]["christmas"] == True:
					chance2 = random.randint(1, 100)
					if chance2 <= 5:
						em = discord.Embed(description=fileIO(f"data/languages/{language}.json", "load")["fight"]["cratechristmas"]["translation"].format($GLOBALS["userinfo"]["name"], ctx.prefix), color=discord.Colour(0xffffff))
						await ctx.send(embed=em)
						$GLOBALS["userinfo"]["event"]["santaGift"] += 1
					else:
						if lootbag <= lootbag_chance:
							if chance2 >= 50:
								em = discord.Embed(description=fileIO(f"data/languages/{language}.json", "load")["fight"]["crate"]["translation"].format($GLOBALS["userinfo"]["name"], fox_bonus_text), color=discord.Colour(0xffffff))
								await ctx.send(embed=em)
								$GLOBALS["userinfo"]["lootbag"] += 1
							else:			
								em = discord.Embed(description=fileIO(f"data/languages/{language}.json", "load")["fight"]["key"]["translation"].format($GLOBALS["userinfo"]["name"], fox_bonus_text), color=discord.Colour(0xffffff))
								await ctx.send(embed=em)
								$GLOBALS["userinfo"]["keys"] += 1		
							
			else:
				if lootbag <= lootbag_chance:
					chance2 = random.randint(1, 100)
					if chance2 >= 50:
						em = discord.Embed(description=fileIO(f"data/languages/{language}.json", "load")["fight"]["crate"]["translation"].format($GLOBALS["userinfo"]["name"], fox_bonus_text), color=discord.Colour(0xffffff))
						await ctx.send(embed=em)
						$GLOBALS["userinfo"]["lootbag"] += 1
					else:			
						em = discord.Embed(description=fileIO(f"data/languages/{language}.json", "load")["fight"]["key"]["translation"].format($GLOBALS["userinfo"]["name"], fox_bonus_text), color=discord.Colour(0xffffff))
						await ctx.send(embed=em)
						$GLOBALS["userinfo"]["keys"] += 1

			
			$GLOBALS["userinfo"]["enemieskilled"] += 1
			

		db.users.replace_one({"_id": user.id}, $GLOBALS["userinfo"], upsert=True)
		try:
			await _level_up_check_user(self, ctx, user)
		except:
			return




















        }





















        return $msg;
    }