<?php
    // if (!$_SESSION) header('location: login.html');
    include "functions/tasks.php";
    $task = isset($_GET['edit']) ? find_one_task($db, $_GET['edit']) : null;
    $buttonValue = isset($_GET['edit']) ? "Modifier la tâche" : "Ajouter une tâche";
    $action = !isset($_GET['edit']) ? 'functions/tasks.php' : 'functions/tasks.php?edit='.$_GET['edit'];
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
        <h1 class="title">My todo</h1>
        <p class="welcome_message">Bonjour <span><?php echo $_SESSION['userName']; ?></span> <a href="functions/logout.php">Se déconnecter</a>
</p>
    </header>
    <div class="introduction">
        C'est ici que vous pourrez créer et suivre vos tâches.
    </div>
    <form action="<?=$action?>" method="post">
        <input type="text" name="name" value="<?=$task['name']?>" placeholder="Nom de votre tâche"/>
        <input type="text" name="description" value="<?=$task['description']?>" placeholder="Descriptif de votre tâche" />
        <select name="importance" id="importance">
        <?php
            foreach ($importance_array as $value) {
            $selected = $task['importance'] == $value ? 'selected' : null;
        ?>
            <option value="<?=$value?>" <?=$selected?>><?=$value?></option>
        <?php 
            } 
        ?>
        </select>
        <select name="status" id="status">
        <?php
            foreach ($status_array as $value) {
            $selected = $task['status'] == $value ? 'selected' : null;
        ?>
            <option value="<?=$value?>" <?=$selected?>><?=$value?></option>
        <?php 
            } 
        ?>
        </select>
        <input type="submit" name="submit" value="<?=$buttonValue?>" />
    </form>

    <?php 
        $results = find_tasks($db, $_SESSION['userId']);
        if(!isset($_GET['edit'])){
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
        <td><a href="index.php?edit=<?= $value["id"]; ?>"><i class="fa-solid fa-pen-to-square" title="Editer"></i></a> <a href="functions/tasks.php?delete=<?= $value["id"]; ?>"><i class="fa-solid fa-trash-can" title="Supprimer"></i></a></td>
    </tr>
    <?php 
        } 
    }
    ?>
    </table>

</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/style.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</html>