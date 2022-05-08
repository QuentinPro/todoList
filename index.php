<?php
    include "functions/tasks.php";
?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" crossorigin="anonymous"/>

	
 </head>
<body>
    <header>
        Bonjour <span><?php echo $_SESSION['userName']; ?></span>
        <a href="functions/logout.php">Se déconnecter</a>
    </header>
    <div class="introduction">
        C'est ici que vous pourrez créer et suivre vos tâches.
    </div>
    <form action="functions/tasks.php" method="post">
        <input type="text" name="name" placeholder="Nom de votre tâche" />
        <input type="text" name="description" placeholder="Descriptif de votre tâche" />
        <select name="importance" id="importance">
            <option value="Haute">Haute</option>
            <option value="Moyenne">Moyenne</option>
            <option value="Faible">Faible</option>
        </select>
        <select name="status" id="status">
            <option value="En cours">En cours</option>
            <option value="A faire">A faire</option>
            <option value="Terminé">Terminé</option>
        </select>
        <input type="submit" name="submit" value="Ajouter une tâche" />
    </form>

    <?php 
        $results = find_tasks($db, $_SESSION['userId']);
    ?>
    <table>
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Importance</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php
        foreach ($results as $value) {
    ?>
    <tr style="text-align:center">
        <td><?= $value["name"]; ?></td>
        <td><?= $value["description"]; ?></td>
        <td><?= $value["importance"]; ?></td>
        <td><?= $value["status"]; ?></td>
        <td><a href="administration_product.php?edit=<?= $value["id"]; ?>"><i class="fa-solid fa-pen-to-square" title="Editer"></i></a> <a href="functions/tasks.php?delete=<?= $value["id"]; ?>"><i class="fa-solid fa-trash-can" title="Supprimer"></i></a></td>
    </tr>
    <?php 
        } 
    ?>

</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/style.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</html>