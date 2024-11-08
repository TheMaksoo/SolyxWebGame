<?php
require $_SERVER['DOCUMENT_ROOT'] . '/solyx/backend/fightFunctions.php';

if ($_GET['Fight'] == 'false') {
    if ($GLOBALS["userinfo"]["selected_enemy"] == "None") {

        $debi = getEnemy();
        $_SESSION['debi'] = $debi;
        $bossImage = $base_url . getBossImage($debi);
        $debiname = getDebiName($debi);
        $difficulty = getDifficulty();
        $enemyName = $difficulty . " " . $debiname;
    }
}
if ($_GET['Fight'] == 'true') {
    if ($GLOBALS["userinfo"]["selected_enemy"] == "None") {
        $filter = "None";
        addEnemyToUser();
        updateUserinfo($filter);
    }
    $enemyinfo = getEnemyinfo();
    $enemyattack = $enemyinfo[0];
    $enemydmg = $enemyinfo[1];
    $enemyname = $GLOBALS["userinfo"]["selected_enemy"];
    $enemyhpstart = $GLOBALS["userinfo"]["enemyhp"];
    $bossImage = $base_url . getBossImage($_SESSION['debi']);
    $username = $GLOBALS["userinfo"]["name"];
    $userhealthstart = $GLOBALS["userinfo"]["health"];
    $totaldmg = 0;
    $bleeding = 0;
    $reap = 0;
    $overloadselfdmg = 0;
    $EnemyHp = "";
    $UserHp = "";
    $EnemyCombatSkill = "";
    $EnemyCombatDamage = "";
    $EnemyEffect = "";
    $UserCombatSkill = "";
    $UserCombatDamage = "";
    $EnemyEndHp = "";
    $UserEndHp = "";
    if (isset($_GET['skill'])) {
        $skill = $_GET['skill'];
        $youdmg = getYouDmg();
        $youdef = getYouDef();
        $enemydmg -= $youdef;
        if ($enemydmg < 0) {
            $enemydmg = 0;
        }
        $enemygold = $enemyinfo[2];
        $goldlost = $enemyinfo[3];
        $xpgain = $enemyinfo[4];
        $userhealth = $userhealthstart - $enemydmg;
        $enemyhp = $enemyhpstart - $youdmg;

        if ($userhealth >= $GLOBALS["userinfo"]["MaxHealth"]) {
            $userhealth = $GLOBALS["userinfo"]["MaxHealth"];
        }
        if ($enemyhp < 0) {
            $enemyhp = 0;
        }
        if ($userhealth < 0) {
            $userhealth = 0;
        }

        if ($userhealth >= $GLOBALS["userinfo"]["MaxHealth"]) {
            $userhealth = $GLOBALS["userinfo"]["MaxHealth"];
        }

        if ($skill != "heal") {
            // starting hp of the enemy and user
            $EnemyHp = "" . $enemyname . " has " . round($enemyhpstart) . " ";
            $UserHp = "You have " . round($userhealthstart) . " ";
            // check if enemy is stun
            if ($GLOBALS["userinfo"]["EnemyStun"] > 0) {
                $enemydmg = 0;
                // add enemy stun text
                $EnemyCombatSkill = "" . $enemyname . " is stunned and can't fight.";
                $EnemyCombatDamage = "";
            } else {
                // add enemy attack text
                $EnemyCombatSkill = "" . $enemyname . " uses  " . $enemyattack;
                $EnemyCombatDamage = " hits you for " . $enemydmg . " damage.";
            }
        }
        // get the skill file
        include 'skills/' . $skill . '.php';

        // Calculate end stats
        $GLOBALS["userinfo"]["enemyhp"] = $enemyhp;
        $GLOBALS["userinfo"]["health"] = $userhealth;
        // end with hp checks
        if ($skill != "heal") {
            $EnemyEndHp = "" . $enemyname . " has " . round($enemyhp) . " ";
            $UserEndHp = "You have " . $userhealth . " ";

            if ($enemyhp <= 0 || $userhealth <= 0) {
                $reward = deadCheck($enemyhp, $enemygold, $userhealth, $goldlost, $xpgain);
                $isded = 1;
            }
            everyTurn();
        }
        $filter = "None";
        updateUserinfo($filter);
    }
}
?>

<!DOCTYPE html>
<html>

