<?php 
$GLOBALS["userinfo"]["Buff1"] = "Slice";
$GLOBALS["userinfo"]["Buff1Time"] = 2;
$youdmg += round(($youdmg / 100) * 30);
$bleeding = round(($enemyhp / 100) * 25);
$GLOBALS["userinfo"]["SkillCooldown2"] = 4;
$list .= randchoice(["You slice your weapon and cut open " . $enemyname . "'s leg.<br>Causing bleeding effect for 2 turns dealing " . $bleeding . " damage.<br>You deal " . $youdmg . " damage.", "You slice their artery.<br>Causing an internal bleeding for " . $bleeding . " damage.<br>You deal " . $youdmg . " damage.", "**You slice the enemy in the neck rupturing their artery.<br>Causing bleeding for 2 turns dealing " . $bleeding . " damage<br>You deal " . $youdmg . " damage."]);

?>
