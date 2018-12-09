<!--- GESTION DES POSTS --->
<div class="col-sm-6">
    <h2>Mon profile</h2>
<?php
    $sql = "SELECT * FROM ecrit WHERE idAuteur=?";

    // Etape 1  : preparation
    $req = $pdo->prepare($sql);

    // Etape 2 : execution : 1 paramètre dans la requêtes !!
    $req->execute(array($_SESSION['id']));

    if ($req == false) {
        echo 'Pas de données!';
    }
    else {
        while ($post = $req -> fetch(PDO::FETCH_OBJ)) // On fait une boucle pour récupérer les résultats, le FETCH_OBJ peut être considéré comme le array.
        {
            $id = $post -> id;
            $titre = $post -> titre;
            $contenu = $post -> contenu;
            $date = $post -> dateEcrit;
            $auteur = $post -> idAuteur;

            echo '<div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">'.$titre.'</h2><p>Posté par '.$auteur.', le '.$date.'.</p>
                    <a href="index.php?action=delete_post&id='.$id.'" class="btn btn-danger">x</a>
                </div>
                <div class="panel-body">
                '.$contenu.'
                </div>
            </div>';
        }
    }
?>
</div>

<!--- GESTION DES AMIS --->
<div class="col-sm-6">
    <h2>Mes amis</h2>
<?php
    $sql = "SELECT * FROM lien WHERE idUtilisateur1=? OR idUtilisateur1=?";

    // Etape 1  : preparation
    $req = $pdo->prepare($sql);

    // Etape 2 : execution : 1 paramètre dans la requêtes !!
    $req->execute(array($_SESSION['id'],$_SESSION['id']));

    if ($req == false) {
        echo 'Pas de données!';
    }
    else {
        while ($lien = $req -> fetch(PDO::FETCH_OBJ)) // On fait une boucle pour récupérer les résultats, le FETCH_OBJ peut être considéré comme le array.
        {
            $idUtilisateur1 = $lien -> idUtilisateur1;
            $idUtilisateur2 = $lien -> idUtilisateur2;
            $etat = $lien -> etat;

            echo '<div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"> L\'utilisateur '.$idUtilisateur1.' est ami avec '.$idUtilisateur2.'</h2>
                </div>
                <div class="panel-body">Etat de l\'amitié :
                '.$etat.'
                </div>
            </div>';
        }
    }
?>
</div>  
