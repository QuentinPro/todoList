<?php

include('database.php');

if(!empty($_POST)){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $importance = $_POST['importance'];
    $status = $_POST['status'];
    $user = $_SESSION['userId'];
    $created = date('Y-m-d H:i:s');
    $updated = date('Y-m-d H:i:s');
}

if(isset($name) && !empty($name) && isset($description) && !empty($description)){
    if(!isset($_GET['edit'])){
        insert($db, $name, $description, $importance, $status, $created, $updated, $user);
    } else {
        $id = $_GET['edit'];
        update($db, $name, $description, $importance, $status, $updated, $id);
    }
    header('location: ../index.php');
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    delete($db, $id);
    header('location: ../index.php');
}

function find_tasks($db, $user){
    $request_string = "SELECT * FROM tasks WHERE user_id = '$user'";
    $request = $db->prepare($request_string);
    $request->execute();

    return $request;
}

function find_one_task($db, $id){
    $request_string = "SELECT * FROM tasks WHERE id = '$id'";
    $request = $db->prepare($request_string);
    $request->execute();
    $row = $request->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function insert($db, $name, $description, $importance, $status, $created, $updated, $user){
    $request_string = "INSERT INTO `tasks` (`name`, `description`, `importance`, `status`, `created`, `updated`, `user_id`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $request = $db->prepare($request_string);
    $request->execute([$name, $description, $importance, $status, $created, $updated, $user]);
}

// function update($db, $name, $price, $size, $target, $description, $id){
//     $request_string = "UPDATE shoes SET name = '$name', price = '$price', size = '$size', image = '$target', description = '$description' WHERE id = '$id'";
//     $request = $db->prepare($request_string);
//     $request->execute([$name, $name, $price, $size, $target, $description]);
// }

function delete($db, $id){
    $request_string = "DELETE FROM tasks WHERE id = '$id'";
    $request = $db->prepare($request_string);
    $request->execute();
}

?>