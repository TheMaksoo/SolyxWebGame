<?php 
reap = int((enemyhp / 100) * 30)
userinfo["SkillCooldown1"] = 3
list += randchoice(["**You reap 30% of {}'s health and add it to your own health.\n healing for {} hp.**".format(enemyname, reap),"**You reap {} hp from the enemy to heal yourself.**".format(reap)])
if userinfo["Buff1"] == "Arise":
    hit = int((youdmg / 100) * 25)
    totaldmg = hit + hit + hit + hit + hit
    list += "\nThe army of skeletons attacks.\nDealing {} damage each\nDealing a total of {} damage.".format(hit, totaldmg)

else{
    $list =  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>