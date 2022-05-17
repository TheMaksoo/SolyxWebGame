<?php 

$arrow = getAttack(["You shoot a normal arrow", "You fire a normal arrow"]);
if ($userinfo["lvl"] >= 30){
    $arrow = getAttack(["You shoot an iron arrow", "You fire an iron arrow"]);
}
if ($userinfo["lvl"] >= 90){
    $arrow = getAttack(["You shoot a steel arrow", "You fire a steel arrow"]);
}
if ($userinfo["Buff1"] == "Corrupt"){
    $youdmg = rand(($youdmg / 100) * 130);
    $list .= $enemyname . " Has been corrupted for " . $userinfo["Buff1Time"] . " turns.\n". $arrow . " dealing " . $youdmg . " damage.";
    if ($userinfo["Buff1"] == "Corrupt" && $userinfo["EnemyStun"] > 0){
        $list .= $enemyname . " Has been stunned for " . $userinfo["EnemyStun"] . " turns.\n" . $enemyname . " Has been corrupted for " . $userinfo["Buff1Time"] . " turns.\n" . $arrow . " dealing " . $youdmg . " damage.";
    }
}
else{
    $list .=  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>