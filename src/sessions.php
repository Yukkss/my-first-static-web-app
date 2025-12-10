<?php 

 session_start(); 
?>
<?php

require_once 'fonctionsConnexion.php'; 	// déclaration du fichier contenant des fonctions pouvant être appelées
require_once 'fonctionsBDD.php'; // délaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant  êre appelées

$conn1=connexionBDD('paramCon.php'); 	// appel de la fonction connexionBDD. Le résultat retourné (un connecteur à la bdd) sera dans la variable $conn1
// à partir d'ici, on est connecté à  la BDD acec le connecteur $conn1
?>
<html>
	<head>
		<title> Formulaire de saisie de commande </title>
		<meta charset="utf-8"/>
	</head>
	<body>
	<form method="GET" action="Page2sessions.php">
		<center>
			<h1> Formulaire : Nouvelle commande</h1>
			

		
        <?php

        $resultat=listerClients($conn1);
        $resuTab = $resultat->fetchAll();
		
        print '<select name="P_nomvoiture">'; // envoyé comme paramètre dans le formulaire
        foreach ($resuTab as $ligne) {
                print '<option value='.$ligne["nomvoiture"].'>'.$ligne["nomvoiture"].'</option>';
                
        }
        print "</select>";
       
		
        ?>
			&nbsp;
			<input type = "submit" value= "Envoyer">
		<center>
		</form>
	</body>
</html>
<?php
deconnexionBDD($conn1); // fermeture de connexion BDD
?>


