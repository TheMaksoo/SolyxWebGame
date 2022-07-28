<?php
    include_once 'header.php';
    require __DIR__ . "/backend/config.php";
    require $_SERVER['DOCUMENT_ROOT'] .'/solyx/backend/discord.php';
    
    if(!isset($_SESSION["user_id"])){
        header("Location: $base_url/login.php?action=login");
    }

    $userinfo = getUserinfo();
    $guildinfo = guildName();
    $title = getTitle();
    $maxExp = getMaxExp();
    $pet = getPet();
    $equipment = getEquipmentStats();
    $filter = "None";
    $class = getUserClass();
    $iconclass = getIconClass($class);
    ?>
<body >
    <main>
        <section class="game-section" >
            <div class="stats-container">
                <ul> 
                    <img src="https://cdn.discordapp.com/avatars/<?php $extention = isAnimated($_SESSION['user_avatar']); echo $_SESSION['user_id'] . "/" . $_SESSION['user_avatar'] . $extention; ?>" style="height: 40px; border-radius: 50%;"/>
                    <li><Strong>User info</Strong></li>
                    <li>Race: <img  src="img\icons\Race\<?php  print_r($userinfo['race']) ?>.webp" data-toggle="tooltip" data-original-title="<?php  print_r($userinfo['race']) ?>" class="stats-icons"></li>
                    <li>Class: <img  src="img\icons\Class\<?php  print_r($class) ?>.webp" data-toggle="tooltip" data-original-title="<?php  print_r($userinfo['class']) ?>" class="<?php print_r($iconclass) ?>"></li>
                    <li>Title: <span class="stats-icons"data-toggle="tooltip" data-original-title="Equipped title to show off."><?php print_r($title); ?></span></li>
                    <li>Guild: <span class="stats-icons"data-toggle="tooltip" data-original-title="what guild your affiliated with."><?php print_r($guildinfo->name);?></span></li>
                    <br>
                    <li>Level: <span class="stats-icons" data-toggle="tooltip" data-original-title="Current level."><?php print_r($userinfo["lvl"]);?></span></li>
                    <li>Exp: <span class="stats-icons" data-toggle="tooltip" data-original-title="Current and needed experience."><?php print_r($userinfo["exp"]);?>/<?php print_r($maxExp);?></span></li>
                    <li>Health: <span class="stats-icons" data-toggle="tooltip" data-original-title="Current and maximum health."><?php print_r($userinfo["health"]);?>/<?php print_r($userinfo["MaxHealth"]);?></span></li>
                    <li>Pet: <span class="stats-icons" data-toggle="tooltip" data-original-title="Current equipped pet (All pet bonuses still count)."><?php print_r($pet);?></span></li>
                    <br>
                    <li><Strong>Equipment</Strong></li>
                    <li>Weapon: <span class="stats-icons" data-toggle="tooltip" data-original-title="Weapon name"><?php print_r($userinfo["equip"]["name"]);?></span></li>
                    <li>Damage: <span class="stats-icons" data-toggle="tooltip" data-original-title="Damage range done by your weapon."><?php print_r($userinfo["equip"]["stats_min"]);?>-<?php print_r($userinfo["equip"]["stats_max"]);?></span></li>
                    <li>Bonus Damage: <span class="stats-icons" data-toggle="tooltip" data-original-title="Extra damage done by pets / assessories."><?php print_r($equipment[1]);?>-<?php print_r($equipment[2]);?></span></li>
                    <br>
                    <li>Total Defense: <span class="stats-icons" data-toggle="tooltip" data-original-title="Damage that gets negated."><?php print_r($equipment[3]);?>-<?php print_r($equipment[4]);?></span></li>
                    <br>
                    <li><Strong>Tools</Strong></li>
                    <li>Axe level: <span class="stats-icons" data-toggle="tooltip" data-original-title="To mine wood."><?php print_r($userinfo["axelvl"]);?></span></li>
                    <li>Pickaxe level: <span class="stats-icons" data-toggle="tooltip" data-original-title="To min stone."><?php print_r($userinfo["pickaxelvl"]);?></span></li>
                    <li>Saw level: <span class="stats-icons" data-toggle="tooltip" data-original-title="to make planks."><?php print_r($userinfo["sawlvl"]);?></span></li>
                    <li>Chisel level: <span class="stats-icons" data-toggle="tooltip" data-original-title="To make bricks."><?php print_r($userinfo["chisellvl"]);?></span></li>
                    <li>Hammer level: <span class="stats-icons" data-toggle="tooltip" data-original-title="To make iron plates."><?php print_r($userinfo["hammerlvl"]);?></span></li>
                    <br>
                    <li><Strong>History</Strong></li>
                    <li>Kills: <span class="stats-icons" data-toggle="tooltip" data-original-title="Total enemies killed."><?php print_r($userinfo["enemieskilled"]);?></span></li>
                    <li>Trap Kills: <span class="stats-icons" data-toggle="tooltip" data-original-title="Total Trap kills."><?php print_r($userinfo["TrapKills"]);?></span></li>
                    <li>Deaths: <span class="stats-icons" data-toggle="tooltip" data-original-title="Deaths"><?php print_r($userinfo["deaths"]);?></span></li>
                </ul>
            </div>
            <div class="game-container">
                <div class="game-content">
                    <?php
                    // print_r($userinfo);
                    if (isset($_GET['content'])){
                        if ($_GET['content'] == 'gatherChop') {include 'content/gather/gatherChop.php';} 
                        if ($_GET['content'] == 'gatherMine') {include 'content/gather/gatherMine.php';}
                        if ($_GET['content'] == 'gatherFish') {include 'content/gather/gatherFish.php';}
                        if ($_GET['content'] == 'fight') {include 'content/fight/fight.php';}
                    }
                    else{
                        include 'content/welcome.php';
                    }
                    
                    ?>
                </div>
            </div>
            <div class="inventory-container">
                <ul>
                    <li><Strong>Supplies</Strong></li>
                    <li><img  src="img\icons\recources\Gold.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Your currency"> <span><?php print_r($userinfo["gold"]);?></span></li>
                    <li><img  src="img\icons\recources\Wood.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Wood | Crafting and building material"><span ><?php print_r($userinfo["wood"]);?></span></li>
                    <li><img  src="img\icons\recources\Stone.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Stone | Crafting and building material"><span><?php print_r($userinfo["stone"]);?></span></li>
                    <li><img  src="img\icons\recources\Metal.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Metal | Crafting and building material"><span><?php print_r($userinfo["metal"]); ?></span></li>
                    <li><img  src="img\icons\recources\Plank.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Planks | Advanced crafting and building material"><span><?php print_r($userinfo["planks"]);?></span></li>
                    <li><img  src="img\icons\recources\Brick.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Bricks | Advanced crafting and building material"><span><?php print_r($userinfo["bricks"]);?></span></li>
                    <li><img  src="img\icons\recources\IronPlate.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Iron Plates | Advanced crafting and building material"><span><?php print_r($userinfo["iron_plates"]);?></span></li>
                    <br>
                    <li><Strong>Items</Strong></li>
                    <li><img  src="img\icons\recources\key.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Keys | 1 of 2 items to open crates!"><span><?php print_r($userinfo["keys"]);?></span></li>
                    <li><img  src="img\icons\recources\Crate.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Crates | The crates :D"><span><?php print_r($userinfo["lootbag"]);?></span></li>
                    <li><img  src="img\icons\recources\HealthPotion.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Hp potions | Heals you for 25-55 Hp"><span><?php print_r($userinfo["hp_potions"]);?></span></li>
                    <li><img  src="img\icons\recources\ExpPotion.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Exp potions | Can give u a boost of exp, 40-75 Exp"><span><?php print_r($userinfo["exp_potions"]);?></span></li>
                    <li><img  src="img\icons\recources\PetFood.webp" class="stats-icons" data-toggle="tooltip" data-original-title="Pet food | Food to level up your pets."><span><?php print_r($userinfo["pet_food"]);?></span></li>
                    <br>
                    <li><Strong>buildings</Strong><?php ?></li>
                    
                </ul>
            </div>
            <div class="extra-container">

            </div>
            <div class="commands-container">
                <?php 
                //error_reporting(0); 
                include 'content/commands.php';
                updateUserinfo($filter);
                ?> 
            </div>
            <div class="extra-container2">

            </div>
        </section>
    </main>  
</body>
<?php
    include_once 'copyrightFooter.php';
    ?>