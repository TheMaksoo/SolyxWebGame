<?php 
move = randchoice(["You swing your weapon and hit a light blow", "You strike a light blow"])
if userinfo["lvl"] >= 30:
    move = randchoice(["You swing your weapon and hit a strong blow", "You strike a strong blow"])
if userinfo["lvl"] >= 90:
    move = randchoice(["You swing your weapon and hit a heavy blow", "You strike a heavy blow"])
if userinfo["Buff1"] == "Blockade":
    youdmg = int((youdmg / 100) * 85)
    youdef = youdef * 2
    list += "**{} has the blockade buff doubling defense.\n{} dealing {} damage.**".format(username, move, youdmg)
elif userinfo["Buff1"] == "Slice":
    bleeding = int((enemyhp / 100) * 25)
    list += "**{} is still bleeding and losing health.\nTaking {} bleeding damage\n{} dealing {} damage.**".format(enemyname, bleeding, move, youdmg)

else{
    $list =  $list . $move . " dealing " . $youdmg . " damage.";}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>