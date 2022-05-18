<?php 
$GLOBALS["userinfo"]["Buff1"] = "Rupture";
$GLOBALS["userinfo"]["Buff1Time"] = 2;
$bleeding = round(($enemyhp / 100) * 25);
$GLOBALS["userinfo"]["SkillCooldown2"] = 4;
$list .= randchoice(["You slice your weapon and rupture " . $enemyname . "'s artery.<br>Causing bleeding effect for 2 turns dealing " . $bleeding . " damage.<br>You deal " . $youdmg . " damage.", "You hit the enemy with a blunt force rupturing an artery.<br>Causing an internal bleeding for " . $bleeding . " damage.<br>You deal " . $youdmg . " damage.", "You stab the enemy in the neck rupturing their artery.<br>Causing bleeding for 2 turns dealing " . $bleeding . " damage<br>You deal " . $youdmg ." damage."])
?>
