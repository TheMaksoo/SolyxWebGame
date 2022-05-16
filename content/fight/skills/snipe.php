<?php 
$youdmg = int(($youdmg / 100) * 250)
userinfo["SkillCooldown2"] = 5
list += randchoice(["**You come out of the shadows and shoot your shot at {}.\nYou land a headshot!\nYou deal {} damage.**".format(enemyname, youdmg), "**You hide and snipe {} BOOM! Headshot.\nYou deal {} damage.**".format(enemyname, youdmg), "**You confuse the enemy and hit them from behind\nLucky headshot!\nYou deal {} damage.**".format(youdmg)])

else{
    $list =  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>