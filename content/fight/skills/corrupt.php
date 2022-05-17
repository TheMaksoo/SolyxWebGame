<?php 
$userinfo["Buff1"] = "Corrupt";
$userinfo["Buff1Time"] = 2;
$userinfo["SkillCooldown1"] = 4	;
$youdmg = rand(($youdmg / 100) * 130);
$list .= getAttack(["You corrupt the enemies body making them more vulnerable\nYou deal " . $youdmg . " damage.", "You corrupt the enemy's mind, making them defend less against your attacks\nYou deal " . $youdmg . " damage.", "You corrupt the enemy's soul and they become more fragile \nYou deal " . $youdmg . " damage."]);

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>