<?php 

$orb = "a small orb";
if ($userinfo["lvl"] >= 30){
    $orb = "an orb";
}
if ($userinfo["lvl"] >= 90){
    $orb = "a large orb";
}
if ($userinfo["Buff1"] == "Surge"){
    $list += "you have been stunned for 1 turn";
}
else{
    $list += $username . " casts " . $orb . " and hits " . $enemyname . " for " . $youdmg . " damage.";
}
if ($userinfo["Buff1"] == "Arise"){
    $hit = rand(($youdmg / 100) * 25);
    $totaldmg = $hit * 5;
    $list += "\nThe army of skeletons attacks.\nDealing " . $hit . " damage each\nDealing a total of " . $totaldmg . " damage.";
}
else{
    $list =  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>