<?php 
$move = randchoice(["You swing your weapon and hit a light blow.", "You strike a light blow."]);
if ($GLOBALS["userinfo"]["lvl"] >= 30){
    $move = randchoice(["You swing your weapon and hit a strong blow.", "You strike a strong blow."]);
}
if ($GLOBALS["userinfo"]["lvl"] >= 90){
    $move = randchoice(["You swing your weapon and hit a heavy blow.", "You strike a heavy blow."]);
}
if ($GLOBALS["userinfo"]["Buff1"] == "Blockade"){
    $youdmg = round(($youdmg / 100) * 85);
    $youdef = $youdef * 2;
    $UserCombatSkill = "" . $username . " has the blockade buff doubling defense.";
    $UserCombatDamage = "" . $move . " dealing " . $youdmg . " damage. ";
}

// Doesnt make sense.
elseif ($GLOBALS["userinfo"]["Buff1"] == "Slice"){
    $bleeding = round(($enemyhp / 100) * 25);
    $EnemyEffect = "" . $enemyname . " is still bleeding and losing health.";
    $UserCombatDamage = "Taking " . $bleeding . " bleeding damage<br>" . $move . " dealing " . $youdmg . " damage.";
}
else{
	$UserCombatSkill = $move;
    $UserCombatDamage = "Dealing ". $youdmg . " damage.";
}
?>
