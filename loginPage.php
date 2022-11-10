<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="styleLogin.css">

</head>
<body id="login-body">
	<form action="login.php" method="POST">
		<h2>Connexion</h2>

		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo ($_GET['error']) ?></p>
			
			
		 <?php } ?>
		<label>Nom d'utilisateur</label>
		<input type="text" name="uname" placeholder="Nom d'utilisateur"><br>
		
		<label>Mot de passe</label>
		<input type="password" name="password" placeholder="Mot de passe"><br>

		<button type="submit">Se connecter</button>
	</form>

</body>
</html>