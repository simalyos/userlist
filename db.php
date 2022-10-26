<?php

require_once 'globals.php';
//Parametrage et test de connection à la base de données:
//Le id de connection à la base de données est stocker dans un fichier globals.php à qui je fais appele dans ce fichier.

function db_connect() {
    //J'utilise cette variable pour recuperer mon id stocker dans le globals.php
    $user = $GLOBALS['userdb'];

    //Avec les methode try and catch je teste la connection vers la base de données
    try {
        return $db_connect = new PDO('mysql:host=localhost;dbname=userlist', $user, "");

    } catch (PDOException $e) {
        print "Erreur !:" .$e->getMessage() . "<br/>";
        die();
    }
}    


?>