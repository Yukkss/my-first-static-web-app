<?php 
 session_start();
 if (isset($_SESSION['login']) && isset($_SESSION['passwd'])) {
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
	$typelogin = $_SESSION['type'];
 }
 if ($typelogin == "user") {
	 header ("Location:premierPage.php");
 }
require_once 'fonctionsConnexion.php'; // déclaration du fichier contenant des fonctions pouvant être appelées
$conn1=connexionBDD('paramCon.php'); // appel de la fonction connexionBDD. Le résultat retourné sera dans la variable $conn1
// a partir d'ici, on est connecté à la BDD acec le connecteur $conn1

require_once 'fonctionsBDD.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

?>
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
        <nav>
		<div class="container">
        <div class="seconn">
		<?php if( isset($_SESSION['login']) && $_SESSION['passwd'] !== null ) : 
			echo "Bienvenue, " . escape($login)."";
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
        </div>
		</nav>
    </header>


<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                       	<h1> Liste des réservations	</h1>
                    </div>
					<Table class="table table-hover">
						<thead class="thead-dark">
						<?php

							$resultat=AfficheReservation($conn1);
							$resu = $resultat->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.
							// Debut code pour affichage du resultat :
							//====================================================================
							//afficheTableau($resu);  // utilisation d'une fonction permettant d'afficher un résutlat de requête après un fetchall. Cette fonction est définie dans fonctionSys.php

							print "<tr><th scope='col'>Id de réservation</th>
									   <th scope='col'>Date de réservation</th>
									   <th scope='col'>Heure de réservation</th>
									   <th scope='col'>Date retour</th>
									   <th scope='col'>Nom voiture</th>
									   <th scope='col'>Nom client</th>
									   <th scope='col'>Statut reservation</th>
									   <th scope='col'>Plaque d'immatriculation</th>
									   <th scope='col'>Marque</th>
									   <th scope='col'>Point retrait</th></tr></thead>";
							foreach ($resu as $ligne) { // pour chaque ligne du tableau globale 2D (une ligne est vue comme un tableau 1D)
									echo "<tbody><tr><th scope='row'> ".$ligne["idreservation"]."</th>
											<td>".$ligne["datereservation"]."</td>
											<td>".$ligne["heuredereservation"]."</td>
											<td>".$ligne["dateretour"]."</td>
											<td>".$ligne["nomvoiture"]."</td>
											<td>".$ligne["nom"]."</td>
											<td>".$ligne["statutreservation"]."</td>
											<td>".$ligne["marque"]."</td>
											<td>".$ligne["plaqueimmatriculation"]."</td>
											<td>".$ligne["pointretrait"]."</td>
											</tr>";       		// affichage (commande echo) sous forme d'un tableau html (tr, td).
							}
							
							// fin code affichage du résultat
							//====================================================================
							
						?>
					</table>
				</div>
			</div>
		</div>
 <div class="col-md-12 mt-4">
			<div class="card">
				<div class="card-header">
					<h5>Gestion des réservations</h5>
				</div>
				<div class="card-body">
					<div class="row">
					<div class="col-md-4 mb-3">
                         <div class="border p-2">
							<form method="GET" action="AfficheReservationAValider.php">
								<p>Valider une resérvation </p>
								 <?php
								 $resulta=AfficheReservation($conn1);
								 $resuTab = $resulta->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.
									print '<select class="select" name="P_refidreservation">'; // envoyé comme paramètre dans le formulaire
									foreach ($resuTab as $ligne) {
									print '<option value='.$ligne["idreservation"].'>'.$ligne["idreservation"].' - '.$ligne["nom"].' '.$ligne["prenom"].' : '.$ligne["statutreservation"].'</option>';
									}
									print "</select>";

											?>
									<br> <input class="btn btn-primary" type="submit" value="Valider la réservation"></br>
							</form>
						</div>
					</div>
					<div class="col-md-4 mb-3">
                         <div class="border p-2">
							<form method="GET" action="modifierReservation.php">
								<p> Modifier une resérvation </p>
								 <?php
								 $resulta=AfficheReservation($conn1);
								 $resuTab = $resulta->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.
									print '<select class="select" name="P_refidreservation">'; // envoyé comme paramètre dans le formulaire
									foreach ($resuTab as $ligne) {
									print '<option value='.$ligne["idreservation"].'>'.$ligne["idreservation"].' - '.$ligne["nom"].' '.$ligne["prenom"].' : '.$ligne["statutreservation"].'</option>';
									}
									print "</select>";

											?>
									<br> <input class="btn btn-primary" type="submit" value="Modifier la réservation"></br>
							</form>
						</div>
					</div>
					<div class="col-md-4 mb-3">
                        <div class="border p-2">
						<form method="GET" action="AfficheReservationASupprimer.php">
						<p> Supprimer une resérvation </p>
						 <?php
					 $resulta=AfficheReservation($conn1);
					 $resuTab = $resulta->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.
						print '<select class="select" name="P_refidreservation">'; // envoyé comme paramètre dans le formulaire
						foreach ($resuTab as $ligne) {
						print '<option value='.$ligne["idreservation"].'>'.$ligne["idreservation"].' - '.$ligne["nom"].' '.$ligne["prenom"].' : '.$ligne["statutreservation"].'</option>';
						}
						print "</select>";

								?>
							<br> <input class="btn btn-primary" type="submit" value="Supprimer la réservation"></br>
						 		
						</form>
						</div>
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