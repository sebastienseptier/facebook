<?php
 
$sql = "SELECT * FROM user WHERE login=? AND mdp=?";

// Etape 1  : preparation
$req = $pdo->prepare($sql);

// Etape 2 : execution : 2 paramètres dans la requêtes !!
$req->execute(array($_POST['login'], $_POST['pwd'])); 

// Etape 3 : ici le login est unique, donc on sait que l'on peut avoir zero ou une  seule ligne.

// un seul fetch
$line = $req -> fetch(PDO::FETCH_OBJ);

// Si $line est faux le couple login mdp est mauvais, on retourne au formulaire
if ($line == false) {
    header('Location: index.php?action=login');
}

// sinon on crée les variables de session $_SESSION['id'] et $_SESSION['login'] et on va à la page d'accueil
$_SESSION['id'] = $line -> id;
$_SESSION['login'] = $line -> login;

header('Location: index.php?action=accueil');
?>