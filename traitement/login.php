<?php
if(isset($_POST["login"]) && isset($_POST['password'])) {
    $sql = "SELECT * FROM user WHERE login=? AND mdp=PASSWORD(?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($_POST["login"], $_POST['password']));
    $line = $q->fetch();

   if($line == false)
        header("Location: index.php?action=login");
    else {
        $_SESSION['id'] = $line['id'];
        $_SESSION['login'] = $line['login'];
        header("Location: index.php");

    }
}