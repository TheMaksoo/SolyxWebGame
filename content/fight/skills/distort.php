<?php 
$GLOBALS["userinfo"]["SkillCooldown1"] = 3;
if ($GLOBALS["userinfo"]["Buff1"] == "Warp"){
    $enemydmg = round(($enemydmg / 100) * 60);
    $list .= "Distort makes enemy's deal 50% less damage.<br>" . $enemyname . " tries to fight but their attacks are still warped.<br>They deal less damage, Distort had no effect.<br>Your attack deals " . $youdmg . " damage.";
}
else{
    $enemydmg = round(($enemydmg / 100) * 50);
    $list .= "Distort makes enemy's deal 50% less damage.<br>" . $enemyname . " tries to fight but their attacks are distorded.<br>Their attack scrapes you for " . $enemydmg . " damage.<br>Your attack deals " . $youdmg . " damage.";
}

?>
