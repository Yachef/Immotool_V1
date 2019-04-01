<?php require_once('../../server/server.php');?>
<!doctype html>
<html>

<head>
	<link rel="stylesheet" href="../../css/style-register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../../js/script-register.js"></script>
</head>

<body>
	<h1 style="text-align:center;"><a href="../index.php">Accueil</a></h1>
	<div class="login-wrap">
		<div class="login-html">
			<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
				class="tab">Connexion</label>
			<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">S'inscrire</label>
			<div class="login-form">
				<div class="sign-in-htm">
					<form action="#" method="post">
						<?php require('../../server/errors.php');?>
						<div class="group">
							<label for="username" class="label">Identifiant</label>
							<input id="username" name="username" type="text" class="input">
						</div>
						<div class="group">
							<label for="password" class="label">Mot de passe</label>
							<input id="pass" name="password" type="password" class="input" data-type="password">
						</div>
						<div class="group">
							<input id="check" type="checkbox" class="check" checked>
							<label for="check"><span class="icon"></span> Garder ma session active</label>
						</div>
						<div class="group">
							<input type="submit" class="button" value="Se connecter" name="login_user">
						</div>
					</form>
					<div class="hr"></div>
					<div class="foot-lnk">
						<a href="#forgot">Mot de passe oublié ? </a>
					</div>
				</div>
				<div class="sign-up-htm">
					<form action="#" methode="post">
						<?php require('../../server/errors.php');?>
						<div class="group">
							<label for="username" class="label">Identifiant</label>
							<input type="text" name="username" class="input" value="<?php echo $username; ?>">
						</div>
						<div class="group">
							<label for="password_1" class="label">Mot de passe</label>
							<input type="password" class="input" name="password_1">
						</div>
						<div class="group">
							<label for="password_2" class="label">Repetez le mot de passe</label>
							<input type="password" class="input" name="password_2">
						</div>
						<div class="group">
							<label for="email" class="label">Adresse mail</label>
							<input type="email" class="input" name="email" value="<?php echo $email; ?>">
						</div>
						<div class="group">
							<input id="check" type="checkbox" class="check" checked>
							<label for="check"><span class="icon"></span> J'accepte les <a href = "cgu.php">CGU</a></label>
						</div>
						<div class="group">
							<input type="submit" class="button" value="S'inscrire" name="reg_user">
						</div>
					</form>
					<div class="hr"></div>
					<div class="foot-lnk">
						<a href="register.php?login=1">Deja Membre ?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
























</html>