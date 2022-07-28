<?php 
$move = randchoice(["<span class=´type´><span>You swing your weapon and hit a light blow.</span></span>", "<span class=´type´><span>You strike a light blow.</span></span>"]);
if ($GLOBALS["userinfo"]["lvl"] >= 30){
    $move = randchoice(["<span class=´type´><span>You swing your weapon and hit a strong blow.</span></span>", "<span class=´type´><span>You strike a strong blow.</span></span>"]);
}
if ($GLOBALS["userinfo"]["lvl"] >= 90){
    $move = randchoice(["<span class=´type´><span>You swing your weapon and hit a heavy blow.</span></span>", "<span class=´type´><span>You strike a heavy blow.</span></span>"]);
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
	$list .= $move . "<span class=´type´><span>Dealing ". $youdmg . " damage.</span></span>";
}
?>
