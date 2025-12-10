<?php 

session_start();
 if (isset($_SESSION['login']) && isset($_SESSION['passwd'])) {
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
	$typelogin = $_SESSION['type'];
	$idclient = $_SESSION['idclient'];
	$start_date = $_SESSION['start_date'];
    $end_date = $_SESSION['end_date'];
 }else{
	 header ("Location:login.php");
 }
 
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
<body>
    <header >
    <div class="container">
        <div class="seconn">
		<?php if( isset($_SESSION['login']) && $_SESSION['passwd'] !== null ) : 
			echo "Bienvenue, " . escape($login). "  Les Date Chosi Sont : " .escape($start_date). " ET : ".escape($end_date)."";
			?>
			<br></br>
			<button  class="btn btn-primary" id="sedeconn" onclick = "window.location.href='./logout.php';">Se Déconnecter</button>
		  <?php else : ?>
			<button  class="btn btn-primary" id="seconn" onclick = "window.location.href='./login.php';">Se Connecter</button>
		  <?php endif; ?>
		</div>
        <div class="menu">
            <button id="butmenu">MENU</button>
            <div class="menu-content">
            <a href="./index.php">Recherche</a>
            <a href="">Mon Compte</a>
                
            </div>

        </div>
    </div>


    </header>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4> <a class="btn btn-primary" href="./index.php" role="button">Nouvelle Recherche</a> </h4>
                    </div>




<div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Voiture Disponibles</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">  
                    <?php                 
                        
                        $local_prix_max= $_GET["P_prixMax"]; // récupération et filtrage de parametre
                        

                        $local_prix_min= $_GET["P_prixMin"]; // récupération et filtrage de parametre
                       

                        $local_place= $_GET["P_place"] ; // récupération et filtrage de parametre
                        

                        $local_boitevite= $_GET["P_boitevite"]; // récupération et filtrage de parametre
                        

                        $local_typevoiture= $_GET["P_typevoiture"]; // récupération et filtrage de parametre
                        

                      //  $local_pointretraits=($_GET["P_refidpointretraits"]); // récupération et filtrage de parametre
                        

                      ?>
                         <?php                     
                         // la fonction verifier si les dates choisi par le client sont disponibles et quelles voitures sont disponibles 
                        $ShowAllCarFiltre = ShowAllCarFiltre ($conn1, $local_typevoiture, $local_place, $local_prix_min, $local_prix_max, $local_boitevite);
                        $afficheVoiture = FiltreVoiture ($conn1, $local_typevoiture, $local_place, $local_prix_min, $local_prix_max, $local_boitevite);
                        $VerifDates = VerifierDates ($conn1, $start_date, $end_date);
						
						
                        if($VerifDates->rowCount() > 0 && isset($_GET['recherche']))
                         {	
							if ($afficheVoiture->rowCount() == 0) {
							print "Aucune voiture à afficher";
							}else{
                            foreach($afficheVoiture as $items)
                            {
                                
                               
                                ?>
                                <div class="col-md-4 mb-3">
                                <div class="border p-2">
                                <form action="reserve.php" method="GET">
                                    
                                    <h5> Modele : <?php echo $items['nomvoiture']; ?></h5>
                                    <h5>Marque : <?php echo $items['marque']; ?></h5>
                                    <h6>Prix: <?php echo $items['prix']; print ' € / par Jour ' ?></h6>
                                    <h6>Nombre de places : <?php echo $items['place']; ?></h6>
                                    <h6>Type Carrosserie : <?php echo $items['typevoiture']; ?></h6>
                                    <h6>Boite de Vitesses: <?php echo $items['boitevite']; ?></h6>
                                    <?php print '<img src="'.$items['desimg']; print '"'; print 'class="img-fluid"';   print '>';?>
                                    <h6>Numero de reference: <?php echo $items['idvoiture']; ?></h6>
                                    <input type="hidden" name="P_idvoiture"  value=<?php echo $items['idvoiture'] ?>>
                                    
                                    <input type="submit"  value="RESERVER MAINTENANT !">
                                    </form> 
                                </div>
                                </div>
                                <?php
                            }
                        }
						 }
                        else 
                        {	
							if ($ShowAllCarFiltre->rowCount() == 0) {
							print "Aucune voiture à afficher";
							}else{
                            foreach($ShowAllCarFiltre as $items)
                            {
                                
                                ?>
                                <div class="col-md-4 mb-3">
                                <div class="border p-2">
                                <form action="reserve.php" method="GET">
                                    
                                    <h5>Modele : <?php echo $items['nomvoiture']; ?></h5>
                                    <h5>Marque : <?php echo $items['marque']; ?></h5>
                                    <h6>Prix: <?php echo $items['prix']; print ' € / par Jour ' ?></h6>
                                    <h6>Nombre de places : <?php echo $items['place']; ?></h6>
                                    <h6>Type Carrosserie : <?php echo $items['typevoiture']; ?></h6>
                                    <h6>Boite de Vitesses: <?php echo $items['boitevite']; ?></h6>
                                    <?php print '<img src="'.$items['desimg']; print '"'; print 'class="img-fluid"';   print '>';?>
                                    <h6>Numero de reference: <?php echo $items['idvoiture']; ?></h6>
                                    <input type="hidden" name="P_idvoiture"  value=<?php echo $items['idvoiture'] ?>>
                                    <input type="submit" value="RESERVER MAINTENANT">
                                    </form>
                                </div>
                                </div>
                                <?php
                            }
                        }
						}
                            ?>
    
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    
    </body>

</body>
 

</html>
<?php 

deconnexionBDD($conn1); // fermeture de connexion BDD 

?> 
