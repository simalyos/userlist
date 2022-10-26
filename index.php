<?php

require_once 'crud.php';

$user_id;
session_start();
//Lancement de session et creation d'un utilisateur avec CREATE
if (isset($_POST['create'], $user_id)) {
    create($_POST['username'], $_POST['first_name'], $_POST['last_name'], $_POST['gender'], $_POST['status']);
}
// Le DELETE permettra de suprimer un utilisateur 
if (isset($_POST['delete']) and is_numeric($_POST['delete'])) {
    deleteOne($_POST['delete']);
}
//Le UPDATE permettra de modifier les données d'un utilisateur 
if (isset($_POST['update']) and is_numeric($_POST['update'])) {

}

if (isset($_SESSION['create'])) {

        session_start();
        create($_SESSION['create'], $_POST['username'], $_POST['first_name'], $_POST['last_name'], $_POST['gender'], $_POST['status']);

        session_unset();
    
}

$userlist = showAll();

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<title>User list</title>
</head>
<body>
<!-- Avec la session CREATE on peut créer un utilisateur depuis ce formulaire: -->


<div class="container text-center">
    <div class="container">
    <h2 class="h2"> Add a new user</h2></br>
        <form action="" method="post">
            <div class="form-group">
                <label class="form-label" for="username">Username: </label>
                <input class="form-control" type="text" name="username">
            </div>
            <div class="form-group">
                <label class="form-label" for="first_name">First Name </label>
                <textarea class="form-control" type="text" name="first_name"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label" for="last_name">Last Name </label>
                <textarea class="form-control" type="text" name="last_name"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label" for="gender">Gender </label>
                <input class="form-control" type="text" name="gender">
            </div>
            <div class="form-group">
                <label class="form-label" for="status">Status </label>
                <input class="form-control" type="number" name="status">
            </div>
            <button class="btn btn-success" type="submit" name="create">Add to database</button>
            </form>
</div>


<div class="row align-items-start">
   <h1>User list database</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username </th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Status </th>
      <th scope="col">Edit </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($userlist as $user):?>
     <tr>
       <th scope="row"><?=  $user['user_id']; ?></th>
       <th scope="row"><?=  $user['username']; ?></th>
       <th scope="row"><?=  $user['first_name']; ?></th>
       <th scope="row"><?=  $user['last_name'];  ?></th>
       <th scope="row"><?=  $user['status']; ?></th>
       <?php if (isset($_SESSION['delete'])) : ?>
       <form action="" name="delete" method="post">
           <button class="btn btn-danger" type="submit" name="delete" value=<?= $user['user_id'] ?>>Delete</button>
       </form>
       <?php endif ?>
     </tr>
     </tbody>

<!-- Avec la session DELETE on peut suprimer un utilisateur depuis ce boutton qui s'affichera à la fin de ligne pour chaque utilisateur dans le tableau: -->

    <?php endforeach; ?>
    </table>
  </div>
</div>

    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>