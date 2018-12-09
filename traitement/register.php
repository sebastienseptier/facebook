<?php
 
$sql = "INSERT INTO user (login, mdp, email) VALUES(?, ?, ?)";

// Etape 1  : preparation
$req = $pdo->prepare($sql);

// Etape 2 : execution : 2 paramètres dans la requêtes !!
$req->execute(array($_POST['login'], $_POST['pwd'], $_POST['email'])); 

// Si $req est faux, on retourne au formulaire
if ($req == false) {
    header('Location: index.php?action=creation_compte');
}

header('Location: index.php?action=accueil');
?>