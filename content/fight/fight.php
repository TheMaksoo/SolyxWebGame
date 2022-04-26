<?php
    require $_SERVER['DOCUMENT_ROOT'] .'/solyx/backend/fightFunctions.php';
    $filter = "None"
    if  ($_GET['Fight'] == 'false'){
        if ($GLOBALS["userinfo"]["selected_enemy"] == "None")
        {   

            $debi = getEnemy();
            $_SESSION['debi'] = $debi;
            $debi = getDebiName($debi);
            $difficulty = getDifficulty();
            $enemyName = $difficulty . " " . $debi;
            $bossImage = getBossImage($debi);
        }
    }   
    if  ($_GET['Fight'] == 'true'){
        if ($GLOBALS["userinfo"]["selected_enemy"] == "None")
        {
            addEnemyToUser();
            updateUserinfo($filter);
            $_SESSION['debi'] = "None";
        }
        $enemyinfo = getEnemyinfo();
        $enemyattack = $enemyinfo[0];
        $enemydmg = $enemyinfo[1];
        $enemyname = $GLOBALS["userinfo"]["selected_enemy"];
        $enemyhp = $GLOBALS["userinfo"]["enemyhp"];
        $skill = $_GET['skill'];
        $move = getmove($skill);
        $youdmg = getYouDmg();
        $youdef = getYouDef();
        $enemygold = $enemyinfo[2];
        $goldlost = $enemyinfo[3];
        $xpgain = $enemyinfo[4];
        $bossImage = "http://localhost/solyx" . $enemyinfo[5];
        
        $username = $GLOBALS["userinfo"]["name"];
        $userhealth = $GLOBALS["userinfo"]["health"];
        $totaldmg = 0;
		$bleeding = 0;
		$reap = 0;
		$overloadselfdmg = 0;

        $userhealth = $userhealth - $enemydmg - $overloadselfdmg;
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
            deadCheck($enemyhp, $enemygold ,$userhealth, $goldlost, $xpgain);
        }
           
        
        
    }
?>  

<!DOCTYPE html>
<html>  
    <body>
        <?php if ($_GET['Fight'] == 'false'){?>
            <h1>You wandered around <?php echo $GLOBALS["userinfo"]["location"]?> and found <br> <?php echo $enemyName ?></h1>
            <img src="<?php print_r($bossImage) ?>"/>
            <p>Would you like to fight it?</p>
        <?php } elseif ($_GET['Fight'] == 'true'){ ?>
            <p><?php include 'skills/' . $skill . '.php'; } ?></p>
            
        <?php if (!$_GET['skill']){?>
            <h1> Name: <?php echo $GLOBALS["userinfo"]["selected_enemy"];  ?><br>HP: <?php echo $GLOBALS["userinfo"]["enemyhp"];}?></h1>
            <img src="<?php print_r($bossImage) ?>" class="bossimg";/>
    </body>
</html>    
