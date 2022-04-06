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
<body id="inscription">
	<section id="connection">
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
			<h2>Ou se connecter avec</h2>
			<div class="connect-logo">
				<a href="https://fr-fr.facebook.com/" target="_self"><img src="images/inscription/fb_icon.png"></a>
				<a href="https://accounts.google.com/" target="_self"><img src="images/inscription/ggle_icon.png"></a>
				<a href="https://appleid.apple.com/fr/" target="_self"><img src="images/inscription/apple_icon.png"></a>
			</div>
			<button id="btnco" type="submit">Connexion</button>
			<button id="mdp" type="submit">Mot de passe oublié ?</button>
		</div>
	</section>

	<section id="registered">
		<div id="neumorphism-white">
			<h2>Inscrivez-vous !</h2>
			<div class="connect">
				<img src="images/inscription/user_icon.png">
				<input id="login-lastname" type="text" name="lastname" placeholder="Nom">
			</div>
			<div class="connect">
				<img src="images/inscription/user_icon.png">
				<input id="login-name" type="text" name="name" placeholder="Prénom">
			</div>
			<div class="connect">
				<img src="images/inscription/mail_icon.png">
				<input id="sub-email" type="text" name="e-mail" placeholder="E-mail">
			</div>
			<div class="connect">
				<img src="images/inscription/mdp_icon.png">
				<input id="sub-password" type="text" name="password" placeholder="Mot de passe">
			</div>
			<div class="connect">
				<img src="images/inscription/mdp2_icon.png">
				<input id="confirm-password" type="text" name="confirm-password" placeholder="Confirmation mot de passe">
			</div>
			<button type="submit">Inscription</button>
		</div>
	</section>

</body>
</html>