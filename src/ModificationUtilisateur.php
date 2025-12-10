<?php

 session_start();
 if (isset($_SESSION['login']) && isset($_SESSION['passwd'])) {
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
	$typelogin = $_SESSION['type'];
 }
 if ($typelogin != "admin"){
	 header ("Location:index.php");
 }
require_once 'fonctionsConnexion.php'; 	// déclaration du fichier contenant des fonctions pouvant être appelées
require_once 'fonctionsBDD.php'; // délaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant  êre appelées

$conn1=connexionBDD('paramCon.php'); 	// appel de la fonction connexionBDD. Le résultat retourné (un connecteur à la bdd) sera dans la variable $conn1
// à partir d'ici, on est connecté à  la BDD acec le connecteur $conn1
?>
<html>
	<head>
		<title>Titre : Validation de la réservation</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<h1>Modification de la bdd</h1>

		<!-- ceci est un commentaire en HTML -->
		<h2>La variable reçue est normalement présente dans l'url.</h2>
		<strong>Vérifiez sa présence</strong>
		<br /> <!-- saut de ligne en html -->

		Variable(s) reçue(s) (pour verification) :
		<?php
		// on récupère les paramètres GET ou POST (elles sont dans le tableau sur le serveur) et on crée une nouvelle variable pour les appeler ultérieurement
		//(cette opération n'est pas obligatoire - on peut accéder par la suite à la variable par le tableau
		// on préfère pour des raisons de clareté de code copier la variable du tableau dans une variable (php)
		$local_idcompte = $_GET['P_refidcompte'];
		echo $local_idcompte."<br />";
		
		if ($_GET['P_nom'] !=""){	
		$local_nom= $_GET['P_nom'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_nom."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$index=ModifNomUtilisateur($conn1,$local_idcompte, $local_nom);
		}
		
		if ($_GET['P_prenom'] !=""){
		$local_prenom= $_GET['P_prenom'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_prenom."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$index=ModifPrenomUtilisateur($conn1,$local_idcompte, $local_prenom);
		}
		if ($_GET['P_adresse']!=""){
		$local_adresse= $_GET['P_adresse'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_adresse."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$index=ModifAdresseUtilisateur($conn1,$local_idcompte, $local_adresse);
		}
		if ($_GET['P_contact']!=""){
		$local_contact= $_GET['P_contact'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_contact."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$index=ModifContactUtilisateur($conn1,$local_idcompte, $local_contact);
		}
		if ($_GET['P_email']!=""){
		$local_email= $_GET['P_email'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_email."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$index=ModifEmailUtilisateur($conn1,$local_idcompte, $local_email);
		}
		if ($_GET['P_username']!=""){
		$local_username= $_GET['P_username'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_username."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$index=ModifUsernameUtilisateur($conn1,$local_idcompte, $local_username);
		}
		
		if ($_GET['P_password']!=""){
		$local_password= $_GET['P_password'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		/*$local_password= password_hash($local_password, PASSWORD_DEFAULT);*/
		echo $local_password."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$index=ModifPasswordUtilisateur($conn1,$local_idcompte, $local_password);
		}
		
		if ($_GET['P_typecompte']!=""){
		$local_typecompte= $_GET['P_typecompte'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_typecompte."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$index=ModifTypeUtilisateur($conn1,$local_idcompte, $local_typecompte);
		}
		
		if ($_GET['P_statutcompte']!=""){
		$local_statutcompte= $_GET['P_statutcompte'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_statutcompte."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$index=ModifStatutUtilisateur($conn1,$local_idcompte, $local_statutcompte);
		}
		

		// fermeture de la connexion a la base de donnees.
		deconnexionBDD($conn1);
		header( "refresh:2;url=afficheUtilisateurs.php" );
		?>
		Fin code de la modification du compte
		<br />
		<h2>Verifier que l'enregistrement est effectif dans la base de données (avec phpPgAdmin par exemple)<h2>
	</body>
</html>
