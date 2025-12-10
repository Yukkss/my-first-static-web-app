<?php
	session_start();  // démarrage d'une session
	session_destroy();
	header ("Location:index.php");
	exit();
?>