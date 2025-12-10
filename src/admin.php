<?php 
 session_start();
 if (isset($_SESSION['login']) && isset($_SESSION['passwd'])) {
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
	$typelogin = $_SESSION['type'];
	$idadmin = $_SESSION['idadmin'];
 }
 if ($typelogin == "user"){
	 header ("Location:premierPage.php");
 }
require_once 'fonctionsConnexion.php';  // déclaration du fichier contenant des fonctions pouvant être appelées 

require_once 'fonctionsBDD.php'; // délaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant  êre appelées 

 
 

$conn1=connexionBDD('paramCon.php');    // appel de la fonction connexionBDD. Le résultat retourné (un connecteur à la bdd) sera dans la variable $conn1 

// à partir d'ici, on est connecté à  la BDD acec le connecteur $conn1 

?> 
<html lang="fr"> 
<head>
    <meta charset="utf-8" />
    <meta name="Author" Content="Filippos MARKAKIS, Walid DAHI" />
    <link rel="stylesheet" href="./css/deafault.css" />
    <link rel="stylesheet" href="./css/layout.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./js/scripts.js"></script>	
	<title>Location Voiture: CousCous à la Grec </title>	
	<meta name="description" content="Site de Location Voiture " />
	<meta name="keywords" content="Location,Voiture,Annecy,haute,Savoie,Haute-Savoie,prix-bas,pas-cher,promo"/>
	
	
	

</head>
<body>
    <header >
        
    <div class="container">
        <div class="seconn">
		<?php if( isset($_SESSION['login']) && $_SESSION['passwd'] !== null ) : 
			echo "Bienvenue " . escape($login)."";
			?>
			<br></br>
			<button id="sedeconn" onclick = "window.location.href='./logout.php';">Se Déconnecter</button>
		  <?php else : ?>
			<button id="seconn" onclick = "window.location.href='./login.php';">Se Connecter</button>
		  <?php endif; ?>
		</div>
        
		<div class="menu">
            <button id="butmenu" onclick = "window.location.href='./admin.php';">Gérer les comptes</button>
            <div class="menu-content">
                <a href="afficheAdmins.php">Gérer les comptes admin </a>
                <a href="afficheUtilisateurs.php">Gérer les comptes utilisateurs </a>                
            </div>

        </div>
		
		<div class="menu">
            <button id="butmenu" onclick = "window.location.href='./afficheReservations.php';">Gérer les reservations</button>
        </div>   

    </nav>
    </div>

    </header>
    
</body>
</html>
<?php 

deconnexionBDD($conn1); // fermeture de connexion BDD 

?> 