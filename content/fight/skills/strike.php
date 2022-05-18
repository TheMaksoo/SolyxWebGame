<?php 
$youdmg = round(($youdmg / 100) * 50);
$GLOBALS["userinfo"]["EnemyStun"] = 3;
$GLOBALS["userinfo"]["SkillCooldown1"] = 6;
$list .= randchoice(["You strike a blunt blow to the head immobilizing the enemy for 2 turns,<br>but dealing less damage.<br>You deal " . $youdmg . " damage.", "You strike a heavy hit to the chest stunning the enemy for 2 turns.<br>You deal " . $youdmg . " damage.", "You strike a fierce blow to the knee making the enemy incapable of moving for 2 turns.<br>But dealing less damage.<br>You deal " . $youdmg . " damage."])

?>
