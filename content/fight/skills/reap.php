<?php 
$reap = round(($enemyhpstart / 100) * 30);
$GLOBALS["userinfo"]["SkillCooldown1"] = 3;
$list .= randchoice(["You reap 30% of " . $enemyname . "'s health and add it to your own health.<br> healing for " . $reap . " hp.", "You reap " . $reap . " hp from the enemy to heal yourself."]);
if ($GLOBALS["userinfo"]["Buff1"] == "Arise"){
    $hit = round(($youdmg / 100) * 25);
    $totaldmg = $hit * 5;
    $list .= "<br>The army of skeletons attacks.<br>Dealing " . $hit . " damage each.<br>With a total of " . $totaldmg . " damage.";
}

$userhealth += $reap;
$enemyhp -= $totaldmg;
if ($enemyhp < 0){
    $enemyhp = 0;
}
if ($userhealth >= $GLOBALS["userinfo"]["MaxHealth"]){
    $userhealth = $GLOBALS["userinfo"]["MaxHealth"];
}
?>
