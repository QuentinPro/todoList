<header>
        <h1 class="title">My todo</h1>
        <?php if(session_status() == 2){?><p class="welcome_message">Bonjour <span><?php echo $_SESSION['userName']; ?></span> <a href="functions/logout.php">Se déconnecter</a><?php } ?></p>
		<p class="introduction">Votre plateforme de gestion de tâches</p>
</header>