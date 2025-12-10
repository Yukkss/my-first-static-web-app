
<?php

require_once 'fonctionsConnexion.php'; 	// déclaration du fichier contenant des fonctions pouvant être appelées
require_once 'fonctionsBD.php'; // délaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant  êre appelées

$conn1=connexionBDD('paramCon.php'); 	// appel de la fonction connexionBDD. Le résultat retourné (un connecteur à la bdd) sera dans la variable $conn1
// à partir d'ici, on est connecté à  la BDD acec le connecteur $conn1
?>
<html lang="fr"> 
<head>
    <meta charset="utf-8" />
    <meta name="Author" Content="Filippos MARKAKIS, Walid DAHI" />
    <link rel="stylesheet" href="./css/deafault.css" />
    <link rel="stylesheet" href="./css/layout.css" />
    <link rel="stylesheet" href="./css/style.css" />	
	<title>Location Voiture: CousCous à la Grec </title>	
	<meta name="description" content="Site de Location Voiture " />
	<meta name="keywords" content="Location,Voiture,Annecy,haute,Savoie,Haute-Savoie,prix-bas,pas-cher,promo"/>
	
	
	

</head>
<body>
    <header >
        
    <div class="container">
        <div class="seconn">
            <button id="seconn" ahref="connexion.php">Se Connecter</button>
        </div>
        <nav>
        <div class="menu">
            <button id="butmenu">MENU</button>
            <div class="menu-content">
                <a>Recherche</a>
                <a>Contact</a>                
            </div>

        </div>
    </nav>
    </div>

    </header>
    
    <div id="container">
        <form method ="GET" action="rechercheVoiture.php">
            <h2>Date Debut Location</h2>
            <div id="PriseDate">
                
                <tr>				
                    <?php
					$local_date=($_GET["start_date"]); // récupération et filtrage du prix
					$local_date=pg_escape_string($local_prix);
					$resultat=rechercheArticleSecureRechercheDate($conn1,$local_date);
					$resu = $resultat->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.

					// Debut code pour affichage du resultat :
					//====================================================================
					//afficheTableau($resu);  // utilisation d'une fonction permettant d'afficher un résutlat de requête après un fetchall. Cette fonction est définie dans fonctionSys.php
                    if (mysqli_num_rows($result) > 0) { 

                        echo "The date is not available."; 
                
                    } else { 
                
                        echo "The date is available."; 
                
                    } 
					
				

					// fin code affichage du résultat
					//====================================================================
					deconnexionBDD($conn1); // fermeture de la connexion $conn1
				?>

                    <td><input type="date"></td>
                    <td><input type="time" id="heurePrise" min="09:00" max="18:00" step="1800" required></td>
                    <td> <select name="point" id="slcprise">
                        <option value="Aeroport">Aeroport</option>
                        <option value="CentreComercial">Centre Comercial</option>
                        <option value="Gare">Gare de Train </option>
                    </select></td>
                </tr>
            </div>

            
            <h2>Date Fin Location</h2>
            <div id="RetourDate">
                
                <tr>
                    <td><input type="date"> </td>
                    <td><input type="time" id="heurePrise" min="09:00" max="18:00" step="1800" required></td>
                    <td> <select name="point" id="slcprise">
                        <option value="Aeroport">Aeroport</option>
                        <option value="CentreComercial">Centre Comercial</option>
                        <option value="Gare">Gare de Train </option>
                    </select></td>
                </tr>
            </div>
        <div id="Envoie">
        <tr>
            <td><input type="submit" value="Rechercher des voitures disponibles"> </td>
            
        </tr>
    </div>
            

        </form>

    </div>
</body>