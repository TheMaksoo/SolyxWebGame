<?php 
$GLOBALS["userinfo"]["Buff1"] = "Corrupt";
$GLOBALS["userinfo"]["Buff1Time"] = 2;
$GLOBALS["userinfo"]["SkillCooldown1"] = 4	;
$youdmg = round(($youdmg / 100) * 130);
$list .= randchoice(["You corrupt the enemies body making them more vulnerable.<br>You deal " . $youdmg . " damage.", "You corrupt the enemy's mind, making them defend less against your attacks.<br>You deal " . $youdmg . " damage.", "You corrupt the enemy's soul and they become more fragile.<br>You deal " . $youdmg . " damage."]);

?>
