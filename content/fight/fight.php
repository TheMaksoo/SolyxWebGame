<?php
    require $_SERVER['DOCUMENT_ROOT'] .'/solyx/backend/fightFunctions.php';
    
    if ($_GET['Fight'] == 'false'){
        if ($GLOBALS["userinfo"]["selected_enemy"] == "None")
        {   
            
            $debi = getEnemy();
            $_SESSION['debi'] = $debi;
            $bossImage = $base_url . getBossImage($debi);
            $debiname = getDebiName($debi);
            $difficulty = getDifficulty();
            $enemyName = $difficulty . " " . $debiname;
            
        }
    }   
    if  ($_GET['Fight'] == 'true'){
        if ($GLOBALS["userinfo"]["selected_enemy"] == "None")
        {
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
        $UserCombatSkill = "";
        $UserCombatDamage = "";
        $EnemyEndHp = "";
        $UserEndHp = "";

        if (isset($_GET['skill']))
        {
            $skill = $_GET['skill'];
            $youdmg = getYouDmg();
            $youdef = getYouDef();
            $enemydmg -= $youdef;
            if ($enemydmg < 0){
                $enemydmg = 0;
            }
            $enemygold = $enemyinfo[2];
            $goldlost = $enemyinfo[3];
            $xpgain = $enemyinfo[4];
            $userhealth = $userhealthstart - $enemydmg;
            
            $enemyhp = $enemyhpstart - $youdmg;
            if ($userhealth >= $GLOBALS["userinfo"]["MaxHealth"]){
                $userhealth = $GLOBALS["userinfo"]["MaxHealth"];}
            if ($enemyhp < 0){
                $enemyhp = 0;}
            if ($userhealth < 0){
                $userhealth = 0;}
    
            if ($userhealth >= $GLOBALS["userinfo"]["MaxHealth"]){
                $userhealth = $GLOBALS["userinfo"]["MaxHealth"];
               
            }
            
            if ($skill != "heal"){
                // starting hp of the enemy and user
                $EnemyHp = "" . $enemyname ." has " . round($enemyhpstart) . " HP";
                $UserHp = "" . $username . " has " . round($userhealthstart) . " HP";
                // check if enemy is stun
                if ($GLOBALS["userinfo"]["EnemyStun"] > 0){
                    $enemydmg = 0;
                    // add enemy stun text
                    $EnemyCombatSkill = "" . $enemyname . " is stunned and can't fight.";
                    $EnemyCombatDamage = "";
                }
                else{
                    // add enemy attack text
                    $EnemyCombatSkill = "" . $enemyname . " uses  " . $enemyattack;
                    $EnemyCombatDamage = " hits " . $username. " for " . $enemydmg. " damage.";
                }   
            }
            // get the skill file
            include 'skills/' . $skill . '.php';
            
            // end with hp checks
            if ($skill != "heal"){
                $EnemyEndHp = "" . $enemyname . " has " . round($enemyhp) . " HP";
                $UserEndHp = "" . $username . " has " . $userhealth . " HP"; 
                
                if ($enemyhp <= 0 || $userhealth <= 0){
                    $EnemyHp .= deadCheck($enemyhp, $enemygold ,$userhealth, $goldlost, $xpgain);
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
        <div class="animated fadeInUp">
            <?php if ($_GET['Fight'] == 'false'){?>
                <h2 class="animated fadeInUp">You wandered around <?php echo $GLOBALS["userinfo"]["location"]?> and found <br> <?php echo $enemyName ?></h2>
                <?php if ($bossImage != $base_url){ ?>
                <h2 class="animated fadeInUp"><img src="<?php print_r($bossImage) ?> " class="bossimg"/></h2>
                <?php } ?>
                <h2 class="animated fadeInUp"><br>Would you like to fight it?</h2>
            <?php } elseif ($_GET['Fight'] == 'true'){ ?>
                <?php if (isset($_GET['skill'])){?>
                    <h2 class="animated fadeInUp"><?php print_r($EnemyHp) ?></h2>
                    <h2 class="animated fadeInUp"style="border-bottom: 2px solid #AAAAAA"><?php print_r($UserHp) ?><br><br></h2>
                    <h2 class="animated fadeInUp"><?php print_r($EnemyCombatSkill) ?></h2>
                    <h2 class="animated fadeInUp"style="border-bottom: 2px solid #AAAAAA"><?php print_r($EnemyCombatDamage) ?><br><br></h2>
                    <h2 class="animated fadeInUp"><?php print_r($UserCombatSkill) ?></h2>
                    <h2 class="animated fadeInUp"style="border-bottom: 2px solid #AAAAAA"><?php print_r($UserCombatDamage) ?><br><br></h2>
                    <h2 class="animated fadeInUp"><?php print_r($EnemyEndHp) ?></h2>
                    <h2 class="animated fadeInUp"><?php print_r($UserEndHp) ?></h2>     
                <?php } ?>
                
            <?php if (!isset($_GET['skill'])) {?>
                <h2 class="animated fadeInUp"> Name: <?php echo $GLOBALS["userinfo"]["selected_enemy"];  ?></h2>
                <h2 class="animated fadeInUp">HP: <?php echo $GLOBALS["userinfo"]["enemyhp"];?></h2>
                <?php if ($bossImage != $base_url){ ?>
                <h2 class="animated fadeInUp"><img src="<?php print_r($bossImage) ?> " class="bossimg"/></h2>
                <?php } ?>
                <h2 class="animated fadeInUp">Choose your skill.</h2>
            <?php }} ?>
        </div>
    </body>
</html> 

