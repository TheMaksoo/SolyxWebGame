<?php 
$youdmg = round(($youdmg / 100) * 150);
$enemydmg = 0;
$GLOBALS["userinfo"]["SkillCooldown2"] = 4;
$list .= randchoice(["You come out the shadows and surprise " . $enemyname . ".<br>You deal a critical strike to them!<br>You deal " . $youdmg . " damage.", "You ambush " . $enemyname . " and attack them with a critical hit!<br>You deal " . $youdmg . " damage.", "You emerge from the darkness.<br> Taking the enemy by surprise and dealing a critical hit.<br>You deal " . $youdmg . " damage."]);
?>
