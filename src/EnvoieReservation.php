<?php

session_start();
 if (isset($_SESSION['login']) && isset($_SESSION['passwd'])) {
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
	$typelogin = $_SESSION['type'];
	$idclient = $_SESSION['idclient'];
	$start_date = $_SESSION['start_date'];
    $end_date = $_SESSION['end_date'];

 }
?>

<?php
require_once 'fonctionsConnexion.php'; 	// déclaration du fichier contenant des fonctions pouvant être appelées
require_once 'fonctionsBDD.php'; // délaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant  êre appelées

$conn1=connexionBDD('paramCon.php'); 	// appel de la fonction connexionBDD. Le résultat retourné (un connecteur à la bdd) sera dans la variable $conn1
// à partir d'ici, on est connecté à  la BDD acec le connecteur $conn1
?>
<!--Debut de html on cree le site pour le client  -->
<html lang="fr"> 
<head>
    <meta charset="utf-8" />
    <meta name="Author" Content="Filippos MARKAKIS, Walid DAHI" />
    <link rel="stylesheet" href="./css/deafault.css" />
    <link rel="stylesheet" href="./css/layout.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>	
	<title>Location Voiture: CousCous à la Grec </title>	
	<meta name="description" content="Site de Location Voiture " />
	<meta name="keywords" content="Location,Voiture,Annecy,haute,Savoie,Haute-Savoie,prix-bas,pas-cher,promo"/>
	
	
	

</head>
<?php if( isset($_SESSION['login']) && $_SESSION['passwd'] !== null ) : 
			echo "Bienvenue, " . escape($login)."";
      ?>
			<br></br>
			<button  class="btn btn-primary" id="sedeconn" onclick = "window.location.href='./logout.php';">Se Déconnecter</button>
		  <?php else : ?>
			<button  class="btn btn-primary" id="seconn" onclick = "window.location.href='./login.php';">Se Connecter</button>
		  <?php endif; ?>
          <div class="menu">
            <button id="butmenu">MENU</button>
            <div class="menu-content">
            <a href="./index.php">Recherche</a>
            <a href="./monCompte.php">Mon Compte</a>
                
            </div>

        </div>

<h1>Votre Reservation à été envoiyé avec sucsses</h1>
<a class="btn btn-primary" href="./premierPage.php" role="button">Page Principal</a>
<?php
        $local_idvoiture= $_GET['P_idvoiture'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		 // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$local_idclient= $_GET['P_idclient'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		 // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$local_start_date= $_GET['P_start_date'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		// affichage pour contrôle avec un retour à la ligne (balise <br />).
		$local_end_date= $_GET['P_end_date'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		 // affichage pour contrôle avec un retour à la ligne (balise <br />).
		$local_point= $_GET['P_refidpointretraits'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie
		// affichage pour contrôle avec un retour à la ligne (balise <br />).
        
        $ReservationADD = AjoutReservation($conn1, $local_start_date, $local_end_date,$local_idvoiture, $local_idclient, $local_point);
        ?>
</html>
<?php 

deconnexionBDD($conn1); // fermeture de connexion BDD 

?>