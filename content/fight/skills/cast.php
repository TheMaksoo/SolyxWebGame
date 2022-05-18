<?php 

$orb = "a small orb";
if ($GLOBALS["userinfo"]["lvl"] >= 30){
    $orb = "an orb";
}
if ($GLOBALS["userinfo"]["lvl"] >= 90){
    $orb = "a large orb";
}
if ($GLOBALS["userinfo"]["Buff1"] == "Surge"){
    $list .= "you have been stunned for 1 turn";
}
else{
    $list .= $username . " casts " . $orb . " and hits " . $enemyname . " for " . $youdmg . " damage.";
}
if ($GLOBALS["userinfo"]["Buff1"] == "Arise"){
    $hit = round(($youdmg / 100) * 25);
    $totaldmg = $hit * 5;
    $list .= "<br>The army of skeletons attacks.<br>Dealing " . $hit . " damage each.<br>With a total of " . $totaldmg . " damage.";
    $enemyhp -= $totaldmg;
    if ($enemyhp < 0){
        $enemyhp = 0;}
}

?>
