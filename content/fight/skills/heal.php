<?php 
if ($GLOBALS["userinfo"]["health"] == $GLOBALS["userinfo"]["MaxHealth"]){
    $list .= "You already have ". $GLOBALS["userinfo"]["MaxHealth"] . " HP!";
}
if ($GLOBALS["userinfo"]["hp_potions"] > 0){
    $gain = rand(25, 55);
    $GLOBALS["userinfo"]["health"] += $gain;
    if ($GLOBALS["userinfo"]["health"] > $GLOBALS["userinfo"]["MaxHealth"]){
        $GLOBALS["userinfo"]["health"] = $GLOBALS["userinfo"]["MaxHealth"];
    }
    $GLOBALS["userinfo"]["hp_potions"] -= 1;
    $list .= "You used a Health Potion <br> +".$gain ." HP";
}
else{
$list .= " You don't have any health potions!";
}
?>
