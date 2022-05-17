<?php 
$userinfo["SkillCooldown1"] = 3;
if ($userinfo["Buff1"] == "Warp"){
    $enemydmg = rand(($enemydmg / 100) * 60);
    $list .= "Distort makes enemy's deal 50% less damage.\n" . $enemyname . " tries to fight but their attacks are still warped.\nThey deal less damage, Distort had no effect.\nYour attack deals " . $youdmg . " damage.";
}
else{
    $enemydmg = rand(($enemydmg / 100) * 50);
    $list .= "Distort makes enemy's deal 50% less damage.\n" . $enemyname . " tries to fight but their attacks are distorded.\nTheir attack scrapes you for " . $enemydmg . " damage.\nYour attack deals " . $youdmg . " damage.";
}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>