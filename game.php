<?php
    include_once 'header.php';
    require __DIR__ . "/backend/config.php";
    require __DIR__ . "/backend/conn.php";
    require __DIR__ . "/backend/functions.php";
    require __DIR__ . "/backend/discord.php";

    if(!isset($_SESSION['user_id']))
    {
        header("Location: $base_url/login.php?action=login");
        exit;
    }

    $userinfo = getuserinfo();
    $guildinfo = guildname($userinfo);
    $title = gettitle($userinfo);
    $maxexp = getmaxexp($userinfo);
    $pet = getpet($userinfo)

    ?>
<body>
    <main>
        <section class="game-section">
            <div class="game">
                
                <div class="game-container">
                    <ul>
                        <img src="https://cdn.discordapp.com/avatars/<?php $extention = is_animated($_SESSION['user_avatar']); echo $_SESSION['user_id'] . "/" . $_SESSION['user_avatar'] . $extention; ?>" style="width:40; height: 40px; border-radius: 50%;"/>
                        <li>Name:<?php print_r($userinfo["name"]);?></li>
                        <li>Race:<?php print_r($userinfo["race"]);?></li>
                        <li>Class:<?php print_r($userinfo["class"]);?></li>
                        <li>Title:<?php print_r($title); ?></li>
                        <li>Guild:<?php print_r($guildinfo->name);?></li>
                        <br>
                        <li>Level:<?php print_r($userinfo["lvl"]);?></li>
                        <li>Exp:<?php print_r($userinfo["exp"]);?>/<?php print_r($maxexp);?></li>
                        <li>Health:<?php print_r($userinfo["health"]);?>/<?php print_r($userinfo["MaxHealth"]);?></li>
                        <li>Market ID:<?php print_r($userinfo["_id"]);?></li>
                        <li>Pet:<?php print_r($pet);?></li>
                        <br>
                        <li>Equipment</li>
                        <li>Weapon:<?php print_r($userinfo["equip"]["name"]);?></li>
                        <li>Weapon Damage:<?php print_r($userinfo["equip"]["stats_min"]);?>-<?php print_r($userinfo["equip"]["stats_max"]);?></li>
                        <!-- <li>Bonus Damage:<?php print_r($damage_bonus_min);?>-<?php print_r($damage_bonus_max);?></li> -->
                    </ul>
                </div>
            </div>
        </section>
    </main>
</body>
<?php
    include_once 'footer.php';
    ?>