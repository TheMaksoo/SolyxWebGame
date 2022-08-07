<?php 

$move = randchoice(["You shoot a normal arrow", "You fire a normal arrow"]);
if ($GLOBALS["userinfo"]["lvl"] >= 30){
    $move = randchoice(["You shoot an iron arrow", "You fire an iron arrow"]);
}
if ($GLOBALS["userinfo"]["lvl"] >= 90){
    $move = randchoice(["You shoot a steel arrow", "You fire a steel arrow"]);
}
if ($GLOBALS["userinfo"]["Buff1"] == "Corrupt"){
    $youdmg = round(($youdmg / 100) * 130);
    $EnemyEffect .= $enemyname . " Has been corrupted for " . $GLOBALS["userinfo"]["Buff1Time"] . " turns.<br>". $move . " dealing " . $youdmg . " damage.";
    if ($GLOBALS["userinfo"]["Buff1"] == "Corrupt" && $GLOBALS["userinfo"]["EnemyStun"] > 0){
        $EnemyEffect .= $enemyname . " Has been stunned for " . $GLOBALS["userinfo"]["EnemyStun"] . " turns.<br>" . $enemyname . " Has been corrupted for " . $GLOBALS["userinfo"]["Buff1Time"] . " turns.<br>" . $move . " dealing " . $youdmg . " damage.";
    }
}
else{
    $UserCombatSkill = $move;
    $UserCombatDamage = "Dealing ". $youdmg . " <img src='img\icons\Sword.webp' class='game-icons'>";
}
?>
