<?php 
youdmg = int((youdmg / 100) * 150)
enemydmg = 0
userinfo["SkillCooldown2"] = 4
list += randchoice(["**You come out the shadows and surprise {}.\nYou deal a critical strike to them!\nYou deal {} damage.**".format(enemyname, youdmg), "**You ambush {} and attack them with a critical hit!\nYou deal {} damage.**".format(enemyname, youdmg), "**You emerge from the darkness.\n Taking the enemy by surprise and dealing a critical hit.\nYou deal {} damage.**".format(youdmg)])

else{
    $list =  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>