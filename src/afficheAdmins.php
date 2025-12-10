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
                       	<h1> Liste des admins	</h1>
                    </div>
					<Table class="table table-hover">
						<thead class="thead-dark">
						<?php
							/*$local_place=filtrePlace($_GET["place"]); // récupération et filtrage de la place du véhicule
							$local_typeVehicule=filtreType($_GET["typeVehicule"]); // récupération et filtrage du type du véhicule
							$local_marque=filtreMarque($_GET["typeVehicule"]); // récupération et filtrage du type du véhicule
							if ($local_place == null || $local_typeVehicule == null){
								print "<br>Pas conforme</br>";}
							else{
									*/
							$resultat=AfficheAdmins($conn1);
							$resu = $resultat->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.
							// Debut code pour affichage du resultat :
							//====================================================================
							//afficheTableau($resu);  // utilisation d'une fonction permettant d'afficher un résutlat de requête après un fetchall. Cette fonction est définie dans fonctionSys.php

							print "<tr><th scope='col'>Id de l'admin</th>
									   <th scope='col'>Nom</th>
									   <th scope='col'>Prénom</th>
									   <th scope='col'>Numéro</th>
									   <th scope='col'>Adresse mail</th>
									   <th scope='col'>Nom d'utilisateur</th>
									   <th scope='col'>Mot de passe</th>
									   <th scope='col'>Statut du compte</th>
									   </tr></thead>";
							foreach ($resu as $ligne) { // pour chaque ligne du tableau globale 2D (une ligne est vue comme un tableau 1D)
									echo "<tbody><tr><th scope='row'> ".$ligne["idadmin"]."</th>
											<td>".$ligne["nom"]."</td>
											<td>".$ligne["prenom"]."</td>
											<td>".$ligne["contact"]."</td>
											<td>".$ligne["email"]."</td>
											<td>".$ligne["username"]."</td>
											<td>".$ligne["password"]."</td>
											<td>".$ligne["statutcompte"]."</td>
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
					<h5>Gestion des comptes</h5>
				</div>
				<div class="card-body">
					<div class="row">
					<div class="col-md-4 mb-3">
                         <div class="border p-2">
						 <p>Créer un nouveau compte </p>
							<a href="addadmin.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Créer un nouveau compte</a>
						</div>
					</div>
					<div class="col-md-4 mb-3">
                         <div class="border p-2">
							<form method="GET" action="modifAdmin.php">
								<p> Modifier un compte existant </p>
								 <?php
								 $resulta=AfficheAdmins($conn1);
								 $resuTab = $resulta->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.
									print '<select class="select" name="P_refidcompte">'; // envoyé comme paramètre dans le formulaire
									foreach ($resuTab as $ligne) {
									print '<option value='.$ligne["idadmin"].'>'.$ligne["idadmin"].' - '.$ligne["username"].'</option>';
									}
									print "</select>";

											?>
								<br> <input class="btn btn-primary" type="submit" value="Modifier le compte"></br>
							</form>
						</div>
					</div>
					<div class="col-md-4 mb-3">
                        <div class="border p-2">
						<form method="GET" action="SupprimerAdmin.php">
						<p> Supprimer un compte </p>
						 <?php
							 $resulta=AfficheAdmins($conn1);
							 $resuTab = $resulta->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.
								print '<select class="select" name="P_refidadmin">'; // envoyé comme paramètre dans le formulaire
								foreach ($resuTab as $ligne) {
								print '<option value='.$ligne["idadmin"].'>'.$ligne["idadmin"].' - '.$ligne["username"].'</option>';
								}
								print "</select>";

						?>
						 <br> <input class="btn btn-primary" type="submit" value="Supprimer le compte"></br>
						 		
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