<?php
    include_once 'header.php';
    require __DIR__ . "/backend/config.php";
    require __DIR__ . "/backend/conn.php";

    if(!isset($_SESSION['user_id']))
    {
        header("Location: $base_url/login.php?action=login");
        exit;
    }
    $query = new MongoDB\Driver\Query(['_id' => $_SESSION['user_id']]);
    $userinfo = $mongo->executeQuery('solyx.users', $query);


    
    ?>
<body>
    <main>
        <section class="game-section">
            <div class="game">
                
                <div class="game-container">
                <img src="https://cdn.discordapp.com/avatars/<?php $_SESSION['user_avatar'];?>" style="width:35; height: 35px; border-radius: 5%;".jpg>
                    <ul >
                        <li><?php var_dump($_SESSION);?></li>
                        <li>----------------------------------------------------------------</li>
                        <li><?php var_dump($userinfo);?></li>
                        <li><span>1600+ Servers.</span></li>
                        <li><span>60+ user commands.</span></li>
                        <li><span>150+ Total commands.</span></li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
</body>
<?php
    include_once 'footer.php';
    ?>