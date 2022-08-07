
<?php require_once 'backend/config.php';
 require_once "backend/functions.php";?>

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
		<link rel="stylesheet" type="text/css" href="css/stylegame.css">
		<script src="https://kit.fontawesome.com/091fb7e3b0.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&family=Mulish:wght@300;400;500;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="icon" type="image/png" href="img/common/solyxicon.png"/>
	</head>
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip({
			placement : 'bottom'
		});
	});
	</script>
	<body>
		<header class="nav-bar-bg">
			<div class="nav-bar">
				<a href="index.php"><img src="img/common/solyxicon.png" style="width:40; height: 40px; border-radius: 50%; margin-bottom: 20px; margin-left: 20px"></a>
				<ul class="nav-list">
					<?php if (isset($_SESSION['user_id'])){ if ($_SESSION['user_id'] == 387317544228487168){ ?>
					<a href='onlineCode.php'data-toggle="tooltip" data-original-title="online coding" ><i class="fa-solid fa-code"></i></a> <?php }} ?>
						
					<?php
					if(isset($_SESSION['user_id'])): ?>
						<a href='cooldowns.php' data-toggle="tooltip" data-original-title="Cooldowns"><i class="fa-solid fa-bell"></i></a>
						<a href='game.php'data-toggle="tooltip" data-original-title="Game" ><i class="fa-solid fa-dragon"></i></a>
						<a href="game.php" data-toggle="tooltip" data-original-title="Userinfo"><?php echo '<strong>', $_SESSION['user_name'] . '#' . $_SESSION['user_discriminator'],  '</strong>'?></a>
						<a href="login.php?action=logout">Logout</a>
						<img src="https://cdn.discordapp.com/avatars/<?php $extention = isAnimated($_SESSION['user_avatar']); echo $_SESSION['user_id'] . "/" . $_SESSION['user_avatar'] . $extention; ?>" style="width:40; height: 40px; border-radius: 50%; margin-right: 20px;"/>
						
						
					<?php else: ?>
						
						<a href='index.php'>Home</a>
						<a href='news.php'>News</a>
						<a href='tutorial.php'>Tutorial</a>
						<a href='commands.php'>Commands</a>
						<a href='team.php'>Team</a>
						<a href='contact.php'>Contact</a>
						<a href="login.php?action=login">Inloggen</a>
					<?php endif; ?>
				</ul>
			</div>
		</header>
	</body>
</html>