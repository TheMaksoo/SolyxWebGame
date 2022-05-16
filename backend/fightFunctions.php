<?php
    function findEnemy(){
        json_encode($currentLocationinfo = getCurrentLocation());

        foreach($currentLocationinfo[0]["monsters"] as $enemy){
            if ($enemy["name"] == $GLOBALS["userinfo"]["selected_enemy"]){
                return $enemy;
            }
        }     
    }
    function getEnemy(){
        json_encode($currentLocationinfo = getCurrentLocation());
        $num = array_rand($currentLocationinfo[0]["monsters"]);
        $debi = $currentLocationinfo[0]["monsters"][$num];
        return $debi;
    }
    function getDebiName($debi){
        if ($debi["type"] == "boss"){
            $debiname = "&#128305; " . $debi["name"];
        }
        elseif ($debi["type"] == "strong"){
            $debiname = "&#9884; " . $debi["name"];
        }
        else{
            $debiname = " " . $debi["name"];
        }
        return $debiname;
    }
    function getDifficulty(){
        $difficulty = rand(1, 100);
		$GLOBALS["userinfo"]["enemydifficulty"] = "Common";
        if ($difficulty >= 99){
            $difficulty = "Mythical " ;
            $GLOBALS["userinfo"]["enemydifficulty"] = "Mythical";
        }
        elseif ($difficulty >= 90){
            $difficulty = "Legendary " ;
            $GLOBALS["userinfo"]["enemydifficulty"] = "Legendary";
        }
        elseif ($difficulty >= 70){
            $difficulty = "Rare ";
            $GLOBALS["userinfo"]["enemydifficulty"] = "Rare";
        }
        elseif ($difficulty >= 40){
            $difficulty = "Uncommon ";
            $GLOBALS["userinfo"]["enemydifficulty"] = "Uncommon";
        }
        elseif ($difficulty >= 0){
            $difficulty = "Common "; 
            $GLOBALS["userinfo"]["enemydifficulty"] = "Common";
        }
        return $difficulty;
    }
    function getBossImage($debi){
        $img = "";
        
        try {
            if ($debi["img"] == true){
            $imgname = str_replace(' ', '', $debi["name"]);
            $img = "/img/monsters/" . $imgname . ".jpeg";
            }
        } catch (\Throwable $th) {
        }
        return $img;
    }
    function addEnemyToUser(){
        $GLOBALS["userinfo"]["selected_enemy"] = $_SESSION['debi']["name"];
        $GLOBALS["userinfo"]["enemyhp"] = rand($_SESSION['debi']["healthMin"], $_SESSION['debi']["healthMax"]);
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
        if ($_SESSION['debi'] = "None"){
            $_SESSION['debi'] = findEnemy();
        }
        $enemyinfo = $_SESSION['debi'];
        $enemydmg = rand($enemyinfo["damageMin"], $enemyinfo["damageMax"]);
        $enemygold = rand($enemyinfo["goldMin"], $enemyinfo["goldMax"]);
        $goldlost = ($enemygold * 2);
        $xpgain = rand($enemyinfo["experienceMin"], $enemyinfo["experienceMax"]);

		if ($GLOBALS["userinfo"]["selected_enemy"] == "Gortac the Indestructible"){
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
        $num = array_rand($enemyinfo["attacks"]); 
        return array($enemyinfo["attacks"][$num], ceil($enemydmg), ceil($enemygold), ceil($goldlost), ceil($xpgain));
    }
    function getmove($currentskill){

        $skillinfo = getSkillInfo($currentskill);
        $move = $skillinfo[0]["attack1"];
        if ($GLOBALS["userinfo"]["lvl"] >= 30){
            $move = $skillinfo[0]["attack2"];
        }
        if ($GLOBALS["userinfo"]["lvl"] >= 90){
            $move = $skillinfo[0]["attack3"];
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
        $loot_text = "";
        if ($enemyhp <= 0 && $userhealth <= 0){
			$loot_text = "&#9760; You both died!<br>" . $GLOBALS["userinfo"]["name"] . " lost " . $goldlost . " gold.";
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
            $loot_text = "&#9760; " . $GLOBALS["userinfo"]["selected_enemy"] . " killed  " . $GLOBALS["userinfo"]["name"] . "<br> " . $GLOBALS["userinfo"]["name"] . " lost " . $goldlost . " gold";
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
            $pet_text = "";
			$pterodactyl_bonus = 0;
            $pterodactyl_bonus_text = "";
            $fox_bonus_text = "";
            $goose_bonus_text = "";
            $goose_bonus = 0;
			try{
				
				foreach ($GLOBALS["userinfo"]["pet_list"] as $petinfo){
					$pet_level = $petinfo["level"];
					$pet_type = $petinfo["type"];
					if ($pet_type == "Goose"){
						if ($pet_level <= 10){
							$goose_bonus = (($enemygold / 100) * 5);
                        }
						elseif ($pet_level <= 20){
							$goose_bonus = (($enemygold / 100) * 10);
                        }
						elseif ($pet_level <= 30){
							$goose_bonus = (($enemygold / 100) * 15);
                        }
						elseif ($pet_level <= 40){
							$goose_bonus = (($enemygold / 100) * 20);
                        }
						elseif ($pet_level <= 50){
							$goose_bonus = (($enemygold / 100) * 25);
                        }
						elseif ($pet_level >= 51){
							$goose_bonus = (($enemygold / 100) * 30);
							
                        }
                    }
					if ($pet_type == "Pterodactyl"){
						if ($pet_level <= 10){
							$pterodactyl_bonus = (($xpgain / 100) * 2.5);
                        }
						elseif ($pet_level <= 20){
							$pterodactyl_bonus = (($xpgain / 100) * 5);	
                        }
						elseif ($pet_level <= 30){
							$pterodactyl_bonus = (($xpgain / 100) * 7.5);							
                        }
						elseif ($pet_level <= 40){
							$pterodactyl_bonus = (($xpgain / 100) * 10);						
                        }
						elseif ($pet_level <= 50){
							$pterodactyl_bonus = (($xpgain / 100) * 12.5);
                        }
						elseif ($pet_level >= 51){
							$pterodactyl_bonus = (($xpgain / 100) * 15);
                            
                        }
                        
                    }
					if ($pet_type == "Fox"){
						if ($pet_level <= 10){
							$lootbag_chance = 8;
							$fox_bonus_text = "<br>+5% pet crate bonus chance.";
                        }
						elseif ($pet_level <= 20){
							$lootbag_chance = 13;
							$fox_bonus_text = "<br>+10% pet crate bonus chance.";
                        }
						elseif ($pet_level <= 30){
							$lootbag_chance = 18;
							$fox_bonus_text = "<br>+15% pet crate bonus chance.";
                        }
						elseif ($pet_level <= 40){	
							$lootbag_chance = 23;
							$fox_bonus_text = "<br>+20% pet crate bonus chance.";
                        }
						elseif ($pet_level <= 50){
							$lootbag_chance = 28;
							$fox_bonus_text = "<br>+25% pet crate bonus chance.";
                        }
						elseif ($pet_level >= 51){
							$lootbag_chance = 33;
							$fox_bonus_text = "<br>+30% pet crate bonus chance.";
                        }
                    }
                }
                $goose_bonus_text = "<br> +" . ceil($goose_bonus) . " Gold pet bonus.";
                $pterodactyl_bonus_text = "<br>&#10024; +" . ceil($pterodactyl_bonus) . " Experience pet bonus.";

               
            }
            catch(Exception $e){
            }
            $pet_text = $pet_text . $pterodactyl_bonus_text . $goose_bonus_text . $fox_bonus_text;
            // if ($GLOBALS["userinfo"]["party"] != "None"){
			// 	// $partyinfo = db.party.find_one({"_id": $GLOBALS["userinfo"]["party"]})
			// 	$party_reward_list = "";
            //     $party_text = "";
            //     $lvl_up_text = "";
            //     for($i = 0; $i < count($partyinfo["amount"]); ++$i){

			// 		$shared_gold = 0;
			// 		$shared_xpgain = 0;
			// 		$friend_id = $partyinfo["members"][$i];
			// 		//$friend_info = db.users.find_one({"_id": $friend_id})
		
			// 		if ($friend_info["role"] == "Player"){
			// 			$shared_gold = ($enemygold / 100) * 10;
			// 			$shared_xpgain = ($xpgain / 100) * 10;
            //         }
			// 		if ($friend_info["role"] == "Developer"){
			// 			$shared_gold = ($enemygold / 100) * 10;
			// 			$shared_xpgain = ($xpgain / 100) * 10;
            //         }
			// 		if ($friend_info["role"] == "patreon1"){
			// 			$shared_gold = ($enemygold / 100) * 15;
			// 			$shared_xpgain = ($xpgain / 100) * 15;
            //         }
			// 		if ($friend_info["role"] == "patreon2"){
			// 			$shared_gold = ($enemygold / 100) * 20;
			// 			$shared_xpgain = ($xpgain / 100) * 20;
            //         }
			// 		if ($friend_info["role"] == "patreon3"){
			// 			$shared_gold = ($enemygold / 100) * 25;
			// 			$shared_xpgain = ($xpgain / 100) * 25;
            //         }
			// 		if ($friend_info["role"] == "patreon4"){
			// 			$shared_gold = ($enemygold / 100) * 30;
			// 			$shared_xpgain = ($xpgain / 100) * 30;
            //         }

			// 		$friend_info["gold"] += $shared_gold;
			// 		$friend_info["exp"] += $shared_xpgain;
				
			// 		$flist = $friend_info["name"] . ": <:Gold:639484869809930251>" . $shared_gold . "  Shared gold, &#10024; " . $shared_xpgain . " Shared Exp<br>";
			// 		$party_reward_list = $party_reward_list . $flist;
					
			// 		if ($friend_info["exp"] >= 100 + (($friend_info["lvl"] + 1) * 3.5)){
			// 			$friend_info["exp"] = $friend_info["exp"] - (100 + (($friend_info["lvl"] + 1) * 3.5));
			// 			$friend_info["lvl"] = $friend_info["lvl"] + 1;
			// 			$friend_info["health"] = $friend_info["MaxHealth"];
            //             $lvl_up_text = $lvl_up_text . ":tada: " . $friend_info["name"] . " gained a level! :tada:<br>";
            //         }
						
            //         $filter = "None";
			// 		updatePartyinfo($filter, $friend_info);
			// 		$party_text = $lvl_up_text . "&#128481;". $GLOBALS["userinfo"]["name"] . " Killed the " . $GLOBALS["userinfo"]["selected_enemy"] . "<br><:PvP:573580993055686657>The Party gets <br> " .$party_reward_list;
            //     }
            // }

			if ($GLOBALS["userinfo"]["Buff1"] == "Corrupt"){
				$GLOBALS["userinfo"]["Buff1"] = "None";
				$GLOBALS["userinfo"]["Buff1Time"] = 0;
            }
			if ($GLOBALS["userinfo"]["selected_enemy"] == "Oofer"){
				try{
					$mission = "Kill 100 Oofers";
					$add = 1;
					_guild_mission_check();
                }
                catch(Exception $e){
                }
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Goblin"){
                try{
					$mission = "Kill 100 Goblins";
					$add = 1;
					_guild_mission_check();
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
                        $newRachi = $GLOBALS["userinfo"]["Rachikilled"] + 1;
                        $arrayToPush = $GLOBALS["userinfo"]["statistics"][0]["monster_kills"][0];
                        array_push($arrayToPush, ["rachi" => $newRachi]);
                        $filter = ['$unset' => ['Rachikilled' => 0]];
						updateUserinfo($filter);
					}
                    catch(Exception $e){
                    }
                }
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Draugr"){
				$GLOBALS["userinfo"]["Draugrkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Debin"){
				$GLOBALS["userinfo"]["Debinkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Stalker"){
				$GLOBALS["userinfo"]["Stalkerkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Fire Golem"){
				$GLOBALS["userinfo"]["FireGolemkilled"] += 1;
				$pet_spawn = rand(1, 100);
				if ($pet_spawn >= 90){
					if ($GLOBALS["userinfo"]["pet_stage"] == "Golden Goose"){
						$pet_text = "A tameable pet has spawned! It's a goose.";
						$GLOBALS["userinfo"]["pet_find"] = "Golden Goose";
                    }
                }
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Wyvern"){
				$GLOBALS["userinfo"]["Wyvernkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Oofer"){
				$GLOBALS["userinfo"]["Ooferkilled"]  += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Souleater"){
				$GLOBALS["userinfo"]["Souleaterkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Wolf"){
				$GLOBALS["userinfo"]["Wolfkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Goblin"){
				$GLOBALS["userinfo"]["Goblinkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Zombie"){
				$GLOBALS["userinfo"]["Zombiekilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Phantasm"){
				$GLOBALS["userinfo"]["Phantasmkilled"] += 1;
				$pet_spawn = rand(1, 100);
				if ($pet_spawn >= 90){
					if ($GLOBALS["userinfo"]["pet_stage"] == "Polar Bear"){
						$pet_text = "A tameable pet has spawned! It's a polar bear.";
						$GLOBALS["userinfo"]["pet_find"] = "Polar Bear";
                    }
                }
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Corrupted"){
				$GLOBALS["userinfo"]["TheCorruptedkilled"] += 1;
				$pet_spawn = rand(1, 100);
				if ($pet_spawn >= 90){
					if ($GLOBALS["userinfo"]["pet_stage"] == "Fox"){
						$pet_text = "A tameable pet has spawned! It's a fox.";
						$GLOBALS["userinfo"]["pet_find"] = "Fox";
                    }
                }
            }            
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Accursed"){
				$GLOBALS["userinfo"]["TheAccursedkilled"] += 1;
				$pet_spawn = rand(1, 100);
				if ($pet_spawn >= 90){
					if ($GLOBALS["userinfo"]["pet_stage"] == "Small Cerberus"){
						$pet_text = "A tameable pet has spawned! It's a small cerberus.";
						$GLOBALS["userinfo"]["pet_find"] = "Small Cerberus";
                    }
                }
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Elder Dragon"){
				$GLOBALS["userinfo"]["ElderDragonkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Hades"){
				$GLOBALS["userinfo"]["Hadeskilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ebony Guardian"){
				$GLOBALS["userinfo"]["EbonyGuardiankilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Harpy"){
				$GLOBALS["userinfo"]["Harpykilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Dormammu"){
				$GLOBALS["userinfo"]["Dormammukilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ettin"){
				$GLOBALS["userinfo"]["Ettinkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The Nameless King"){
				$GLOBALS["userinfo"]["TheNamelessKingkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Largos"){
				$GLOBALS["userinfo"]["Largoskilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Deathclaw"){
				$GLOBALS["userinfo"]["Deathclawkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Saurian"){
				$GLOBALS["userinfo"]["Sauriankilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "The venemous"){
				$GLOBALS["userinfo"]["TheVenomouskilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Skeleton"){
				$GLOBALS["userinfo"]["Skeletonkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Lizardmen"){
				$GLOBALS["userinfo"]["Lizardmenkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Giant"){
				$GLOBALS["userinfo"]["Giantkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Death Knight"){
				$GLOBALS["userinfo"]["DeathKnightkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Ice Wolves"){
				$GLOBALS["userinfo"]["IceWolveskilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Orc"){
				$GLOBALS["userinfo"]["FrostOrckilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Goblin"){
				$GLOBALS["userinfo"]["FrostGoblinkilled"] += 1;
            }
			elseif ($GLOBALS["userinfo"]["selected_enemy"] == "Frost Dragon"){
				$GLOBALS["userinfo"]["FrostDragonkilled"] += 1;
            }

			try{ 
				if ($GLOBALS["userinfo"]["toggle"][0]["loot"] == False){
					$loot_text = "&#128481; " . $GLOBALS["userinfo"]["name"] . " killed the " .  $GLOBALS["userinfo"]["selected_enemy"]. "<br>" . $GLOBALS["userinfo"]["name"] . " gained " . $enemygold . " gold" . $goose_bonus_text . "<br>&#10024; " . $GLOBALS["userinfo"]["name"] . " gained " . $xpgain . " experience" . $pterodactyl_bonus_text;
                }
                _level_up_check_user();
            } 
            catch(Exception $e){
                $loot_text = "";
                }
            $GLOBALS["userinfo"]["health"] = ceil($userhealth);
			$GLOBALS["userinfo"]["selected_enemy"] = "None";
			$GLOBALS["userinfo"]["enemydifficulty"] = "None";
			$GLOBALS["userinfo"]["gold"] += ceil($enemygold + $goose_bonus);
			$GLOBALS["userinfo"]["exp"] += ceil($xpgain + $pterodactyl_bonus);	

		
			// eventinfo = db.users.find_one({ "_id": 387317544228487168 })
			// if eventinfo["events"][1]["christmas"] == True:
			// 		chance2 = random.randint(1, 100)
			// 		if chance2 <= 5:
			// 			em = discord.Embed(description=fileIO(f"data/languages/{language}.json", "load")["fight"]["cratechristmas"]["translation"].format($GLOBALS["userinfo"]["name"], ctx.prefix), color=discord.Colour(0xffffff))
			// 			await ctx.send(embed=em)
			// 			$GLOBALS["userinfo"]["event"]["santaGift"] += 1
			// 		else:
			// 			if lootbag <= lootbag_chance:
			// 				if chance2 >= 50:
			// 					em = discord.Embed(description=fileIO(f"data/languages/{language}.json", "load")["fight"]["crate"]["translation"].format($GLOBALS["userinfo"]["name"], fox_bonus_text), color=discord.Colour(0xffffff))
			// 					await ctx.send(embed=em)
			// 					$GLOBALS["userinfo"]["lootbag"] += 1
			// 				else:			
			// 					em = discord.Embed(description=fileIO(f"data/languages/{language}.json", "load")["fight"]["key"]["translation"].format($GLOBALS["userinfo"]["name"], fox_bonus_text), color=discord.Colour(0xffffff))
			// 					await ctx.send(embed=em)
			// 					$GLOBALS["userinfo"]["keys"] += 1		
							
			//else:
            $lootbag_chance = 3;
            $lootbag_text = "";
            $lootbag = rand(1, 100);
            if ($lootbag <= $lootbag_chance){
                $chance2 = rand(1, 100);
                if ($chance2 >= 50){
                    $lootbag_text = "<:Crate:639425690072252426> " . $GLOBALS["userinfo"]["name"] . " obtained a crate!" . $fox_bonus_text;
                    $GLOBALS["userinfo"]["lootbag"] += 1;
                }
                else {	
                    $lootbag_text = "<:Key:573780034355986432> " . $GLOBALS["userinfo"]["name"] . " obtained a key!" . $fox_bonus_text;	
                    $GLOBALS["userinfo"]["keys"] += 1;
                }
            }
			
			$GLOBALS["userinfo"]["enemieskilled"] += 1;
        }
        // . $party_text
	    return $loot_text;
    }

    function _guild_mission_check(){

    }

    function _level_up_check_user(){

    }
