<?php
  //Affichage des erreurs php
  error_reporting(E_ALL);
  ini_set('display-errors','on');
  
  //démarrage des sessions
  if(session_id() == '') {
	  session_start();
	}
  
  //connexion à la bdd
  require_once 'cnxbdd.php';
  
  //récupération PROPRE des variables AVANT de les utiliser
  $login = !empty($_POST['login']) ? trim($_POST['login']) : NULL;
	$pass = !empty($_POST['pass']) ? trim($_POST['pass']) : NULL;

  $errMsg = array();
  
  //traitement du formulaire  
	if(isset($_POST['submit'])){
		$errMsg = '';
		//login and password sent from Form
		if(!$login){
			$errMsg[] = 'Veuillez entrer votre nom<br>';	
    }
	
		if(!$pass){
			$errMsg[] = 'Veuillez entrer votre mot de passe<br>';
    }
    
		if(empty($errMsg)){
      
      //preparation de la requete
      $sql = 'SELECT id,login,pass FROM  matable WHERE login = :login AND pass = :pass';
      $datas = array(':login'=>$login , ':pass'=>$pass);
      
      //execution de la requete
      try{
			  $records = $bdd->prepare($sql);
			  $records->execute($datas);
      }catch(Exception $e){
        echo "<p>Erreur : " . $e->getMessage() . "</p>";
        exit();
      }
			
      $results = $records->fetchAll(PDO::FETCH_ASSOC);
      
			if(count($results) > 0 ){
				$_SESSION['login'] = $results['login'];
				header('location:dashboard.php');
				exit();
			}else{
				$errMsg[] = 'Vérifiez vos identifiants de connexion<br>';
			}
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ADMIN | Accès</title>
	<style type="text/css">
	body
	{
		font-family:Arial, Helvetica, sans-serif;
		font-size:14px;
		background-image: url(../Images/nice.jpg);
		background-attachment: fixed;
		background-repeat: no-repeat;
		margin-top: 50px;

	}
	label
	{
		font-weight:bold;
		width:100px;
		font-size:14px;
		color: #FFFFFF;
	}
	.box
	{
		border:1px solid #006D9C;
		margin-left:10px;
		width:60%;
	}
	.submit{
		border:1px solid #f50c49;
		background-color:#f50c49;
		color:#FFFFFF;
		float:right;
		padding:2px;
		margin-right: 15px;
	}
	.tLink{
		font-size: 72px;
		color: #FFFFFF;
		font-family: Arial, Helvetica, sans-serif;
	}
	</style>
</head>
<body>

	<div align="center">
		<br />
		<div class="tLink"><strong>ADMINISTRATION</strong></div><br />
		<div style="width:300px; border: solid 1px #f50c49; " align="left">
			<?php
				if(!empty($errMsg)){
          echo '<div style="color:#FF0000;text-align:center;font-size:12px;">';
          foreach($errMsg as $err)
					  echo $err;
          }
          echo '</div>';
				}
			?>
			<div style="background-color:#f50c49; color:#FFFFFF; padding:3px;"><b>Authentification</b></div>
			<div style="margin:30px">
				<form action="" method="post">
					<label>Username:</label><input type="text" name="login" class="box"/><br /><br />
					<label>Password:</label><input type="password" name="pass" class="box" /><br/><br />
					<input type="submit" name='submit' value="Se connecter" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>