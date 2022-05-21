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
        $list = "";
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
                $list .= $enemyname ." has " . round($enemyhpstart) . " HP<br>" . $username . " has " . $userhealthstart . " HP<br>";
                // check if enemy is stun
                if ($GLOBALS["userinfo"]["EnemyStun"] > 0){
                    $enemydmg = 0;
                    // add enemy stun text
                    $list .= "<br>" . $enemyname . " is stunned and can't fight.<br>"; 
                }
                else{
                    // add enemy attack text
                    $list .= "<br>" . $enemyname . " uses  " . $enemyattack. " hits " . $username. " for " . $enemydmg. " damage.<br>";
                }   
            }
            // get the skill file
            include 'skills/' . $skill . '.php';
            
            // end with hp checks
            if ($skill != "heal"){
                $list .= "<br><br>" . $enemyname . " has " . round($enemyhp) . " HP<br>" . $username . " has " . $userhealth . " HP<br><br>"; 
                
                if ($enemyhp <= 0 || $userhealth <= 0){
                    $list .= deadCheck($enemyhp, $enemygold ,$userhealth, $goldlost, $xpgain);
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
        <?php if ($_GET['Fight'] == 'false'){?>
            <h1>You wandered around <?php echo $GLOBALS["userinfo"]["location"]?> and found <br> <?php echo $enemyName ?></h1>
            <?php if ($bossImage != $base_url){ ?>
            <img src="<?php print_r($bossImage) ?> " class="bossimg"/>
            <?php } ?>
            <h1><br>Would you like to fight it?</h1>
        <?php } elseif ($_GET['Fight'] == 'true'){ ?>
            <?php if (isset($_GET['skill'])){?>
                <h1><?php print_r($list) ?></h1>              
            <?php } ?>
            
        <?php if (!isset($_GET['skill'])) {?>
            <h1> Name: <?php echo $GLOBALS["userinfo"]["selected_enemy"];  ?><br>HP: <?php echo $GLOBALS["userinfo"]["enemyhp"];?></h1>
            <?php if ($bossImage != $base_url){ ?>
            <img src="<?php print_r($bossImage) ?> " class="bossimg"/>
            <?php } ?>
            <h1>Choose your skill.</h1>
        <?php }} ?>
    </body>
</html>    
