<?php 

$stab = randchoice(["You hit a quick stab.", "You quickly hit their weakspot."]);
if ($GLOBALS["userinfo"]["lvl"] >= 30){
    $stab = randchoice(["You stab a weak spot.", "You deal a precise stab."]);
}
if ($GLOBALS["userinfo"]["lvl"] >= 90){
    $stab = randchoice(["You critically stab a weak spot.", "You deal a deadly stab."]);
}
if ($GLOBALS["userinfo"]["EnemyStun"] > 0){
    $list .= $enemydmg . " is stunned and can't attack.<br>" . $stab . " dealing " . $youdmg . " damage.";
}
if ($GLOBALS["userinfo"]["Buff1"] == "Rupture"){
    $bleeding = round(($enemyhp / 100) * 25);
    $list .=  $enemyname . " is still bleeding and losing health.<br>Taking " . $bleeding . " bleeding damage<br>" . $stab . " dealing " . $youdmg . " damage.";
}
elseif ($GLOBALS["userinfo"]["Buff1"] == "Warp"){
    $enemydmg = round(($enemydmg / 100) * 60);
    $list .= $enemyname . " has warp debuff.<br> the enemy damage is lowered by 60%<br>" . $stab . " dealing " . $youdmg . " damage.";
}
else{
	$list .= $stab . "<br>Dealing ". $youdmg . " damage.";
}
$enemyhp -= $bleeding;
?>

