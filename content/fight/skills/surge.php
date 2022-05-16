<?php 
youdmg = youdmg * 3
userinfo["SkillCooldown2"] = 4
userinfo["Buff1"] = "Surge"
userinfo["Buff1Time"] = 2
list += randchoice(["**You gain a sudden mana boost tripling your damage!\nDealing a total of {} damage.\nThe amount of mana was too much to handle and you cant cast another spell for a duration.**".format(youdmg), "**You overload yourself with power and triple the magic output but stunning yourself in the process.\nYou deal a *stunning* {} damage!**".format(youdmg), "**You get a power surge, triple your damage but immobilizing yourself.\nYou deal {} damage.**".format(youdmg)])

else{
    $list =  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>