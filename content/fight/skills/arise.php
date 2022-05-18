<?php 
$hit = round(($youdmg / 100) * 25);
$GLOBALS["userinfo"]["Buff1"] = "Arise";
$GLOBALS["userinfo"]["Buff1Time"] = 2;
$GLOBALS["userinfo"]["SkillCooldown2"] = 8;
$totaldmg = $hit * 5;
$list .= randchoice(["You focus all your power and raise a few skeletons to do your fighting.<br>They each deal ". $hit . " damage for a total of ". $totaldmg . "  damage.", "You raise a group of skeletons that will fight for you.<br>they all hit ". $enemyname . " for ". $totaldmg . " total damage.", "You raise a small army of skeletons to do your bidding.<br> you command them to attack the enemy.<br>they each hit for ". $hit . ".<br>With a total of ". $totaldmg . " damage."]);
$enemyhp -= $totaldmg;
if ($enemyhp < 0){
    $enemyhp = 0;
}
?>
