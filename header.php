
<?php require_once 'backend/config.php'; ?>
<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Solyx</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="https://kit.fontawesome.com/091fb7e3b0.js" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="icon" type="image/png" href="img/solyxicon.png"/>
	</head>
	<body>
		<section class="hero">
			<header class="nav-bar">
				<a href="index.php" class="nav-logo-text">Solyx</a>
				<ul class="nav-list">
                    <a href='game.php'>Play</a>
					<a href='index.php'>Home</a>
					<a href='news.php'>News</a>
					<a href='tutorial.php'>Tutorial</a>
					<a href='commands.php'>Commands</a>
					<a href='team.php'>Team</a>
					<a href='contact.php'>Contact</a>	
                    <?php
                    if(isset($_SESSION['user_id'])): ?>
                        <?php echo "hello <strong>", $_SESSION['user_name'] . '#' . $_SESSION['user_discriminator'], "</strong>"?>
                        <a href="<?php echo $base_url; ?>/logout.php">Uitloggen</a>
                    <?php else: ?>
                        <a href="<?php echo $base_url; ?>/login.php?action=login">Inloggen</a>
                    <?php endif; ?>
				</ul>
			</header>
			<div class="hero-container">
				<p class="brand">Solyx</p>
				<p class="type">Discord RPG bot.</p>
				<p class="description">Solyx is a solo developed Discord bot that is focused on text based RPG.</p>
			</div>
		</section>
	</body>
</html>	

            
        </div>
    </div>
</header>