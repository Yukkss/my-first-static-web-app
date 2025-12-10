<?php
require_once 'fonctionsBDD.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
session_start();  // démarrage d'une session

// on vérifie que les variables de session identifiant l'utilisateur existent
if (isset($_SESSION['login']) && isset($_SESSION['passwd'])) {
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
}

?>

<html lang="fr"> 
<head>
	
    <meta charset="utf-8" />
    <meta name="Author" Content="Filippos MARKAKIS, Walid DAHI" />
    <link rel="stylesheet" href="css/deafault.css" />
    <link rel="stylesheet" href="css/layout.css" />
    <link rel="stylesheet" href="css/style.css" />	
	<title>Location Voiture: CousCous à la Grec </title>	
	<meta name="description" content="Site de Location Voiture " />
	<meta name="keywords" content="Location,Voiture,Annecy,haute,Savoie,Haute-Savoie,prix-bas,pas-cher,promo"/>
	


</head>
<body>
    <header>
		<div class="user-widget">
		  <?php if( isset($_SESSION['login']) && $_SESSION['passwd'] !== null ) : 
			echo "Bienvenue, " . escape($login)."";
			?>
			<br></br>
			<a href="logout.php">Se déconnecter</a>
		  <?php else : ?>
			<a href="login.php">Se connecter</a>
		  <?php endif; ?>
		</div>
        <div class="menu">
            <button id="butmenu">MENU</button>
            <div class="menu-content">
                <a>Recherche</a>
                <a>Contact</a>
                <a>Points de retrait</a>
            </div>

        </div>
    </div>


    </header>
<form method="get" action="../aficheRecherche.php">
    <div id="filtres">
        <div id="places">
            <ul>
                <H2> Nombre de Places</H2>
                <li><input type="radio" name="place"> 2 Places </li>
                <li><input type="radio" name="place"> 4 Places </li>
                <li><input type="radio" name="place"> 5 Places </li>
                <li><input type="radio" name="place"> 7+ Places </li>
            </ul>


        </div>

        
        <div id="type">
            <ul>
                <h2>Type de Voiture</h2>
                <li><input type="checkbox" name="Quatre">4X4</li>
                <li><input type="checkbox" name="Berline">Berline</li>
                <li><input type="checkbox" name="Citadine">Citadine</li>
                <li><input type="checkbox" name="Coupe">Sport/Coupe</li>
                <li><input type="checkbox" name="Break">Break/Familiale</li>
                <li><input type="checkbox" name="Roadster">Roadster</li>
                

            </ul>
        </div>
        <div id="marque">
            <ul>
                <h2>Marque</h2>
                <li><input type="checkbox" name="Audi">Audi</li>
                <li><input type="checkbox" name="Bmw">BMW</li>
                <li><input type="checkbox" name="Chevrolet">Chevrolet</li>
                <li><input type="checkbox" name="Citroen">Citroen</li>
                <li><input type="checkbox" name="Dacia">Dacia</li>
                <li><input type="checkbox" name="Fiat">Fiat</li>
                <li><input type="checkbox" name="Ford">Ford</li>
                <li><input type="checkbox" name="Honda">Honda</li>
                <li><input type="checkbox" name="Hyundai">Hyundai</li>
                <li><input type="checkbox" name="Jeep">Jeep</li>
                <li><input type="checkbox" name="LandRover">Land-Rover</li>
                <li><input type="checkbox" name="Lexus">Lexus</li>
                <li><input type="checkbox" name="Mazda">Mazda</li>
                <li><input type="checkbox" name="Mercedes">Mercedes-Benz</li>
                <li><input type="checkbox" name="Mini">Mini</li>
                <li><input type="checkbox" name="Peugeot">Peugeot</li>
                <li><input type="checkbox" name="VW">VolskWagen</li>
            </ul>
        </div>
        <div id="Carburant">
            <ul>
                <h2>Type de Carburant </h2>
                <li><input type="checkbox" name="Petrol">SP-98/95</li>
                <li><input type="checkbox" name="Diesel">Gazoile</li>
                <li><input type="checkbox" name="Hybride">Hybride</li>
                <li><input type="checkbox" name="Elec">Electrique</li>
            </ul>
        </div>
        <div id="prix">
            <ul >
                <h2> Prix</h2>
                
                <li><input type="text" name="PrixBas" placeholder="Prix le plus bas en €" pattern="[0-9]{2-3}+" required></li>
                <li><input type="text" name="PrixHaut" placeholder="Prix le plus Haut en €" pattern="[0-9]{2-3}+" required></li>

            </ul>


        </div>
        <div id="pointRetrait">
            <label for="point"> Velleur Choisir un Point De retrait</label>
            <select name="point" id="slcretrait">
                <option value="Aeroport">Aeroport</option>
                <option value="CentreComercial">Centre Comercial</option>
                <option value="Gare">Gare de Train </option>
            </select>

        </div>



    </div>
</form>






</body>

</html>