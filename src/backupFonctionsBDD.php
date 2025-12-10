<?php

function RechercheVehicule ($connex, $place, $type, $marque, $prixMin, $prixMax, $retrait) {

	$stmt = $connex->prepare("SELECT idvoiture, nomvoiture, modele, prixreservation FROM VOITURES 
	WHERE place = :place;
	AND type = :type;
	AND marque = :marque;
	AND prixreservation >= :prixMin;
	AND prixreservation <= :prixMax;");
	
	$stmt->bindParam(':place', $place);
	$stmt->bindParam(':type', $type);
	$stmt->bindParam(':marque', $marque);
	$stmt->bindParam(':prixMin', $prixMin);
	$stmt->bindParam(':prixMax', $prixMax);
	
	$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.
	
	return $stmt;     // retourne a l'appelant le resultat.
	
}

/*------------------ Walid---------------------------*/
function AjoutUtilisateur($connex, $nomclient, $prenomclient, $adresseclient, $contactclient, $emailclient, $usernameclient, $passwordclient, $typecompte) {

	$stmt = $connex->prepare("INSERT INTO CLIENTS(nom, prenom, adresse, contact, email, username, password, statutcompte,type) 
							  VALUES (:nomclient,:prenomclient,:adresseclient,:contactclient,:emailclient,:usernameclient,:passwordclient,1,:typecompte);");

	$stmt->bindParam(':nomclient', $nomclient);
	$stmt->bindParam(':prenomclient', $prenomclient);
	$stmt->bindParam(':adresseclient', $adresseclient);
	$stmt->bindParam(':contactclient', $contactclient, PDO::PARAM_INT);
	$stmt->bindParam(':emailclient', $emailclient);
	$stmt->bindParam(':usernameclient', $usernameclient);
	$stmt->bindParam(':passwordclient', $passwordclient);
	$stmt->bindParam(':typecompte', $typecompte);

	$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

	return $stmt;     // retourne a l'appelant le resultat.
}

function ModifierUtilisateur($connex,$idclient, $nomclient, $prenomclient, $adresseclient, $contactclient, $emailclient, $usernameclient, $passwordclient,$statutcompte, $typecompte) {
	
	
	$stmt = $connex->prepare("UPDATE CLIENTS SET nom=:nomclient, prenom=:prenomclient, adresse=:adresseclient, contact=:contactclient, email=:emailclient, username=:usernameclient, password=:passwordclient, statutcompte=:statutcompte,type=:typecompte WHERE idclient=:idclient;");
	
	
	$stmt->bindParam(':idclient', $idclient);
	$stmt->bindParam(':nomclient', $nomclient);
	$stmt->bindParam(':prenomclient', $prenomclient);
	$stmt->bindParam(':adresseclient', $adresseclient);
	$stmt->bindParam(':contactclient', $contactclient, PDO::PARAM_INT);
	$stmt->bindParam(':emailclient', $emailclient);
	$stmt->bindParam(':usernameclient', $usernameclient);
	$stmt->bindParam(':passwordclient', $passwordclient);
	$stmt->bindParam(':statutcompte', $statutcompte);
	$stmt->bindParam(':typecompte', $typecompte);

	$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

	return $stmt;     // retourne a l'appelant le resultat.
}


function ModifNomUtilisateur ($connex, $idclient, $nomclient){
		$stmt = $connex->prepare("UPDATE CLIENTS SET nom=:nomclient WHERE idclient=:idclient;");
		
		$stmt->bindParam(':idclient', $idclient);
		$stmt->bindParam(':nomclient', $nomclient);
		
		$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

		return $stmt;     // retourne a l'appelant le resultat.
}

function ModifPrenomUtilisateur ($connex, $idclient, $prenomclient){
		$stmt = $connex->prepare("UPDATE CLIENTS SET prenom=:prenomclient WHERE idclient=:idclient;");
		
		$stmt->bindParam(':idclient', $idclient);
		$stmt->bindParam(':prenomclient', $prenomclient);
		
		$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

		return $stmt;     // retourne a l'appelant le resultat.
}

function ModifAdresseUtilisateur ($connex, $idclient, $adresseclient){
		$stmt = $connex->prepare("UPDATE CLIENTS SET adresse=:adresseclient WHERE idclient=:idclient;");
		
		$stmt->bindParam(':idclient', $idclient);
		$stmt->bindParam(':adresseclient', $adresseclient);
		
		$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

		return $stmt;     // retourne a l'appelant le resultat.
}

function ModifNumeroUtilisateur ($connex, $idclient, $contactclient){
		$stmt = $connex->prepare("UPDATE CLIENTS SET contact=:contactclient WHERE idclient=:idclient;");
		
		$stmt->bindParam(':idclient', $idclient);
		$stmt->bindParam(':contactclient', $contactclient, PDO::PARAM_INT);
		
		$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

		return $stmt;     // retourne a l'appelant le resultat.
}

function ModifEmailUtilisateur ($connex, $idclient, $emailclient){
		$stmt = $connex->prepare("UPDATE CLIENTS SET email=:emailclient WHERE idclient=:idclient;");
		
		$stmt->bindParam(':idclient', $idclient);
		$stmt->bindParam(':emailclient', $emailclient);
		
		$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

		return $stmt;     // retourne a l'appelant le resultat.
}

function ModifUsernameUtilisateur ($connex, $idclient, $usernameclient){
		$stmt = $connex->prepare("UPDATE CLIENTS SET username=:usernameclient WHERE idclient=:idclient;");
		
		$stmt->bindParam(':idclient', $idclient);
		$stmt->bindParam(':usernameclient', $usernameclient);
		
		$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

		return $stmt;     // retourne a l'appelant le resultat.
}

function ModifPasswordUtilisateur ($connex, $idclient, $passwordclient){
		$stmt = $connex->prepare("UPDATE CLIENTS SET password=:passwordclient WHERE idclient=:idclient;");
		
		$stmt->bindParam(':idclient', $idclient);
		$stmt->bindParam(':passwordclient', $passwordclient);
		
		$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

		return $stmt;     // retourne a l'appelant le resultat.
}



function ModifStatutUtilisateur ($connex, $idclient, $statutcompte){
		$stmt = $connex->prepare("UPDATE CLIENTS SET statutcompte=:statutcompte WHERE idclient=:idclient;");
		
		$stmt->bindParam(':idclient', $idclient);
		$stmt->bindParam(':statutcompte', $statutcompte);
		
		$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

		return $stmt;     // retourne a l'appelant le resultat.
}
	
function ModifTypeUtilisateur ($connex, $idclient, $typecompte){
		$stmt = $connex->prepare("UPDATE CLIENTS SET type=:typecompte WHERE idclient=:idclient;");
		
		$stmt->bindParam(':idclient', $idclient);
		$stmt->bindParam(':typecompte', $typecompte);
		
		$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

		return $stmt;     // retourne a l'appelant le resultat.
}
function AjoutAdmin($connex, $nomadmin, $contactadmin, $emailadmin, $usernameadmin, $passwordadmin, $typecompte, $prenomadmin) {

	$stmt = $connex->prepare("INSERT INTO ADMIN(nom, contact, email, username, password, type, prenom, statutcompte) 
							  VALUES (:nomadmin, :contactadmin,:emailadmin,:usernameadmin,:passwordadmin,:typecompte,:prenomadmin,1);");

	$stmt->bindParam(':nomadmin', $nomadmin);
	$stmt->bindParam(':contactadmin', $contactadmin, PDO::PARAM_INT);
	$stmt->bindParam(':emailadmin', $emailadmin);
	$stmt->bindParam(':usernameadmin', $usernameadmin);
	$stmt->bindParam(':passwordadmin', $passwordadmin);
	$stmt->bindParam(':typecompte', $typecompte);
	$stmt->bindParam(':prenomadmin', $prenomadmin);
	

	$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

	return $stmt;     // retourne a l'appelant le resultat.
}

function SupprimerUtilisateur($connex, $idclient) { 
	
	 
	$stmt =$connex->prepare("DELETE FROM CLIENTS WHERE idclient=:idclient");               // déclaration de la variable appelee $sql. 
	$stmt->bindParam(':idclient', $idclient);
	
	$stmt->execute();


	return $stmt;                             // retourne a l'appelant le resultat. 
	
} 

function SupprimerAdmin($connex, $idadmin) { 
	
	 
	$stmt =$connex->prepare("DELETE FROM ADMIN WHERE idadmin=:idadmin");               // déclaration de la variable appelee $sql. 
	$stmt->bindParam(':idadmin', $idadmin);
	
	$stmt->execute();


	return $stmt;                             // retourne a l'appelant le resultat. 
	
}
function AfficheReservation($connex) { 
	
	 
	 
	$stmt =$connex->prepare("SELECT *
							FROM ((RESERVATIONS
							INNER JOIN VOITURES ON refidvoiture = idvoiture)
							INNER JOIN CLIENTS ON refidclient = idclient) ORDER BY datereservation");               // déclaration de la variable appelee $sql. 
	$stmt->execute();


	return $stmt;                             // retourne a l'appelant le resultat. 
	
}  	

function ValiderReservation($connex, $idreservation) { 
	
	 
	$stmt =$connex->prepare("UPDATE RESERVATIONS SET statutreservation = 'Validé' WHERE idreservation=:idreservation");               // déclaration de la variable appelee $sql. 
	$stmt->bindParam(':idreservation', $idreservation);
	
	$stmt->execute();


	return $stmt;                             // retourne a l'appelant le resultat. 
	
} 	

function SupprimerReservation($connex, $idreservation) { 
	
	 
	$stmt =$connex->prepare("DELETE FROM RESERVATIONS WHERE idreservation=:idreservation");               // déclaration de la variable appelee $sql. 
	$stmt->bindParam(':idreservation', $idreservation);
	
	$stmt->execute();


	return $stmt;                             // retourne a l'appelant le resultat. 
	
} 	
		

function AfficheReservationAValider($connex, $idreservation) { 
	
	$stmt =$connex->prepare("SELECT * FROM ((RESERVATIONS INNER JOIN VOITURES ON refidvoiture = idvoiture)
							INNER JOIN CLIENTS ON refidclient = idclient)WHERE idreservation=:idreservation");               // déclaration de la variable appelee $sql. 
	
	$stmt->bindParam(':idreservation', $idreservation);               // déclaration de la variable appelee $sql. 
	
	$stmt->execute();


	return $stmt;                             // retourne a l'appelant le resultat. 
	
}	

function AfficheUtilisateurs($connex) { 
	
	 
	 
	$stmt =$connex->prepare("SELECT * FROM CLIENTS");               // déclaration de la variable appelee $sql. 
	$stmt->execute();


	return $stmt;                             // retourne a l'appelant le resultat. 
	
} 

function AfficheUtilisateurAModifier($connex, $idclient) { 
	
	 
	 
	$stmt =$connex->prepare("SELECT * FROM CLIENTS WHERE idclient=:idclient");               // déclaration de la variable appelee $sql. 
	$stmt->bindParam(':idclient', $idclient);               // déclaration de la variable appelee $sql. 
	
	$stmt->execute();


	return $stmt;                             // retourne a l'appelant le resultat. 
	
}

function AfficheAdmins($connex) { 
	
	 
	 
	$stmt =$connex->prepare("SELECT * FROM ADMIN");               // déclaration de la variable appelee $sql. 
	$stmt->execute();


	return $stmt;                             // retourne a l'appelant le resultat. 
	
} 
/*------------------ FIN Walid---------------------------*/
function FiltreVoiture ($connex, $typevoiture, $place, $prixMin, $prixMax, $boitevite) {
	$stmt = $connex->prepare(" SELECT idvoiture, nomvoiture, desimg, prix ,boitevite, marque,place,typevoiture FROM VOITURES 
	WHERE place = :place;
	AND typevoiture = :typevoiture;
	AND boitevite = :boitevite';
	AND prix >= :prixMin;
	AND prix <= :prixMax;");
	
	$stmt->bindParam(':place', $place);
	$stmt->bindParam(':typevoiture', $typevoiture);
	$stmt->bindParam(':boitevite', $boitevite);
	$stmt->bindParam(':prixMin', $prixMin);
	$stmt->bindParam(':prixMax', $prixMax);
	
	$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.
	
	return $stmt; }
	



function VerifierDates ($connex, $start_date, $end_date) { 

	$stmt =$connex->prepare("SELECT datereservation,dateretour FROM reservations WHERE DATE(datereservation) >= :starter_date AND DATE(dateretour) <= :end_date"); 



	$stmt->bindParam(':starter_date', $start_date); 

	$stmt->bindParam(':end_date', $end_date);
	


	 

	$stmt->execute(); 

  

	return $stmt; 

} 

function ShowCarDispo ($connex) {

	$stmt = $connex->prepare("SELECT idvoiture, nomvoiture, desimg, prix ,boitevite, marque,place,typevoiture FROM VOITURES  WHERE idvoiture NOT IN (SELECT refidvoiture FROM RESERVATIONS)" );

	
	$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.
	
	return $stmt;   }  // retourne a l'appelant le resultat.

function ShowAllCar ($connex)
{
	$stmt = $connex->prepare("SELECT idvoiture, nomvoiture, desimg, prix ,boitevite,marque,place,typevoiture FROM VOITURES");
	
	$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.
	
	return $stmt; 
}

function FilterBoite($connex, $BoiteVite, $Vit) { 

	 

	$stmt =$connex->prepare("SELECT nomvoiture,desimg,place,prix,BoiteVite FROM voitures WHERE BoiteVite = $Vit "); 

  

	$stmt->bindParam(':BoiteVite', $BoiteVite); 

	$stmt->bindParam(':Vit', $Vit); 

  

	 

	$stmt->execute(); 

  

	return $stmt;
} 

function escape($valeur)
{
    // Convertit les caractères spéciaux en entités HTML
    return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
}

function ClientReserve ($connex,$client) {
	$stmt= $connex -> prepare("SELECT nom,prenom,contact, email FROM clients WHERE idclient=:idclient; ");
	$stmt -> bindParam(':idclient', $client);
	$stmt->execute();
	return $stmt;

}

function VoitureReserve ($connex,$idvoiture) {
	$stmt= $connex -> prepare("SELECT nomvoiture,marque,prix  FROM voitures WHERE idvoiture = :idvoiture; ");
	$stmt -> bindParam(':idvoiture', $idvoiture);
	$stmt->execute();
	return $stmt;

}

function AjoutReservation($connex, $start_date, $end_date,$idvoiture, $idclient, $pointretrait)
{
	$stmt= $connex-> prepare("INSERT INTO reservations(datereservation,dateretour,refidclient,refidvoiture,pointretrait,statutreservation 	) VALUES (:starter_date, :end_date, :idclient, :idvoiture, :poinretrait, 'En attente')");

	$stmt -> bindParam(':starter_date', $start_date);
	$stmt -> bindParam(':end_date', $end_date);
	$stmt -> bindParam(':idvoiture', $idvoiture);
	$stmt -> bindParam(':idclient', $idclient);
	$stmt -> bindParam(':pointretrait', $pointretrait);

	$stmt->execute();

	return $stmt;
}

function Filterprix($connex, $prix, $prixMax,$prixMin) {
		
		$stmt =$connex->prepare("SELECT nomvoiture,desimg,place,prix,BoiteVite FROM voitures WHERE prix >= :prixMin; AND prix <= :prixMax; ");
	
		$stmt->bindParam(':prix', $prix);
		$stmt->bindParam(':prixMax', $prixMax);
		$stmt->bindParam(':prixMin', $prixMin);
	
		
		$stmt->execute();
	
		return $stmt;
	}
function FilterPlaces($connex, $place, $NbrPlaces) {
		
		$stmt =$connex->prepare("SELECT nomvoiture,desimg,place,prix,BoiteVite FROM voitures WHERE place = :NbrPlaces ");
	
		$stmt->bindParam(':place', $place);
		$stmt->bindParam(':NbrPlaces', $NbrPlaces);
		
	
		
		$stmt->execute();
	
		return $stmt;
	}
	
	
function listerPointsRetraits($connex) { 
	
	 
	 
	
		   $stmt =$connex->prepare("SELECT idpointretrait, nompointretrait FROM pointretraits ORDER BY idpointretrait");               // déclaration de la variable appelee $sql. 
		   $stmt->execute();

	
		   return $stmt;                            // retourne a l'appelant le resultat. 
	
		}
function listerOptionsPlace($connex) { 
	
	 
	 
	
	$stmt =$connex->prepare("SELECT DISTINCT  place FROM VOITURES ORDER BY place");               // déclaration de la variable appelee $sql. 
	$stmt->execute();


	return $stmt;                            // retourne a l'appelant le resultat. 
	
		}
function listerOptionsBoiteVite($connex) { 
	
	 
	 
	
	$stmt =$connex->prepare("SELECT DISTINCT boitevite FROM VOITURES ORDER BY boitevite");               // déclaration de la variable appelee $sql. 
	$stmt->execute();


	return $stmt;                             // retourne a l'appelant le resultat. 
	
		}  
function listerOptionsCarroserie($connex) { 
	
	 
	 
	$stmt =$connex->prepare("SELECT DISTINCT  typevoiture FROM VOITURES ORDER BY typevoiture");               // déclaration de la variable appelee $sql. 
	$stmt->execute();


	return $stmt;                             // retourne a l'appelant le resultat. 
	
		}  	
?>