<?php
require_once 'fonctionsConnexion.php'; 	// déclaration du fichier contenant des fonctions pouvant être appelées
require_once 'fonctionsBDD.php'; // délaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant  êre appelées

$conn1=connexionBDD('paramCon.php'); 	// appel de la fonction connexionBDD. Le résultat retourné (un connecteur à la bdd) sera dans la variable $conn1
// à partir d'ici, on est connecté à  la BDD acec le connecteur $conn1
?>
<html>
	<head>
		<title>Titre : Enregistrement du compte</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<h1>Enregistrement dans la bdd</h1>

		<!-- ceci est un commentaire en HTML -->
		<h2>La variable reçue est normalement présente dans l'url.</h2>
		<strong>Vérifiez sa présence</strong>
		<br /> <!-- saut de ligne en html -->

		Variable(s) reçue(s) (pour verification) :
		<?php
		// on récupère les paramètres GET ou POST (elles sont dans le tableau sur le serveur) et on crée une nouvelle variable pour les appeler ultérieurement
		//(cette opération n'est pas obligatoire - on peut accéder par la suite à la variable par le tableau
		// on préfère pour des raisons de clareté de code copier la variable du tableau dans une variable (php)

		$local_nom= $_GET['P_nom'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_nom."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$local_prenom= $_GET['P_prenom'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_prenom."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$local_adresse= $_GET['P_adresse'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_adresse."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$local_contact= $_GET['P_contact'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_contact."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$local_email= $_GET['P_email'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_email."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$local_username= $_GET['P_username'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_username."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$local_password= $_GET['P_password'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		/*$local_password= password_hash($local_password, PASSWORD_DEFAULT);*/
		echo $local_password."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
		
		if (isset($_GET['P_typecompte'])){
			$local_typecompte= $_GET['P_typecompte'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
			echo $local_typecompte."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).
			if ($local_typecompte== "user") {$index=AjoutUtilisateur($conn1,$local_nom,$local_prenom,$local_adresse,$local_contact,$local_email,$local_username,$local_password,$local_typecompte); // appel de la fonction enregistreClient ; on passe en paramètre le nom du client (ici dans une variable)
			}
			
			if ($local_typecompte== "admin") {$index=AjoutAdmin($conn1,$local_nom,$local_contact,$local_email,$local_username,$local_password,$local_typecompte, $local_prenom); // appel de la fonction enregistreClient ; on passe en paramètre le nom du client (ici dans une variable)
			}
		}else{$local_typecompte="user";
		$index=AjoutUtilisateur($conn1,$local_nom,$local_prenom,$local_adresse,$local_contact,$local_email,$local_username,$local_password,$local_typecompte);
		}
		// fermeture de la connexion a la base de donnees.
		deconnexionBDD($conn1);
		if (isset($_GET['P_typecompte'])){
			if ($local_typecompte == "user") {
			header( "refresh:2;url=afficheUtilisateurs.php" );
			}
			if ($local_typecompte == "admin") {
			header( "refresh:2;url=afficheAdmins.php" );
			}
			}else{
			header("refresh:2;url=index.php");
		}
		
		?>
		Fin code enregistrement du client <?php echo $local_nom,$local_prenom,$local_adresse,$local_contact,$local_email,$local_username,$local_password, $local_typecompte ?>
		<br />
		<h2>Verifier que l'enregistrement est effectif dans la base de données (avec phpPgAdmin par exemple)<h2>
	</body>
</html>
