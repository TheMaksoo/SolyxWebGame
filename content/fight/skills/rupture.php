<?php 
userinfo["Buff1"] = "Rupture"
userinfo["Buff1Time"] = 2
bleeding = int((enemyhp / 100) * 25)
userinfo["SkillCooldown2"] = 4
list +=randchoice(["**You slice your weapon and rupture {}'s artery.\nCausing bleeding effect for 2 turns dealing {} damage.\nYou deal {} damage.**".format(enemyname, bleeding, youdmg), "**You hit the enemy with a blunt force rupturing an artery.\nCausing an internal bleeding for {} damage.\nYou deal {} damage.**".format(bleeding, youdmg), "**You stab the enemy in the neck rupturing their artery.\nCausing bleeding for 2 turns dealing {} damage\nYou deal {} damage.**".format(bleeding, youdmg)])

else{
    $list =  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>