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
			<div class="login-form">
				<div>
					<div class="tab" style = "color:white;">Mot de passe oublié</div>
					<form action="#" method="post">
						<div class="group">
							<label for="mail" class="label">Adresse Mail</label>
							<input id="username" name="mail" type="text" class="input">
						</div>
						<div class="group">
							<input type="submit" class="button" value="Confirmer" name="pass_oublie">
						</div>
						<?php
						if (isset($_REQUEST['pass_oublie']))  {
							connectToDB();
							$mail = mysqli_real_escape_string($GLOBALS['db'], $_REQUEST['mail']);

							$user_check_query = "SELECT * FROM users WHERE email='$mail' LIMIT 1";
							$result = mysqli_query($GLOBALS['db'], $user_check_query);
							$user = mysqli_fetch_assoc($result);
							
							    if(!$user){
								echo "L'adresse mail n'existe pas";
							    }else{
								$pass = genererChaineAleatoire(10);
								$query = "UPDATE users SET password='$pass' WHERE email='$mail'";
								mysqli_query($GLOBALS['db'], $query);
								$message = "Bonjour,\n Voici votre nouveau mot de passe : $pass \n Nous vous invitons à vous connecter à votre espace et à le modifier dans l'onglet Paramètres. \n Bien cordialement, \n Yacine de Immotool \n http://immotool.fr";
								mail($mail,"Récupération de votre mot de passe",$message);
								echo "Nous vous avons envoyé un email avec les instructions à suivre pour récupérer votre mot de passe";
							    }
							mysqli_close($GLOBALS["db"]);
						    }
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>