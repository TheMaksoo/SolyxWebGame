<?php 
$hit = rand(($youdmg / 100) * 25);
$userinfo["Buff1"] = "Arise";
$userinfo["Buff1Time"] = 2;
$userinfo["SkillCooldown2"] = 8;
$totaldmg = $hit * 5;
$list .= getAttack(["You focus all your power and raise a few skeletons to do your fighting.\nThey each deal ". $hit . " damage for a total of ". $totaldmg . "  damage.", "You raise a group of skeletons that will fight for you.\nthey all hit ". $enemyname . " for ". $totaldmg . " total damage.", "You raise a small army of skeletons to do your bidding.\n you command them to attack the enemy.\nthey each hit for ". $hit . " and a total of ". $totaldmg . " damage."]);

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>