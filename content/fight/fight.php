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
        $enemyhp = $GLOBALS["userinfo"]["enemyhp"];
        $bossImage = $base_url . getBossImage($_SESSION['debi']);
        $username = $GLOBALS["userinfo"]["name"];
        $userhealthstart = $GLOBALS["userinfo"]["health"];
        $totaldmg = 0;
		$bleeding = 0;
		$reap = 0;
		$overloadselfdmg = 0;

        if (isset($_GET['skill']))
        {
            $skill = $_GET['skill'];
            $move = getmove($skill);
            $youdmg = getYouDmg();
            $youdef = getYouDef();
            $enemygold = $enemyinfo[2];
            $goldlost = $enemyinfo[3];
            $xpgain = $enemyinfo[4];
            $userhealth = $userhealthstart - $enemydmg - $overloadselfdmg;
            $userhealth += $reap;
            $enemyhp = $enemyhp - $youdmg - $totaldmg - $bleeding;
            if ($userhealth >= $userinfo["MaxHealth"]){
                $userhealth = $userinfo["MaxHealth"];}
            if ($enemyhp < 0){
                $enemyhp = 0;}
            if ($userhealth < 0){
                $userhealth = 0;}
    
            if ($userhealth >= $userinfo["MaxHealth"]){
                $userhealth = $userinfo["MaxHealth"];
                $GLOBALS["userinfo"]["EnemyStun"] -= 1;
            }
            everyTurn();
            
            if ($enemyhp <= 0 || $userhealth <= 0){
               $msg = deadCheck($enemyhp, $enemygold ,$userhealth, $goldlost, $xpgain);
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
            <h1><?php if (isset($_GET['skill'])){ 
                include 'skills/' . $skill . '.php';
                print_r($msg);
            } ?></h1>
            
        <?php if (!isset($_GET['skill'])) {?>
            <h1> Name: <?php echo $GLOBALS["userinfo"]["selected_enemy"];  ?><br>HP: <?php echo $GLOBALS["userinfo"]["enemyhp"];?></h1>
            <img src="<?php print_r($bossImage) ?>" class="bossimg";/>
            <h1>Choose your skill.</h1>
        <?php }} ?>
    </body>
</html>    
