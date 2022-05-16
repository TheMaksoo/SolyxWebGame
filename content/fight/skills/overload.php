<?php 
if ($userinfo["Buff1"] == "Surge"){
    $list += "**you have been stunned for 1 turn**";
}
else{
    $overloaddmg = rand(($youdmg / 100) * 40);
    $overloadselfdmg = rand(($overloaddmg / 100) * 50);
    $youdmg += $overloaddmg;
    $userinfo["SkillCooldown1"] = 2;
    $attacks = [$username . " overloads " . $enemyname . " for " . $youdmg . " damage\nBut also deals 50% self damage", $username . " overloads " . $enemyname . " for " . $youdmg . " damage\nBut also deals " . $overloadselfdmg . " self damage", "you overload yourself increasing your damage to " . $youdmg . " damage total but end up hurting yourself for " . $overloadselfdmg . " hp."];
    $num = array_rand($attacks);
    $list += $attacks[$num];
}
?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>