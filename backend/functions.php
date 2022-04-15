<?php
    require __DIR__ . "/config.php";
    require __DIR__ . "/conn.php";
    require 'vendor/autoload.php';
  


    function is_animated($avatar)
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

    function gettitle($userinfo)
    {
        if ($userinfo["title"] == NULL) {
            $title = "None";
        }
        else{ 
            $title = $userinfo["title"];
        }
        return $title;
    }

    function getmaxexp($userinfo)
    {
        $maxexp = 100 + (($userinfo["lvl"] + 1) * 3.5);
        return $maxexp;
    }

    function getpet($userinfo)
    {
        $pet = $userinfo["equipped_pet"][0]["name"];
        return $pet;
    }
?>=