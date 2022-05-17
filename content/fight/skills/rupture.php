<?php 
$userinfo["Buff1"] = "Rupture";
$userinfo["Buff1Time"] = 2;
$bleeding = rand(($enemyhp / 100) * 25);
$userinfo["SkillCooldown2"] = 4;
$list .= getAttack(["You slice your weapon and rupture " . $enemyname . "'s artery.\nCausing bleeding effect for 2 turns dealing " . $bleeding . " damage.\nYou deal " . $youdmg . " damage.", "You hit the enemy with a blunt force rupturing an artery.\nCausing an internal bleeding for " . $bleeding . " damage.\nYou deal " . $youdmg . " damage.", "You stab the enemy in the neck rupturing their artery.\nCausing bleeding for 2 turns dealing " . $bleeding . " damage\nYou deal " . $youdmg ." damage.**"])
?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>