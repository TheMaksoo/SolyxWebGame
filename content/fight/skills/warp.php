<?php 
$GLOBALS["userinfo"]["Buff1"] = "Warp";
$GLOBALS["userinfo"]["Buff1Time"] = 2;
$enemydmg = round(($enemydmg / 100) * 60);
$GLOBALS["userinfo"]["SkillCooldown2"] = 5;
$list .= randchoice(["You warp the enemies movement.<br>Making their attack hit you in the shoulder.<br>they deal " . $enemydmg . " damage.<br>You deal " . $youdmg . " damage.", "You warp the enemies attack.<br>their attack hits you in the leg.<br>they deal " . $enemydmg . " damage.<br>You deal " . $youdmg . " damage.", "You warp the enemies vision.<br>Making their attack hit you in foot.<br>they deal " . $enemydmg . " damage.<br>You deal " . $youdmg . " damage."])
?>
