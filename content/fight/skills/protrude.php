<?php 
$youdmg = rand(($youdmg / 100) * 140);
$list .= getAttack(["You hit the enemy on a critical spot.", "You stab the enemy on a critical spot.", "You pierce the enemy on a critical spot."]);
$userinfo["SkillCooldown1"] = 3;
if ($userinfo["Buff1"] == "Slice"){
	$bleeding = rand(($enemyhp / 100) * 25);
	$list .= $enemyname . " is still bleeding and losing health.\nTaking " . $bleeding . " bleeding damage\n" . $combo . "\n Dealing" . $youdmg . " damage.";
}
else{
	$list .= $combo . "\n dealing ". $youdmg . " damage**";
}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>