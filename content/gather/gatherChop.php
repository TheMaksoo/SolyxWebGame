<?php

    $currTime = time();
    $delta = $currTime - $GLOBALS["userinfo"]["chop_block"];


    $cooldownTime = 600;
    

    if ($GLOBALS["userinfo"]["role"] == "patreon3"){
        $cooldownTime = 480;
    }
    if ($GLOBALS["userinfo"]["role"] == "patreon4"){
        $cooldownTime = 300;
    }

    if ($delta >= $cooldownTime && $delta > 0){
    $chop = true;
    $choppedMin = 3 +  $GLOBALS["userinfo"]["axelvl"];
    $choppedMax = 7 +  $GLOBALS["userinfo"]["axelvl"];

    $chopped = rand($choppedMin,$choppedMax );
    $GLOBALS["userinfo"]["wood"] += $chopped;
    $GLOBALS["userinfo"]["chop_block"] = $currTime;
    updateUserinfo();
    }
    else { 
        $chop = false;
        $remainingTime = getRemainingTime($delta, $cooldownTime);

    }
    
?>  

<!DOCTYPE html>
<html>
    <body>
        <?php if ($chop == true){?>
            <p>You chopped a tree!</p>
            <p>+<?php print_r($chopped) ?> Wood.</p>
            <p> Your wood:<?php print_r($GLOBALS["userinfo"]["wood"])?><p>
        <?php } else { ?>
            <p>You can't chop yet wait: <?php echo $remainingTime[3] . " Minutes and " . $remainingTime[4] . " Seconds."?></p>
        <?php }?>
    </body>
</html> 