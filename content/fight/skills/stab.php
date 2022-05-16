<?php 

stab = randchoice(["You hit a quick stab", "You quickly hit their weakspot"])
if userinfo["lvl"] >= 30:
    stab = randchoice(["You stab a weak spot", "You deal a precise stab"])
if userinfo["lvl"] >= 90:
    stab = randchoice(["You critically stab a weak spot", "You deal a deadly stab"])
if userinfo["EnemyStun"] > 0:
    list += "**{} is stunned and can't attack.\n{} dealing {} damage.**".format(enemydmg, stab, youdmg)
if userinfo["Buff1"] == "Rupture":
    bleeding = int((enemyhp / 100) * 25)
    list += "**{} is still bleeding and losing health.\nTaking {} bleeding damage\n{} dealing {} damage.**".format(enemyname, bleeding, stab, youdmg)
elif userinfo["Buff1"] == "Warp":
    enemydmg = int((enemydmg / 100) * 60)
    list += "**{} has warp debuff.\n the enemy damage is lowered by 60%**\n{} dealing {} damage.**".format(enemyname, stab, youdmg)

else{
    $list =  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>