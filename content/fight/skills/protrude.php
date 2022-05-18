<?php 
$youdmg = round(($youdmg / 100) * 140);
$combo = randchoice(["You hit the enemy on a critical spot.", "You stab the enemy on a critical spot.", "You pierce the enemy on a critical spot."]);
$GLOBALS["userinfo"]["SkillCooldown1"] = 3;
if ($GLOBALS["userinfo"]["Buff1"] == "Slice"){
	$bleeding = round(($enemyhp / 100) * 25);
	$list .= $enemyname . " is still bleeding and losing health.<br>Taking " . $bleeding . " bleeding damage<br>" . $combo . "<br> Dealing" . $youdmg . " damage.";
}
else{
	$list .= $combo . "<br> dealing ". $youdmg . " damage";
}

?>
