<?php
	require_once "connexion_bdd.php";

	if (isset($_GET['pseudo']) && isset($_GET['pwd'])) {
		// requete sql pour conter le nombre de ligne où les identifiants sont correctes dans la bdd
		$req = "SELECT COUNT(*) AS Nbrows FROM `utilisateur` WHERE utilisateur.pseudo=? AND utilisateur.password=?";
		$sql = $bdd->prepare($req);
		$sql->execute(array($_GET['pseudo'], $_GET['pwd']));
		$rows = $sql->fetch();
		$sql->closeCursor();

		if ($rows['Nbrows'] > 0) {
			if ($_GET['pseudo'] == 'admin') {
				echo "high_autorisation";
			} else {
				echo "autorised";
			}
		}
	}


	if (isset($_GET['newName']) && isset($_GET['newPass']) && isset($_GET['newMail'])) {
		try {
			$insert = $bdd->prepare("INSERT INTO `utilisateur`(`pseudo`, `password`, `mail`) VALUES (?,?,?)");
			$insert->execute(array($_GET['newName'], $_GET['newPass'], $_GET['newMail']));
		} catch(PDO_exception $e) {
			echo "non insere";
		}
	}

	if (isset($_GET['msgId']) && isset($_GET['msgCom'])) {
		try {
			$insertcom = $bdd->prepare("INSERT INTO `tab_msg`(`user`, `message`) VALUES (?,?)");
			$insertcom->execute(array($_GET['msgId'], $_GET['msgCom']));
		} catch(PDO_exception $e) {
			echo "<script>alert('non inséré')</script>";
		}
	}

	if (isset($_GET['msgIdAdmin']) && isset($_GET['msgAdmin'])) {
		try {
			$insertcom = $bdd->prepare("INSERT INTO `msg_admin`(`user`, `message`) VALUES (?,?)");
			$insertcom->execute(array($_GET['msgIdAdmin'], $_GET['msgAdmin']));
		} catch(PDO_exception $e) {
			echo "<script>alert('non inséré')</script>";
		}
	}
?>