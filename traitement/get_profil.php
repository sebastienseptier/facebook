<?php
 
$sql = "SELECT * FROM user WHERE id=?";

// Etape 1  : preparation
$req = $pdo->prepare($sql);

// Etape 2 : execution : 1 paramètre dans la requêtes !!
$profil_data = $req->execute(array($_SESSION['id']));

// Si $line est faux le couple login mdp est mauvais, on retourne au formulaire
if ($profil_data == false) {
    header('Location: index.php?action=login');
}

header('Location: index.php?action=profil');
?>