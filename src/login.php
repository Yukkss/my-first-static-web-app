<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <h1>Connexion utilisateur</h1>
        <form action="login_post.php" method="post">
            <label for="login">login :</label>
            <input type="text" name="login" id="login" required />
            <label for="passwd">Mot de passe :</label>
            <input type="password" name="passwd" id="passwd" required />
            <input type="submit" value="Connexion">
			<a href="adduser.html">Vous n'avez pas de compte ? Cliquer ici pour le créer !</a>
        </form>
    </body>
</html>