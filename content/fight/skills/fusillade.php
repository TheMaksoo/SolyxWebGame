<?php 
$GLOBALS["userinfo"]["SkillCooldown1"] = 5;
$hit = round(($youdmg / 100) * 50);
$youdmg = round(($youdmg / 100) * 150);
$combo = randchoice(["You deal a series of 3 hits.", "You deal a series of 3 precise hits.", "You deal a series of 3 critical hits."]);

if ($GLOBALS["userinfo"]["Buff1"] == "Blockade"){
    $youdmg = round(($youdmg / 100) * 85);
    $youdef = $youdef * 2;
    $list .=  $username . " has the blockade buff doubling defense.<br>bBut lowering the damage.<br>" . $combo . " Dealing " . $youdmg . " damage.";
}
else{
    $list .=  $combo . " dealing " . $hit . " per hit and doing a total of " . $youdmg . " damage.";
}

?>