<body>  
    
        <?php if ($_GET['Fight'] == 'false') { ?>
            <div class="fightbg">
                <h2 class="animated fadeInUp">You wandered around <?php print_r($GLOBALS["userinfo"]["location"]) ?> and found <br> <?php echo $enemyName ?></h2>
                <?php if ($bossImage != $base_url) { ?>
                    <h2 class="animated fadeInUp"><img src="<?php print_r($bossImage) ?> " class="bossimg" /></h2>
                <?php } ?>
                <h2 class="animated fadeInUp"><br><img src='img\icons\Sword.webp' class='game-icons'>Would you like to fight it?<img src='img\icons\SwordReverse.webp' class='game-icons'></h2>
            </div>
        <?php }
        
        if ($_GET['Fight'] == 'true') {
            if (isset($_GET['skill'])) {
                if ($isded == 1) { ?>
                    <div class="fightbg">
                        <h2 class="animated fadeInUp"><?php print_r($EnemyHp); ?><img src='img\icons\Health.webp' class='game-icons'></h2>
                        <h2 class="animated fadeInUp"><?php print_r($UserHp) ?><img src='img\icons\Health.webp' class='game-icons'></h2>
                        <h2 class="animated fadeInUp" style="border-bottom: 2px solid #AAAAAA"></h2>
                        <h2 class="animated fadeInUp"><?php print_r($EnemyCombatSkill) ?></h2>
                        <h2 class="animated fadeInUp"><?php print_r($EnemyCombatDamage) ?></h2>
                        <h2 class="animated fadeInUp"><?php print_r($EnemyEffect) ?></h2>
                        <h2 class="animated fadeInUp" style="border-bottom: 2px solid #AAAAAA"></h2>
                        <h2 class="animated fadeInUp"><?php print_r($UserCombatSkill) ?></h2>
                        <h2 class="animated fadeInUp"><?php print_r($UserCombatDamage) ?></h2>
                        <h2 class="animated fadeInUp" style="border-bottom: 2px solid #AAAAAA"></h2>
                        <h2 class="animated fadeInUp"><?php print_r($EnemyEndHp) ?><img src='img\icons\Health.webp' class='game-icons'></h2>
                        <h2 class="animated fadeInUp"><?php print_r($UserEndHp) ?><img src='img\icons\Health.webp' class='game-icons'></h2>
                        <h2 class="animated fadeInUp" style="border-bottom: 2px solid #AAAAAA"></h2>
                        <h2></h2>
                        <?php if ($reward["death"] != "") { ?>
                            <h2 class="animated fadeInUp"><?php print_r($reward["death"]); ?><img src='img\icons\Sword.webp' class='game-icons'></h2>
                        <?php }
                            if ($reward["userdeath"] != "") { ?>
                            <h2 class="animated fadeInUp"><?php print_r($reward["userdeath"]); ?><img src='img\icons\Sword.webp' class='game-icons'></h2>
                        <?php } ?>
                        <h2 class="animated fadeInUp"><?php print_r($reward["kill"]); ?><img src='img\icons\Sword.webp' class='game-icons'></h2>
                        <h2 class="animated fadeInUp" style="border-bottom: 2px solid #AAAAAA"></h2>
                        <h2 class="animated fadeInUp"><?php print_r($reward["gold"]); ?><img src='img\icons\recources\Gold.webp' class='game-icons'></h2>
                        <?php if ($reward["goose"] != "") { ?>
                            <h2 class="animated fadeInUp"><?php print_r($reward["goose"]); ?><img src='img\icons\recources\Gold.webp' class='game-icons'></h2>
                        <?php } ?>
                        <h2 class="animated fadeInUp" style="border-bottom: 2px solid #AAAAAA"></h2>
                        <h2 class="animated fadeInUp"><?php print_r($reward["exp"]) ?><img src='img\icons\Exp.webp' class='game-icons'></h2>
                        <?php if ($reward["pterodactyl"] != "") { ?>
                            <h2 class="animated fadeInUp"><?php print_r($reward["pterodactyl"]) ?><img src='img\icons\Exp.webp' class='game-icons'></h2>
                        <?php } ?>
                        <h2 class="animated fadeInUp" style="border-bottom: 2px solid #AAAAAA"></h2>
                        <h2 class="animated fadeInUp"><?php print_r($reward["lootbag"]) ?></h2>
                        <?php if ($reward["fox"] != "") { ?>
                            <h2 class="animated fadeInUp"><?php print_r($reward["fox"]) ?><img src='img\icons\Lootbag.webp' class='game-icons'></h2>
                        <?php }
                            if ($reward["newpet"] != "") { ?>
                            <h2 class="animated fadeInUp" style="border-bottom: 2px solid #AAAAAA"></h2>
                            <h2 class="animated fadeInUp"><?php print_r($reward["newpet"]) ?></h2>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div>
                        <h2 class="animated fadeInUp"><?php print_r($EnemyHp) ?></h2>
                        <h2 class="animated fadeInUp"><?php print_r($UserHp) ?></h2>
                        <h2 class="animated fadeInUp" style="border-bottom: 2px solid #AAAAAA"></h2>
                        <h2 class="animated fadeInUp"><?php print_r($EnemyCombatSkill) ?></h2>
                        <h2 class="animated fadeInUp"><?php print_r($EnemyCombatDamage) ?></h2>
                        <h2 class="animated fadeInUp" style="border-bottom: 2px solid #AAAAAA"></h2>
                        <h2 class="animated fadeInUp"><?php print_r($UserCombatSkill) ?></h2>
                        <h2 class="animated fadeInUp"><?php print_r($UserCombatDamage) ?></h2>
                        <h2 class="animated fadeInUp" style="border-bottom: 2px solid #AAAAAA"></h2>
                        <h2 class="animated fadeInUp"><?php print_r($EnemyEndHp) ?></h2>
                        <h2 class="animated fadeInUp"><?php print_r($UserEndHp) ?></h2>
                    </div>
                <?php }
            } ?>

            <?php if (!isset($_GET['skill'])) { ?>
                <div class="fightbg">
                    <h2 class="animated fadeInUp"> Name: <?php print_r($GLOBALS["userinfo"]["selected_enemy"]);  ?></h2>
                    <h2 class="animated fadeInUp">HP: <?php print_r(round($GLOBALS["userinfo"]["enemyhp"])); ?></h2>
                    <?php if ($bossImage != $base_url) { ?>
                        <h2 class="animated fadeInUp"><img src="<?php print_r($bossImage) ?> " class="bossimg" /></h2>
                    <?php } ?>
                    <h2 class="animated fadeInUp">Choose your skill.</h2>
                </div>
            <?php }
        } ?>
</body>

</html>