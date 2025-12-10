<?php
require_once 'fonctionsConnexion.php'; // déclaration du fichier contenant des fonctions pouvant être appelées
$conn1=connexionBDD('paramCon.php'); // appel de la fonction connexionBDD. Le résultat retourné sera dans la variable $conn1
// a partir d'ici, on est connecté à la BDD acec le connecteur $conn1

require_once 'fonctionsBDD.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)


session_start();  // démarrage d'une session

// on vérifie que les données du formulaire sont présentes
if (isset($_POST['login']) && isset($_POST['passwd'])) {
    $requete = "SELECT * FROM CLIENTS WHERE username=? AND password=?";
    $resultat = $conn1->prepare($requete);
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];
    $resultat->execute(array($login, $passwd));
    if ($resultat->rowCount() == 1) {
		while ($donnees = $resultat->fetch()){
			echo $donnees['idclient'];
			$_SESSION['idclient'] = $donnees['idclient'];
		}
        // l'utilisateur existe dans la table
        // on ajoute ses infos en tant que variables de session
        $_SESSION['login'] = $login;
        $_SESSION['passwd'] = $passwd;
		$_SESSION['type'] = "user";
		
        // cette variable indique que l'authentification a réussi
        $authOK = true;
			
		}
	}	


if (isset($_POST['login']) && isset($_POST['passwd'])) {
    $requete = "SELECT * FROM ADMIN WHERE username=? AND password=?";
    $resultat = $conn1->prepare($requete);
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];
    $resultat->execute(array($login, $passwd));
    if ($resultat->rowCount() == 1) {
		while ($donnees = $resultat->fetch()){
			echo $donnees['idadmin'];
			$_SESSION['idadmin'] = $donnees['idadmin'];
		}
        // l'utilisateur existe dans la table
        // on ajoute ses infos en tant que variables de session
        $_SESSION['login'] = $login;
        $_SESSION['passwd'] = $passwd;
		$_SESSION['type'] = "admin";
        // cette variable indique que l'authentification a réussi
        $authadmOK = true;
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Résultat de l'authentification</title>
</head>
<body>
    <h1>Résultat de l'authentification</h1>
    <?php
    if (isset($authOK)) {
		header ("Location:index.php");
    }
	elseif (isset($authadmOK)) {
		header ("Location:admin.php");
    }
    else { ?>
        <p>Vous n'avez pas été reconnu(e)</p>
        <p><a href="login.php">Nouvel essai</p>
    <?php } ?>
</body>
</html>