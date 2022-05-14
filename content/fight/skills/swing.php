<?php 


// special skill only.
$list = $enemyname ." has " . $enemyhp . " HP.<br>" . $username . " has " . $userhealthstart . " HP<br><br>";
if ($GLOBALS["userinfo"]["Buff1"] == "Blockade"){
    $youdmg = ($youdmg / 100) * 85;
    $youdef = $youdef * 2;
    $list = $list . "<strong>" . $username . " has the blockade buff doubling defense.<br>" . $move . " dealing " . $youdmg . " damage.</strong>";
}
elseif ($GLOBALS["userinfo"]["Buff1"] == "Slice"){
    $bleeding = ($enemyhp / 100) * 25;
    $list = $list . "<strong>" . $enemyname . " is still bleeding and losing health.\nTaking " . $bleeding . " bleeding damage\n" . $move . " dealing " . $youdmg . " damage.</strong>";
}
else{
    $list =  $list . "<strong> " . $move . " dealing " . $youdmg . " damage. </strong>";}


    //repeated end text.
if ($GLOBALS["userinfo"]["EnemyStun"] > 0){
    if ($skill == "Distort"){
        $list = $list . "<br><strong>" . $enemyname . " is stunned and can't fight.</strong>"; 
    }
}
else{
    
    $list = $list . "<br><strong>" . $enemyname . " uses  " . $enemyattack. " hits " . $username. " for " . $enemydmg. " damage.</strong>";
}

$list = $list . "<br><br>" . $enemyname . " has " . $enemyhp . " HP<br>" . $username . " has " . $userhealth . " HP<br><br>";

?>
<!DOCTYPE html>
<html>  
    <body>
        <p><?php print_r($list)?></p>
    </body>
</html>