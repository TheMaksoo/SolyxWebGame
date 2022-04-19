<?php
    include_once 'header.php';
    require __DIR__ . "/backend/config.php";
    require __DIR__ . "/backend/functions.php";
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
    
    ?>
<body>
    <main>
        <section class="game-section">
            <div class="stats-container">
                <ul>
                    <img src="https://cdn.discordapp.com/avatars/<?php $extention = isAnimated($_SESSION['user_avatar']); echo $_SESSION['user_id'] . "/" . $_SESSION['user_avatar'] . $extention; ?>" style="width:40; height: 40px; border-radius: 50%;"/>
                    <li>Name:<?php print_r($userinfo->name);?></li>
                    <li>Race:<?php print_r($userinfo["race"]);?></li>
                    <li>Class:<?php print_r($userinfo["class"]);?></li>
                    <li>Title:<?php print_r($title); ?></li>
                    <li>Guild:<?php print_r($guildinfo->name);?></li>
                    <br>
                    <li>Level:<?php print_r($userinfo["lvl"]);?></li>
                    <li>Exp:<?php print_r($userinfo["exp"]);?>/<?php print_r($maxExp);?></li>
                    <li>Health:<?php print_r($userinfo["health"]);?>/<?php print_r($userinfo["MaxHealth"]);?></li>
                    <li>Market ID:<?php print_r($userinfo["_id"]);?></li>
                    <li>Pet:<?php print_r($pet);?></li>
                    <br>
                    <li>Equipment</li>
                    <li>Weapon:<?php print_r($userinfo["equip"]["name"]);?></li>
                    <li>Weapon Damage:<?php print_r($userinfo["equip"]["stats_min"]);?>-<?php print_r($userinfo["equip"]["stats_max"]);?></li>
                    <li>Bonus Damage:<?php print_r($equipment[1]);?>-<?php print_r($equipment[2]);?></li>
                    <br>
                    <li>Total Defense:<?php print_r($equipment[3]);?>-<?php print_r($equipment[4]);?></li>
                    <br>
                    <li>Tools</li>
                    <li>Axe level:<?php print_r($userinfo["axelvl"]);?></li>
                    <li>Pickaxe level:<?php print_r($userinfo["pickaxelvl"]);?></li>
                    <li>Saw level:<?php print_r($userinfo["sawlvl"]);?></li>
                    <li>Chisel level:<?php print_r($userinfo["chisellvl"]);?></li>
                    <li>Hammer level:<?php print_r($userinfo["hammerlvl"]);?></li>
                    <br>
                    <li>History</li>
                    <li>Kills:<?php print_r($userinfo["enemieskilled"]);?></li>
                    <li>Trap Kills:<?php print_r($userinfo["TrapKills"]);?></li>
                    <li>Deaths:<?php print_r($userinfo["deaths"]);?></li>
                </ul>
            </div>
            <div class="game-container">
                <?php
                error_reporting(0); 
                if ($_GET['content'] == 'gatherChop') {include 'content/gather/gatherChop.php';} 
                if ($_GET['content'] == 'gatherMine') {include 'content/gather/gatherMine.php';}
                if ($_GET['content'] == 'gatherFish') {include 'content/gather/gatherFish.php';}
                if ($_GET['content'] == 'fight') {include 'content/fight/fight.php';}
                
                ?> 
            </div>
            <div class="inventory-container">

            </div>
            <div class="inventory-container">

            </div>
            <div class="commands-container">
                <?php 
                error_reporting(0); 
                if (!$_GET['content']) {include 'content/commands.php';}
                if ($_GET['content'] == 'gather' || $_GET['content'] == 'gatherChop' || $_GET['content'] == 'gatherMine' || $_GET['content'] == 'gatherFish') {include 'content/gather/gather.php';}  
                if ($_GET['content'] == 'fight' && $GLOBALS["userinfo"]["selected_enemy"] == "None") {?>
                    <form method="POST" action="?content=fight&Fight=true"> 
                        <input type="submit" value="Yes"/>  
                    </form>
                    <form method="POST" action="?content=fight&Fight=false">  
                        <input type="submit" value="No"/>  
                    </form>
                <?php }
                if ($_GET['content'] == 'fight' && $GLOBALS["userinfo"]["selected_enemy"] != "None") {
                    foreach ($GLOBALS["userinfo"]["skills_learned"] as $skill)
                    {?>
                    <form method="POST" action="?content=fight&Fight=true&<?php echo $skill ?>">
                        <input type="submit" value="<?php echo $skill ?>"/>  
                    </form>
                <?php }
                }
                if ($_GET['content']) {?>
                    <form method="POST" action="<?php echo $base_url; ?>/game.php">
                        <input type="submit" value="Back"/>  
                    </form><?php }
                ?> 
            </div>
        </section>
    </main> 
</body>
<?php
    include_once 'footer.php';
    ?>