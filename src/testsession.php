<?php
    //On démarre une nouvelle session
    session_start();
    /*On utilise session_id() pour récupérer l'id de session s'il existe.
     *Si l'id de session n'existe  pas, session_id() rnevoie une chaine
     *de caractères vide*/
    $id_session = session_id();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            if($id_session){
                echo 'ID de session (récupéré via session_id()) : <br>'
                .$id_session. '<br>';
            }
            echo '<br><br>';
            if(isset($_COOKIE['PHPSESSID'])){
                echo 'ID de session (récupéré via $_COOKIE) : <br>'
                .$_COOKIE['PHPSESSID'];
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>