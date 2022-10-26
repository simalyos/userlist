<?php

require_once 'db.php';

//Fonction pour afficher toutes les utilisateurs:
function showAll()
{
    //On se connecte à la base de données
    $pdo = db_connect();
    //Affichage de userlist avec la requete suivante:
    $query = "SELECT * FROM user_details";
    $request = $pdo->query($query);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

//Affichage d'un utilisateur avec son id 
function readOne($id)
{
    //D'abbord on se connecte à la base de données
    $pdo = db_connect();
    //Affichage de l'utilisateur par ID avec la requete suivante:
    $queryid = 'SELECT * FROM user_details where user_id = :user_id';
    $requestid = $pdo->prepare($queryid);
    //Avec la requete preparé j'utilise la methode bindParam en suivant son parametrage: 
    $requestid->bindParam(':user_id', $user_id);
    $requestid->execute();
    $result = $requestid->fetchAll(PDO::FETCH_ASSOC);;
    return($result);
}

//La fonction pour modifier les données existantes d'un utilisateur:
function create(string $username, string $first_name, string $last_name, string $gender , int $status = null)
{
    //On se connecte pareil à la base de données
    $pdo = db_connect();
    //Modification des données de l'utilisateur  avec la requete suivante:
    $querycreate = "INSERT INTO task (username, first_name, last_name, gender, status) VALUES (:username, :first_name, :last_name, :gender, :status)";
    $requestcreate = $pdo->prepare($querycreate);
    // J'utilise aussi le bindParam avec le parametrage et execution dans un array: 
    $requestcreate->execute(array(':username' => $username, ':first_name' => $first_name, ':last_name' => $last_name, ':gender' => $gender, ':status' => $status));
}

//La fonction pour suprimer un utilisateur:
function deleteOne(int $id)
{
    $pdo = db_connect();
    //Suppresion  des données de l'utilisateur avec la requete suivante:
    $querydelete = "DELETE FROM user_details WHERE user_id=$user_id";
    $requestdelete = $pdo->prepare($querydelete);
    $requestdelete->execute();
}
?>