<?php
    require $_SERVER['DOCUMENT_ROOT'] .'/solyx/backend/fightFunctions.php';
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
    if  ($_GET['Fight'] == 'false'){
        if ($GLOBALS["userinfo"]["selected_enemy"] == "None")
        {
            addEnemyToUser();
            updateUserinfo($GLOBALS["userinfo"]);
            $_SESSION['debi'] = "None";
        }

    }
?>  

<!DOCTYPE html>
<html>  
    <body>
        <?php if ($_GET['Fight'] == 'false'){?>
            <h1>You wandered around <?php echo $GLOBALS["userinfo"]["location"]?> and found <br> <?php echo $enemyName ?></h1>
            <img src="<?php $bossImage ?>"/>
            <p>Would you like to fight it?</p>
        <?php } elseif ($_GET['Fight'] == 'true'){ ?>
            <h1> Name: <?php echo $GLOBALS["userinfo"]["selected_enemy"];  ?><br>HP: <?php echo $GLOBALS["userinfo"]["enemyhp"]?></h1>
        <?php }?>
    </body>
</html>     