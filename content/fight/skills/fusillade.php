<?php 
$userinfo["SkillCooldown1"] = 5;
$hit = rand(($youdmg / 100) * 50);
$youdmg = rand(($youdmg / 100) * 150);
$attacks = ["You deal a series of 3 hits.", "You deal a series of 3 precise hits.", "You deal a series of 3 critical hits."];
$num = array_rand($attacks);
$move  = $combo[$num];
if ($attacksuserinfo["Buff1"] == "Blockade"){
    $youdmg = rand(($youdmg / 100) * 85);
    $youdef = $youdef * 2;
    $list +=  $username . " has the blockade buff doubling defense.\nbBut lowering the damage.\n" . $combo . " Dealing " . $youdmg . " damage.";
}
else{
    $list +=  $combo . " dealing " . $hit . " per hit and doing a total of " . $youdmg . " damage.";
}

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>