<?php
    require __DIR__ . "/config.php";
    require $_SERVER['DOCUMENT_ROOT'] . '/solyx/vendor/autoload.php';
  


    function isAnimated($avatar)
    {
        $ext = substr($avatar, 0, 2);
        if ($ext == "a_")
        {
            return ".gif";
        }
        else
        {
            return ".png";
        }
    }

    function getTitle()
    {
        if ($GLOBALS["userinfo"]["title"] == NULL) {
            $title = "None";
        }
        else{ 
            $title = $GLOBALS["userinfo"]["title"];
        }
        return $title;
    }

    function getMaxExp()
    {
        $maxexp = 100 + (($GLOBALS["userinfo"]["lvl"] + 1) * 3.5);
        return $maxexp;
    }

    function getPet()
    {
        $pet = $GLOBALS["userinfo"]["equipped_pet"][0]["name"];
        return $pet;
    }
    
    function getEquipmentStats()
    {
        
        if ($GLOBALS["userinfo"]["wearing"] != "None"){
            $armorequipped = $GLOBALS["userinfo"]["wearing"]["name"];
            $armormin = $GLOBALS["userinfo"]["wearing"]["stats_min"];
            $armormax = $GLOBALS["userinfo"]["wearing"]["stats_max"];
        }
        else{
            $armorequipped = "None";
            $armormin = 0;
            $armormax = 0;
        }
            
        if ($GLOBALS["userinfo"]["neck"] != "None"){
            $neckstats1 = $GLOBALS["userinfo"]["neck"]["stats_min"];
            $neckstats2 = $GLOBALS["userinfo"]["neck"]["stats_max"];
        }  
        else{
            $neckstats1 = 0;
            $neckstats2 = 0;
        }
    
        if ($GLOBALS["userinfo"]["head"] != "None"){
            $headstats1 = $GLOBALS["userinfo"]["head"]["stats_min"];
            $headstats2 = $GLOBALS["userinfo"]["head"]["stats_max"];
        }    
        else{
            $headstats1 = 0;
            $headstats2 = 0;
        }

        if ($GLOBALS["userinfo"]["body"] != "None"){
            $bodystats1 = $GLOBALS["userinfo"]["body"]["stats_min"];
            $bodystats2 = $GLOBALS["userinfo"]["body"]["stats_max"];
        } 
        else{
            $bodystats1 = 0;
            $bodystats2 = 0;
        }

        if ($GLOBALS["userinfo"]["hand"] != "None"){
            $handstats1 = $GLOBALS["userinfo"]["hand"]["stats_min"];
            $handstats2 = $GLOBALS["userinfo"]["hand"]["stats_max"];
        }
        else{
            $handstats1 = 0;
            $handstats2 = 0;
        }

        if ($GLOBALS["userinfo"]["legs"] != "None"){
            $legsstats1 = $GLOBALS["userinfo"]["legs"]["stats_min"];
            $legsstats2 = $GLOBALS["userinfo"]["legs"]["stats_max"];
        }
        else{
            $legsstats1 = 0;
            $legsstats2 = 0;
        }

        if ($GLOBALS["userinfo"]["feet"] != "None"){
            $feetstats1 = $GLOBALS["userinfo"]["feet"]["stats_min"];
            $feetstats2 = $GLOBALS["userinfo"]["feet"]["stats_max"];
        }
        else{
            $feetstats1 = 0;
            $feetstats2 = 0;
        }

        $damage_bonus_min = $handstats1;
        $damage_bonus_max = $handstats2;
        $total_defense_min = $neckstats1  +  $headstats1  + $bodystats1  + $legsstats1 + $feetstats1 + $armormin;
        $total_defense_max = $neckstats2  +  $headstats2  + $bodystats2  + $legsstats2 + $feetstats2 + $armormax;
        return array($armorequipped, $damage_bonus_min, $damage_bonus_max, $total_defense_min, $total_defense_max, $neckstats1,$neckstats2, $headstats1, $headstats2, $bodystats1, $bodystats2, $legsstats1, $legsstats2, $feetstats1, $feetstats2, $armormin, $armormax );
    }
?>