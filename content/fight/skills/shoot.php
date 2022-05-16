<?php 

arrow = randchoice(["You shoot a normal arrow", "You fire a normal arrow"])
if userinfo["lvl"] >= 30:
    arrow = randchoice(["You shoot an iron arrow", "You fire an iron arrow"])
if userinfo["lvl"] >= 90:
    arrow = randchoice(["You shoot a steel arrow", "You fire a steel arrow"])
if userinfo["Buff1"] == "Corrupt":
    youdmg = int((youdmg / 100) * 130)
    list += "**{} Has been corrupted for {} turns.\n{} dealing {} damage.**".format(enemyname, userinfo["Buff1Time"], arrow, youdmg)
    if userinfo["Buff1"] == "Corrupt" and userinfo["EnemyStun"] > 0:
        list += "**{} Has been stunned for {} turns.**\n**{} Has been corrupted for {} turns.\n{} dealing {} damage.**".format(enemyname, userinfo["EnemyStun"], enemyname, userinfo["Buff1Time"], arrow, youdmg)

else{
    $list =  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>