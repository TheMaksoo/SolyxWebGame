
<?php require_once 'backend/config.php'; ?>
<?php
	//session_cache_limiter('private_no_expire');
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
		<header class="nav-bar">
			<a href="index.php" class="nav-logo-text">Solyx</a>
			<ul class="nav-list">
				<?php if($_SESSION['user_id'] == 387317544228487168){ ?>
				<a href='onlineCode.php'>Code :D</a> <?php } ?>
				<a href='game.php'>Play</a>
				<a href='index.php'>Home</a>
				<a href='news.php'>News</a>
				<a href='tutorial.php'>Tutorial</a>
				<a href='commands.php'>Commands</a>
				<a href='team.php'>Team</a>
				<a href='contact.php'>Contact</a>	
				<?php
				if(isset($_SESSION['user_id'])): ?>
					<a href="game.php" ><?php echo 'Hello <strong>', $_SESSION['user_name'] . '#' . $_SESSION['user_discriminator'],  '</strong>'?></a>
					<a href="login.php?action=logout">Uitloggen</a>
				<?php else: ?>
					<a href="login.php?action=login">Inloggen</a>
				<?php endif; ?>
			</ul>
		</header>
	</body>
</html>