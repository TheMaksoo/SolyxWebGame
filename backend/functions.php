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

    function getmaxExp()
    {
        $maxExp = 100 + (($GLOBALS["userinfo"]["lvl"] + 1) * 3.5);
        return $maxExp;
    }

    function getPet()
    {
        $pet = $GLOBALS["userinfo"]["equipped_pet"][0]["name"];
        return $pet;
    }
    
    function getEquipmentStats()
    {
        
        if ($GLOBALS["userinfo"]["wearing"] != "None"){
            $armorEquipped = $GLOBALS["userinfo"]["wearing"]["name"];
            $armorMin = $GLOBALS["userinfo"]["wearing"]["stats_min"];
            $armorMax = $GLOBALS["userinfo"]["wearing"]["stats_max"];
        }
        else{
            $armorEquipped = "None";
            $armorMin = 0;
            $armorMax = 0;
        }
            
        if ($GLOBALS["userinfo"]["neck"] != "None"){
            $neckStats1 = $GLOBALS["userinfo"]["neck"]["stats_min"];
            $neckStats2 = $GLOBALS["userinfo"]["neck"]["stats_max"];
        }  
        else{
            $neckStats1 = 0;
            $neckStats2 = 0;
        }
    
        if ($GLOBALS["userinfo"]["head"] != "None"){
            $headStats1 = $GLOBALS["userinfo"]["head"]["stats_min"];
            $headStats2 = $GLOBALS["userinfo"]["head"]["stats_max"];
        }    
        else{
            $headStats1 = 0;
            $headStats2 = 0;
        }

        if ($GLOBALS["userinfo"]["body"] != "None"){
            $bodyStats1 = $GLOBALS["userinfo"]["body"]["stats_min"];
            $bodyStats2 = $GLOBALS["userinfo"]["body"]["stats_max"];
        } 
        else{
            $bodyStats1 = 0;
            $bodyStats2 = 0;
        }

        if ($GLOBALS["userinfo"]["hand"] != "None"){
            $handStats1 = $GLOBALS["userinfo"]["hand"]["stats_min"];
            $handStats2 = $GLOBALS["userinfo"]["hand"]["stats_max"];
        }
        else{
            $handStats1 = 0;
            $handStats2 = 0;
        }

        if ($GLOBALS["userinfo"]["legs"] != "None"){
            $legsStats1 = $GLOBALS["userinfo"]["legs"]["stats_min"];
            $legsStats2 = $GLOBALS["userinfo"]["legs"]["stats_max"];
        }
        else{
            $legsStats1 = 0;
            $legsStats2 = 0;
        }

        if ($GLOBALS["userinfo"]["feet"] != "None"){
            $feetStats1 = $GLOBALS["userinfo"]["feet"]["stats_min"];
            $feetStats2 = $GLOBALS["userinfo"]["feet"]["stats_max"];
        }
        else{
            $feetStats1 = 0;
            $feetStats2 = 0;
        }

        $damageBonusMin = $handStats1;
        $damageBonusMax = $handStats2;
        $totalDefenseMin = $neckStats1  +  $headStats1  + $bodyStats1  + $legsStats1 + $feetStats1 + $armorMin;
        $totalDefenseMax = $neckStats2  +  $headStats2  + $bodyStats2  + $legsStats2 + $feetStats2 + $armorMax;
        return array($armorEquipped, $damageBonusMin, $damageBonusMax, $totalDefenseMin, $totalDefenseMax, $neckStats1,$neckStats2, $headStats1, $headStats2, $bodyStats1, $bodyStats2, $legsStats1, $legsStats2, $feetStats1, $feetStats2, $armorMin, $armorMax );
    }
    function getRemainingTime($before, $cooldownTime)
    { 
        $diff = $cooldownTime - $before;

        $w = $diff / 86400 / 7;
        $d = $diff / 86400 % 7;
        $h = $diff / 3600 % 24;
        $m = $diff / 60 % 60; 
        $s = $diff % 60;

        return array($w, $d, $h, $m, $s);
    }

    function getFish()
    {
        $fishNames = ["&#128031;", "&#128032;", "&#128033;", "&#128255;", "&#128477;", "	
        &#128206;", "&#129364;", "&#128465;", "&#129408;"];
        $fishValues = [5, 10, 4, 15, 2, 2, 2, -10, -5];
        $int = random_int(0,8);
        $fishName = $fishNames[$int];
        $fishValue = $fishValues[$int];
        return array($fishName, $fishValue);
    }

    function getFishGold($fishValue)
    {
        if ($fishValue <= 0)
        {$TheMaksooFishText = $fishValue;}
        else{ $TheMaksooFishText = "+" . $fishValue;}
        return $TheMaksooFishText;
    }

    function randchoice($array){
        $num = array_rand($array);
        $random = $array[$num];
        return $random;
    }
?>