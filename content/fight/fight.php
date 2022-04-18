<?php
    require $_SERVER['DOCUMENT_ROOT'] .'/solyx/backend/fightFunctions.php';
    
    if ($GLOBALS["userinfo"]["selected_enemy"] == "None")
    {
        $debi = getEnemy();
        $difficulty = getDifficulty();
        $enemyName = $difficulty . " " . $debi;
        $bossImage = getBossImage($debi);
    }
?>  

<!DOCTYPE html>
<html>
    <body>
        <?php if ($_GET['content'] == 'fight'){?>
            <h1>You wandered around <?php echo $GLOBALS["userinfo"]["location"]?> and found <br> <?php echo $enemyName ?></h1>
            <img src="<?php $bossImage ?>"/>
            <p>Would you like to fight it?</p>
            
        <?php }?>       
    </body>
</html>     