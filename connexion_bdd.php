<?php
	try {
		// connexion bdd
		$bdd =  new PDO('mysql:host=localhost; dbname=chat_mmi', 'root', '');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		// alert au cas où la bdd ne marche pas
    	echo "<script>alert('non connecté à la base de donnée')</script>";
    }
?>