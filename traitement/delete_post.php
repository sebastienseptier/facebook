<?php
 
$sql = "DELETE FROM ecrit WHERE id=?";

// Etape 1  : preparation
$req = $pdo->prepare($sql);

// Etape 2 : execution : 1 paramètre dans la requêtes !!
$profil_data = $req->execute(array($_GET["id"]));

header('Location: index.php?action=profil');
?>