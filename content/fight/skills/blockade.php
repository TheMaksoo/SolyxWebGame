<?php 
$userinfo["Buff1"] = "Blockade";
$userinfo["Buff1Time"] = 2;
$youdmg = rand(($youdmg / 100) * 85);
$userinfo["SkillCooldown2"] = 6;
$list .= "You clash your shields together doubling defense.\nBut lowering the damage.\n". $username . " Dealing ". $youdmg . " damage.";

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>