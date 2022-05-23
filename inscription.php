<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
	<link rel="icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<?php
if(isset($_SESSION['logged'])){
	header('Location: index.php');
}
?>

<body id="inscription">
	<form id="connection" action="functions/login.php" method='post'>
		<div class="relative">
			<a id="arrow" href="index.php" target="_self"><img src="images/inscription/arrow.png" alt="Flèche de retour"></a>
		</div>
		<div id="neumorphism-blue">
			<h1>Connectez-vous !</h1>
			<div class="connect">
				<img src="images/inscription/user_white_icon.png">
				<input id="login-email" type="text" name="e-mail" placeholder="E-mail">
			</div>
			<div class="connect">
				<img src="images/inscription/mdp_white_icon.png">
				<input id="login-password" type="text" name="password" placeholder="Mot de passe">
			</div>
			<button type="submit">Connexion</button>
			<button id="lost-mdp" type="submit">Mot de passe oublié ?</button>
			<h2>Ou se connecter avec</h2>
			<div class="connect-logo">
				<a href="https://fr-fr.facebook.com/" target="_self"><img src="images/inscription/fb_icon.png"></a>
				<a href="https://accounts.google.com/" target="_self"><img src="images/inscription/ggle_icon.png"></a>
				<a href="https://appleid.apple.com/fr/" target="_self"><img src="images/inscription/apple_icon.png"></a>
			</div>
		</div>
</form>

	<form id="registered" action="functions/register.php" method='post'>
		<div id="neumorphism-white">
			<h2>Inscrivez-vous !</h2>
			<div class="connect">
				<img src="images/inscription/user_icon.png">
				<input id="register-lastname" type="text" name="lastname" placeholder="Nom">
				<small><?= $errors['lastname'] ?? '' ?></small>
			</div>
			<div class="connect">
				<img src="images/inscription/user_icon.png">
				<input id="register-name" type="text" name="name" placeholder="Prénom">
			</div>
			<div class="connect">
				<img src="images/inscription/mail_icon.png">
				<input id="register-email" type="text" name="e-mail" placeholder="E-mail">
			</div>
			<div class="connect">
				<img src="images/inscription/mdp_icon.png">
				<input id="register-password" type="text" name="password" placeholder="Mot de passe">
			</div>
			<div class="connect">
				<img src="images/inscription/mdp2_icon.png">
				<input id="confirm-password" type="text" name="confirm-password" placeholder="Confirmation mot de passe">
			</div>
			<button type="submit">Inscription</button>
		</div>
	</form>

</body>
</html>