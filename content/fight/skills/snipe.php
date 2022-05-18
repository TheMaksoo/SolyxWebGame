<?php 
$youdmg = round(($youdmg / 100) * 250);
$GLOBALS["userinfo"]["SkillCooldown2"] = 5;
$list .= randchoice(["You come out of the shadows and shoot your shot at " . $enemyname . ".<br>You land a headshot!<br>You deal " . $youdmg . " damage.", "You hide and snipe " . $enemyname . " BOOM! Headshot.<br>You deal " . $youdmg . " damage.", "You confuse the enemy and hit them from behind,<br>Lucky headshot!<br>You deal " . $youdmg . " damage."]);
?>
