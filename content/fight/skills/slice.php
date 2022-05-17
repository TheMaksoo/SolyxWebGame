<?php 
$userinfo["Buff1"] = "Slice";
$userinfo["Buff1Time"] = 2;
$youdmg += rand(($youdmg / 100) * 30);
$bleeding = rand(($enemyhp / 100) * 25);
$userinfo["SkillCooldown2"] = 4;
$list .= getAttack(["You slice your weapon and cut open " . $enemyname . "'s leg.\nCausing bleeding effect for 2 turns dealing " . $bleeding . " damage.\nYou deal " . $youdmg . " damage.", "You slice their artery.\nCausing an internal bleeding for " . $bleeding . " damage.\nYou deal " . $youdmg . " damage.", "**You slice the enemy in the neck rupturing their artery.\nCausing bleeding for 2 turns dealing " . $bleeding . " damage\nYou deal " . $youdmg . " damage."]);

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>