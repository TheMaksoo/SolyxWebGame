<?php 
$GLOBALS["userinfo"]["EnemyStun"] = 2;
$GLOBALS["userinfo"]["SkillCooldown1"] = 4;
$youdmg = 0;
$move = randchoice(["You parry " . $enemyname . "'s " . $enemyattack . " stun them", "You parry their attack and stun them", "You parry the attack and stun " . $enemyname]);

if ($GLOBALS["userinfo"]["Buff1"] == "Rupture"){
    $bleeding = round(($enemyhp / 100) * 25);
    $EnemyEffect .= $enemyname . " is still bleeding and losing health.<br>Taking " . $bleeding . " bleeding damage<br>" . $move . ".";
}
else{
    $UserCombatSkill .= $move;
}

?>
