<?php

    session_start();

    $db = null;
    function getConnexion(){
        $host = 'localhost';
        $dbName = 'todolist';
        $user = 'root';
        $password = '';
        try { 
            $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $password);
        }
        catch (PDOException $e){
            die("Connexion échouée : " . $e->getMessage());
        }

        return $db;
    }

    $db = getConnexion();

?>