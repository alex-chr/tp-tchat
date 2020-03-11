<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>TP Javascript</title>
		<link rel="stylesheet" href="Style.css" />
	</head>
	<body>
	<div id="Entete">
		<h1>TP JAVASCRIPT</h1>
	</div>

	<div id="connexion" class="hide show">
		<p>connexion</p>
		<button onclick="verifCo()">Connexion</button>
		<button onclick="affSess(1)">Pas Encore Enregistré</button>
		<input class="input_co" type="text" name="ps" placeholder="Your pseudo ..">
		<input class="input_co" type="text" name="psw" placeholder="Your password ..">
	</div>

	<div id="inscription" class="hide">
		<p>inscription</p>
		<button onclick="addUser()">Valider</button>
		<input class="input_insc" type="text" name="ipse" placeholder="Your pseudo ..">
		<input class="input_insc" type="text" name="ipsw" placeholder="Your password ..">
		<input class="input_insc" type="mail" name="imail" placeholder="Your mail ..">
	</div>

	<div id="message" class="hide">
		<div class="formulaire">
			<p>Veuillez entrer vos informations pour votre message</p>
			<button onclick="addMsg()">Valider</button>
			<button class="btn_admin hide" onclick="addMsgAdmin()">Message Administrateur</button>
			<textarea type="text" name="msg" placeholder="Your message .."></textarea>
		</div>

		<div class="container_msg">
			<p>Voici les 10 derniers messages</p>
			<div class="admin">
				<?php
					require_once "connexion_bdd.php";

					$response = $bdd->query("SELECT * FROM `tab_msg`");
					while ($donnes=$response->fetch()) {
						echo "<div><span>".$donnes['user']."</span><span>".$donnes['message']."</span></div>";
					}
				?>
			</div>
		</div>

		<div class="news">
			<p>News</p>
			<?php
				$response = $bdd->query("SELECT * FROM `msg_admin`");
				while ($donnes=$response->fetch()) {
					echo "<div><span>".$donnes['user']."</span><span>".$donnes['message']."</span></div>";
				}
			?>
		</div>

	</div>

	<div id="btn_primaire">
		<button onclick="affSess(0)">session connexion</button>
		<button onclick="affSess(1)">session inscription</button>
		<button onclick="affSess(2)">session message</button>
	</div>

	<!-- <div id="form">
		<div id="Zone_2">
			<p>Veuillez entrer vos informations pour votre message</p>
			<button>Valider</button>
			<input type="text" name="id" class="input_text" placeholder="Pseudo" required>
			<input type="text" name="id" class="input_text" placeholder="Message" required>
		</div>
		<div id="Zone_1">
			<p>Vos messages</p>
		</div>
	</div>
-->

	<script src="Codes.js"></script>
</body>
</html>
