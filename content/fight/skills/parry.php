<?php 
$userinfo["EnemyStun"] = 2;
$userinfo["SkillCooldown1"] = 4;
$youdmg = 0;
$attacks = ["You parry " . $enemyname . "'s " . $attack . " stun them", "You parry their attack and stun them", "You parry the attack and stun " . $enemyname];
$num = array_rand($attacks);
$list = $list . $attacks[$num];

if ($userinfo["Buff1"] == "Rupture"){
    $bleeding = rand(($enemyhp / 100) * 25);
    $list += $enemyname . " is still bleeding and losing health.\nTaking " . $bleeding . " bleeding damage\n" . $parry . ".";
}


?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>