<?php 
$GLOBALS["userinfo"]["SkillCooldown1"] = 3;
if ($GLOBALS["userinfo"]["Buff1"] == "Warp"){
    $enemydmg = round(($enemydmg / 100) * 60);
    $UserCombatSkill .= "Distort makes enemy's deal 50% less damage.<br>" . $enemyname . " tries to fight but their attacks are still warped.<br>";
    $UserCombatDamage .= "They deal less damage, Distort had no effect.<br>Your attack deals " . $youdmg . " damage.";
}
else{
    $enemydmg = round(($enemydmg / 100) * 50);
    $UserCombatSkill .= "Distort makes enemy's deal 50% less damage.<br>" . $enemyname . " tries to fight but their attacks are distorded.<br>";
    $UserCombatDamage .= "Their attack scrapes you for " . $enemydmg . " damage.<br>Your attack deals " . $youdmg . " damage.";
}

?>
