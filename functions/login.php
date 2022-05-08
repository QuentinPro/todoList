<?php

include('database.php');

if(!empty($_POST)){
    $mail = !empty($_POST) ? $_POST['mail'] : null ;
    $password = !empty($_POST) ? $_POST['password'] : null ;
}

find_user($db, $mail, $password);
function find_user($db, $mail, $password){
    $request_string = "SELECT * FROM user WHERE mail_adress =:mail_adress AND password =:password";
    $request = $db->prepare($request_string);
    $request->execute([':mail_adress'=>$mail, ':password'=>$password]);
    $row = $request->fetch(PDO::FETCH_ASSOC);
    if($mail === $row['mail_adress'] && $password === $row['password']){
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['userName'] = $row['first_name'];
        $_SESSION['userId'] = $row['id'];
        header('location: ../index.php');
    }
}

?>