<?php 
if ($GLOBALS["userinfo"]["Buff1"] == "Surge"){
    $list .= "**you have been stunned for 1 turn**";
}
else{
    $overloaddmg = round(($youdmg / 100) * 40);
    $overloadselfdmg = round(($overloaddmg / 100) * 50);
    $youdmg += $overloaddmg;
    $GLOBALS["userinfo"]["SkillCooldown1"] = 2;
    $list .= randchoice([$username . " overloads " . $enemyname . " for " . $youdmg . " damage`.<br>But also deals 50% self damage.", $username . " overloads " . $enemyname . " for " . $youdmg . " damage.<br>But also deals " . $overloadselfdmg . " self damage.", "You overload yourself increasing your damage to " . $youdmg . " damage total but end up hurting yourself for " . $overloadselfdmg . " hp."]);
}
$userhealth -= $overloadselfdmg;
if ($userhealth < 0){
    $userhealth = 0;}
?>