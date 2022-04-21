<?php
    $fish = getFish();

    $currTime = time();
    $delta = $currTime - $GLOBALS["userinfo"]["online"];

    $cooldownTime = 5;

    if ($GLOBALS["userinfo"]["role"] == "patreon3"){
        $cooldownTime = 4;
    }
    if ($GLOBALS["userinfo"]["role"] == "patreon4"){
        $cooldownTime = 3;
    }

    if ($delta >= $cooldownTime && $delta > 0){
        $fished = true;
        $fishValue = $fish[1];

        $GLOBALS["userinfo"]["gold"] += $fishValue;
        $GLOBALS["userinfo"]["online"] = $currTime;
        updateUserinfo();
    }
    else { 
        $fished = false;
        $remainingTime = getRemainingTime($delta, $cooldownTime);

    }
    $text = getFishGold($fishValue);
?>  

<!DOCTYPE html>
<html>
    <body>
        <?php if ($fished == true){?>
            <p>You fished up a! <?php print_r($fish[0]) ?></p>
            <p><?php print_r($text); ?> Gold.</p>
            <p> Your gold:<?php print_r($GLOBALS["userinfo"]["gold"])?><p>
        <?php } else { ?>
            <p>You can't fish yet wait: <?php echo $remainingTime[3] . " Minutes and " . $remainingTime[4] . " Seconds."?></p>
        <?php }?>
    </body>
</html> 