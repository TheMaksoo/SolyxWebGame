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
    $list .= $username . " has the blockade buff doubling defense.<br>" . $move . " dealing " . $youdmg . " damage.";
}
elseif ($GLOBALS["userinfo"]["Buff1"] == "Slice"){
    $bleeding = round(($enemyhp / 100) * 25);
    $list .= $enemyname . " is still bleeding and losing health.<br>Taking " . $bleeding . " bleeding damage<br>" . $move . " dealing " . $youdmg . " damage.";
}
else{
	$list .= $move . "<br>Dealing ". $youdmg . " damage.";
}
?>
