<?php 

session_start();
 if (isset($_SESSION['login']) && isset($_SESSION['passwd'])) {
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
	$typelogin = $_SESSION['type'];
	if (isset($_SESSION['idclient'])){
	$idclient = $_SESSION['idclient'];
	}
	
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
<body>
    <header >
    <div class="container">
        <div class="seconn">
		<?php if( isset($_SESSION['login']) && $_SESSION['passwd'] !== null ) : 
			echo "Bienvenue, " . escape($login)."";
			?>
			<br></br>
			<button  class="btn btn-primary"  id="sedeconn" onclick = "window.location.href='./logout.php';">Se Déconnecter</button>
		  <?php else : ?>
			<button  class="btn btn-primary" id="seconn" onclick = "window.location.href='./login.php';">Se Connecter</button>
		  <?php endif; ?>
		</div>
        <div class="menu">
            <button id="butmenu">MENU</button>
            <div class="menu-content">
            <a href="./index.php">Recherche</a>
            <a href="./monCompte.php">Mon Compte</a>
                
            </div>

        </div>
    </div>


    </header>


<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4> DATES </h4>
                    </div>
                    <div class="card-body">

                        <form action="rechercheVoiture.php" method="GET">
                            <div class="row">
								<div class="col-md-4">
                                    <label for="">Date debut Location</label>
                                    <input name="P_start_date" type="date" id="date" onload="getDate()" class="form-control" required>
                                </div>
							    <div class="col-md-4">
                                    <label for="">Date Fin Location</label>
                                    <input name="P_end_date" type="date" id="date" onload="getDate()" class="form-control" required >
                                </div>
								
                                <div class="col-md-4">
                                     <br/>
                                    <button type="submit" name="recherche" class="btn btn-primary px-4">Rechercher</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>




<div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Nos voitures</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <?php 
                                            
                        // la fonction verifier si les dates choisi par le client sont disponibles et quelles voitures sont disponibles 
						$AcfficheVoiture = ShowAllCar ($conn1);   
                        



                        foreach($AcfficheVoiture as $items)
                        {
                            // 
                            ?>
                            <div class="col-md-4 mb-3">
                            <div class="border p-2">             
                                
                                <h5>Modele : <?php echo $items['nomvoiture']; ?></h5>
                                <h5>Marque : <?php echo $items['marque']; ?></h5>
                                <h6>Prix: <?php echo $items['prix']; print ' € / par Jour ' ?></h6>
                                <h6>Nombre de places : <?php echo $items['place']; ?></h6>
                                <h6>Type Carrosserie : <?php echo $items['typevoiture']; ?></h6>
                                <h6>Boite de Vitesses: <?php echo $items['boitevite']; ?></h6>
                                <?php print '<img src="'.$items['desimg']; print '"'; print 'class="img-fluid"';   print '>';?>
                                <h6>Numero de reference : <?php echo $items['idvoiture']; ?></h6>
                                
                                </form>
                            </div>
                            </div>
                            <?php
                        }
                        ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
 

</html>
<?php 

deconnexionBDD($conn1); // fermeture de connexion BDD 

?> 
