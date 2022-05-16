<!DOCTYPE html>
<html lang="fr">
 <head>
	<title></title>

	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no" /> <!-- pour mobiles -->

	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	
 </head>
<body>
	<?php
    include "header.php";
    ?>
    <form action="functions/register.php" method="post">
        <input type="text" name="firstname" placeholder="Votre prénom" />
        <span class="error">bite</span>
        <input type="text" name="lastname" placeholder="Votre nom de famille" />
        <input type="email" name="mail" placeholder="Votre adresse mail" />
        <input type="password" name="password" placeholder="Votre mot de passe">
        <input type="password" name="confirm_password" placeholder="Confirmez votre mot de passe">
        <br>
        <input type="submit" value="Créer un compte">
    </form>
    <p class="login_redirect">Déjà inscrit? <a href="login.php">Se connecter</a></p>


	<footer></footer>

</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/style.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</html>