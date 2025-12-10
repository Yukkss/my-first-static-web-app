<?php 

 session_start(); 
 echo $_SESSION['end_date'];
 print "Session start date =";
 echo $_SESSION['start_date'];
 print "Session end date =";
 echo $_SESSION['end_date'];
 
?>
<?php
require_once 'fonctionsConnexion.php'; 	// déclaration du fichier contenant des fonctions pouvant être appelées
require_once 'fonctionsBDD.php'; // délaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant  êre appelées

$conn1=connexionBDD('paramCon.php'); 	// appel de la fonction connexionBDD. Le résultat retourné (un connecteur à la bdd) sera dans la variable $conn1
// à partir d'ici, on est connecté à  la BDD acec le connecteur $conn1
?>
		<?php
            print "Session start date =";
            echo $_SESSION['start_date'];
            print "Session end date =";
            echo $_SESSION['end_date'];

            



		?>