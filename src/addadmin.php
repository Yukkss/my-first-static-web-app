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
		Renseignez vos infomations de connexion
		<table border=1 bgcolor="#CCCCCC">
		<form method=""="GET" action="enregistreCompte.php">
		<tr>
			<td> Nom: </td>
			<td> <input type="text" size=20 name="P_nom" placeholder="Nom" title= "Chaine de caractères attendu; Max 50 caractères" pattern= "[a-zA-Z]{1,50}" required> </td>
		<tr>
			<td> Prénom: </td>
			<td> <input type="text" size=20 name="P_prenom" placeholder="Prénom " title= "Chaine de caractères attendu; Max 50 caractères" pattern= "[a-zA-Z]{1,50}" required></td>
		</tr>
		<tr>
			<td> Adresse: </td>
			<td> <input type="text" size=20 name="P_adresse" placeholder="Adresse" title= "Chaine de caractères attendu; Max 100 caractères" pattern= "[\da-zA-Z]{1,100}" required></td>
		</tr>
		<tr>
			<td> Téléphone: </td>
			<td> <input type="text" size=20 name="P_contact" placeholder="Numéro de téléphone" title= "Entier attendu; Max 10 caractères" pattern= "(0|\+33|0033)[1-9][0-9]{8}" required></td>
		</tr>
		<tr>
			<td> Email: </td>
			<td> <input type="text" size=20 name="P_email" placeholder="Adresse mail" title= "Chaine de caractères attendu; Max 100 caractères" pattern= "[\w-\.]+@([\w-]+\.)+[\w-]{2,4}" required></td>
		</tr>
		<tr>
			<td> Nom d'utilisateur: </td>
			<td> <input type="text" size=20 name="P_username" placeholder="Nom d'utilisateur" title= "Chaine de caractères attendu; Max 30 caractères; Caractères spéciaux non autorisé" pattern= "[\da-zA-Z]{1,30}" required></td>
		</tr>
		<tr>
			<td> Mot de passe: </td>
			<td> <input type="password" size=20 name="P_password" placeholder="Mot de passe" title= "Chaine de caractères attendu; Min 8 caractères avec au minimum une majuscule et minuscule, 1 chiffre et 1 caractère spécial; Max 30 caractères; " pattern= "(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,30}" required></td>
		</tr>
		<tr>
			<td> Type du compte </td>
			<td>
				<select class="custom-select" id="inputGroupSelect01" name="P_typecompte">
					<option selected>Choisir le type du compte</option>
					<option value="admin">Admin</option>
					<option value="user">Utilisateur</option>
				  </select>
			</td>
			<td> <input type="submit" value="Créez votre compte" /></td>
		</tr>
		</form>
		</table>

	</body>
</html>