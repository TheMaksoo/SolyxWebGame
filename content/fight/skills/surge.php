<?php 
$youdmg = $youdmg * 3;
$GLOBALS["userinfo"]["SkillCooldown2"] = 4;
$GLOBALS["userinfo"]["Buff1"] = "Surge";
$GLOBALS["userinfo"]["Buff1Time"] = 2;
$list .= randchoice(["You gain a sudden mana boost tripling your damage!<br>Dealing a total of " . $youdmg . " damage.<br>The amount of mana was too much to handle and you cant cast another spell for a duration.", "You overload yourself with power and triple the magic output but stunning yourself in the process.<br>You deal a stunning " . $youdmg . " damage!", "You get a power surge, triple your damage but immobilizing yourself.<br>You deal " . $youdmg . " damage."])

?>
