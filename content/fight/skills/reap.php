<?php 
$reap = rand(($enemyhp / 100) * 30);
$userinfo["SkillCooldown1"] = 3;
$list .= getAttack(["You reap 30% of " . $enemyname . "'s health and add it to your own health.\n healing for " . $reap . " hp.", "You reap " . $reap . " hp from the enemy to heal yourself."]);
if ($userinfo["Buff1"] == "Arise"){
    $hit = int(($youdmg / 100) * 25);
    $totaldmg = $hit * 5;
    $list .= "\nThe army of skeletons attacks.\nDealing " . $hit . " damage each\nDealing a total of " . $totaldmg . " damage.";
}
?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>