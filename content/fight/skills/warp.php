<?php 
userinfo["Buff1"] = "Warp"
userinfo["Buff1Time"] = 2
enemydmg = int((enemydmg / 100) * 60)
userinfo["SkillCooldown2"] = 5
list += randchoice(["**You warp the enemies movement.\nMaking their attack hit you in the shoulder.\nthey deal {} damage\nYou deal {} damage.**".format(enemydmg, youdmg), "**You warp the enemies attack.\ntheir attack hits you in the leg.\nthey deal {} damage\nYou deal {} damage.**".format(enemydmg, youdmg), "**You warp the enemies vision.\nMaking their attack hit you in foot.\nthey deal {} damage\nYou deal {} damage.**".format(enemydmg, youdmg)])

else{
    $list =  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>