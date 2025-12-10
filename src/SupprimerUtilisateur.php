<?php

 session_start();
 if (isset($_SESSION['login']) && isset($_SESSION['passwd'])) {
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
	$typelogin = $_SESSION['type'];
 }
 if ($typelogin == "user"){
	 header ("Location:premierPage.php");
 }
require_once 'fonctionsConnexion.php'; 	// déclaration du fichier contenant des fonctions pouvant être appelées
require_once 'fonctionsBDD.php'; // délaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant  êre appelées

$conn1=connexionBDD('paramCon.php'); 	// appel de la fonction connexionBDD. Le résultat retourné (un connecteur à la bdd) sera dans la variable $conn1
// à partir d'ici, on est connecté à  la BDD acec le connecteur $conn1
?>
<html>
	<head>
		<title>Titre : Suppression du compte utilisateur</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<h1>Suppression de la bdd</h1>

		<!-- ceci est un commentaire en HTML -->
		<h2>La variable reçue est normalement présente dans l'url.</h2>
		<strong>Vérifiez sa présence</strong>
		<br /> <!-- saut de ligne en html -->

		Variable(s) reçue(s) (pour verification) :
		<?php
		// on récupère les paramètres GET ou POST (elles sont dans le tableau sur le serveur) et on crée une nouvelle variable pour les appeler ultérieurement
		//(cette opération n'est pas obligatoire - on peut accéder par la suite à la variable par le tableau
		// on préfère pour des raisons de clareté de code copier la variable du tableau dans une variable (php)

		$local_idclient= $_GET['P_refidclient'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		echo $local_idclient."<br />"; // affichage pour contrôle avec un retour à la ligne (balise <br />).

		$index=SupprimerUtilisateur($conn1,$local_idclient); // appel de la fonction enregistreClient ; on passe en paramètre le nom du client (ici dans une variable)

		// fermeture de la connexion a la base de donnees.
		deconnexionBDD($conn1);
		header( "refresh:2;url=afficheUtilisateurs.php" );
		?>
		Fin code de suppresion de la reservation <?php echo $local_idclient ?>
		<br />
		<h2>Verifier que l'enregistrement est effectif dans la base de données (avec phpPgAdmin par exemple)<h2>
	</body>
</html>
