<?php 
youdmg = int((youdmg / 100) * 50)
userinfo["EnemyStun"] = 3.
userinfo["SkillCooldown1"] = 6
list += randchoice(["**You strike a blunt blow to the head immobilizing the enemy for 2 turns,\nbut dealing less damage.\nYou deal {} damage.**".format(youdmg), "**You strike a heavy hit to the chest stunning the enemy for 2 turns.\nYou deal {} damage.**".format(youdmg), "**You strike a fierce blow to the knee making the enemy incapable of moving for 2 turns.\nBut dealing less damage.\nYou deal {} damage.**".format(youdmg)])

else{
    $list =  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>