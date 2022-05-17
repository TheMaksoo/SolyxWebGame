<?php 
$youdmg = rand(($youdmg / 100) * 150);
$enemydmg = 0;
$userinfo["SkillCooldown2"] = 4;
$list .= getAttack(["You come out the shadows and surprise " . $enemyname . ".\nYou deal a critical strike to them!\nYou deal " . $youdmg . " damage.", "You ambush " . $enemyname . " and attack them with a critical hit!\nYou deal " . $youdmg . " damage.", "You emerge from the darkness.\n Taking the enemy by surprise and dealing a critical hit.\nYou deal " . $youdmg . " damage.**"]);
?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>