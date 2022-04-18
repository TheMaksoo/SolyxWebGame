<?php

    $currTime = time();
    $delta = $currTime - $GLOBALS["userinfo"]["mine_block"];


    $cooldownTime = 600;
    

    if ($GLOBALS["userinfo"]["role"] == "patreon3"){
        $cooldownTime = 480;
    }
    if ($GLOBALS["userinfo"]["role"] == "patreon4"){
        $cooldownTime = 300;
    }

    if ($delta >= $cooldownTime && $delta > 0){
    $mine = true;
    $stoneMin = 2 + $GLOBALS["userinfo"]["pickaxelvl"];
    $stoneMax = 5 + $GLOBALS["userinfo"]["pickaxelvl"];
    $metalMin = 1 + $GLOBALS["userinfo"]["pickaxelvl"];
    $metalMax = 3 + $GLOBALS["userinfo"]["pickaxelvl"];

    $stoneMined = rand($stoneMin,$stoneMax );
    $metalMined = rand($metalMin,$metalMax );
    $GLOBALS["userinfo"]["stone"] += $stoneMined;
    $GLOBALS["userinfo"]["metal"] += $metalMined;
    $GLOBALS["userinfo"]["mine_block"] = $currTime;
    updateUserinfo($GLOBALS["userinfo"]);
    }
    else { 
        $chop = false;
        $remainingTime = getRemainingTime($delta, $cooldownTime);

    }
    
?>  

<!DOCTYPE html>
<html>
    <body>
        <?php if ($mine == true){?>
            <p>You mined some rocks!</p>
            <p>+<?php print_r($stoneMined) ?> Stone and +<?php print_r($metalMined) ?> Metal!</p>
            <p> Your stone:<?php print_r($GLOBALS["userinfo"]["stone"])?><p>
            <p> Your metal:<?php print_r($GLOBALS["userinfo"]["metal"])?><p>
        <?php } else { ?>
            <p>You can't mine yet wait: <?php echo $remainingTime[3] . " Minutes and " . $remainingTime[4] . " Seconds."?></p>
        <?php }?>
    </body>
</html> 