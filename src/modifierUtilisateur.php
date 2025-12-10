<?php 
 session_start();
 if (isset($_SESSION['login']) && isset($_SESSION['passwd'])) {
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
	$typelogin = $_SESSION['type'];
 }
 if ($typelogin != "admin") {
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
    <header >
        
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
        <nav>
        <div class="menu">
            <button id="butmenu" onclick = "window.location.href='./admin.php';">MENU</button>
            <div class="menu-content">
                <a href="afficheReservations.php">Gérer les reservations </a>
                <a href="afficheUtilisateurs.php">Gérer les utilisateurs </a>                
            </div>

        </div>


    </header>


<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                       	<h1> Utilisateur à modifier</h1>
                    </div>
					<Table class="table table-hover">
						<thead class="thead-dark">
						<?php
						
							$local_idcompte= $_GET['P_refidcompte'] ; // création et affectation de la variable php avec l'info issue du formulaire de saisie

							$resultat=AfficheUtilisateurAModifier($conn1,$local_idcompte);
							$resu = $resultat->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.
							// Debut code pour affichage du resultat :
							//====================================================================
							//afficheTableau($resu);  // utilisation d'une fonction permettant d'afficher un résutlat de requête après un fetchall. Cette fonction est définie dans fonctionSys.php

							print "<tr><th scope='col'>Id du client</th>
									   <th scope='col'>Nom</th>
									   <th scope='col'>Prénom</th>
									   <th scope='col'>Adresse</th>
									   <th scope='col'>Numéro</th>
									   <th scope='col'>Adresse mail</th>
									   <th scope='col'>Nom d'utilisateur</th>
									   <th scope='col'>Mot de passe</th>
									   <th scope='col'>Statut du compte</th>
									   <th scope='col'>Type du compte</th>
									   </tr></thead>";
							foreach ($resu as $ligne) { // pour chaque ligne du tableau globale 2D (une ligne est vue comme un tableau 1D)
									echo "<tbody><tr><th scope='row'> ".$ligne["idclient"]."</th>
											<td>".$ligne["nom"]."</td>
											<td>".$ligne["prenom"]."</td>
											<td>".$ligne["adresse"]."</td>
											<td>".$ligne["contact"]."</td>
											<td>".$ligne["email"]."</td>
											<td>".$ligne["username"]."</td>
											<td>".$ligne["password"]."</td>
											<td>".$ligne["statutcompte"]."</td>
											<td>".$ligne["type"]."</td>
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
					<h5>Modification :</h5>
				</div>
				<div class="card-body">
					<div class="row">
					<div class="col-md-4 mb-3">
						<div class="border p-2">
									<form method=""="GET" action="ModificationUtilisateur.php">
									<tr>
										<td> Nom: <input type="text" size=20 name="P_nom" placeholder="Nom" title= "Chaine de caractères attendu; Max 50 caractères" pattern= "[a-zA-Z]{1,50}" > </td><br> </br>
										
										<td> Prénom: 
										<input type="text" size=20 name="P_prenom" placeholder="Prénom " title= "Chaine de caractères attendu; Max 50 caractères" pattern= "[a-zA-Z]{1,50}" ></td><br> </br>

										<td> Adresse: </td>
										<td> <input type="text" size=20 name="P_adresse" placeholder="Adresse" title= "Chaine de caractères attendu; Max 100 caractères" pattern= "[\da-zA-Z]{1,100}" ></td><br> </br>

										<td> Numéro: </td>
										<td> <input type="text" size=20 name="P_contact" placeholder="Numéro de téléphone" title= "Entier attendu; Max 10 caractères" pattern= "(0|\+33|0033)[1-9][0-9]{8}" ></td><br> </br>

										<td> Email: </td>
										<td> <input type="text" size=20 name="P_email" placeholder="Adresse mail" title= "Chaine de caractères attendu; Max 100 caractères" pattern= "[\w-\.]+@([\w-]+\.)+[\w-]{2,4}" ></td><br> </br>

										<td> Nom d'utilisateur: </td>
										<td> <input type="text" size=20 name="P_username" placeholder="Nom d'utilisateur" title= "Chaine de caractères attendu; Max 30 caractères; Caractères spéciaux non autorisé" pattern= "[\da-zA-Z]{1,30}" ></td><br> </br>

										<td> Mot de passe: </td>
										<td> <input type="password" size=20 name="P_password" placeholder="Mot de passe" title= "Chaine de caractères attendu; Min 8 caractères avec au minimum une majuscule et minuscule, 1 chiffre et 1 caractère spécial; Max 30 caractères; " pattern= "(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,30}"></td><br> </br>
										
										<input type="hidden" name="P_refidcompte"  value=<?php echo $local_idcompte ?>>

										<td> Statut du compte: </td>
										<?php 
										print'<select class="select" name="P_statutcompte">'; // envoyé comme paramètre dans le formulaire
										print '<option value=""> </option>';
										print '<option value="Activé"> Activé </option>';
										print '<option value="Désactivé"> Désactivé </option>';
										
										print "</select>";
										?>
										</tr>
									<br> <input class="btn btn-primary" type="submit" value="Modifier le compte"></br>
									</form>
						</div>
					</div>
					<div class="col-md-4 mb-3">
                         <div class="border p-2">
							<form method="GET" action="modifierUtilisateur.php">
								<p> Modifier un compte existant </p>
								 <?php
									 $resulta=AfficheUtilisateurs($conn1);
									 $resuTab = $resulta->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.
										print '<select class="select" name="P_refidcompte">'; // envoyé comme paramètre dans le formulaire
										foreach ($resuTab as $ligne) {
										print '<option value='.$ligne["idclient"].'>'.$ligne["idclient"].' - '.$ligne["username"].'</option>';
										}
										print "</select>";

											?>
									<br> <input class="btn btn-primary" type="submit" value="Modifier le compte"></br>
							</form>
						</div>
					</div>
					<div class="col-md-4 mb-3">
                        <div class="border p-2">
						<form method="GET" action="SupprimerUtilisateur.php">
						<p> Supprimer un compte </p>
						 <?php
							 $resulta=AfficheUtilisateurs($conn1);
							 $resuTab = $resulta->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.
								print '<select class="select" name="P_refidclient">'; // envoyé comme paramètre dans le formulaire
								foreach ($resuTab as $ligne) {
								print '<option value='.$ligne["idclient"].'>'.$ligne["idclient"].' - '.$ligne["username"].'</option>';
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