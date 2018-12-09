<div id="contenu">
    <div id="me"> 
        <div class="mepro"><img src="img/persona.svg" alt="icon de"/></div>    
        <div class="metext"><p>Inscription</p></div>         
    </div>           
<div id="conexion">
    <form action="#" method="get">
        <input type="text" id="idnom" name="nom" placeholder="Nom">
        <input type="text" id="idprenom" name="prenom" placeholder="Prenom"> 
        <input type="text" id="idmail" name="mail" placeholder="Mail"> 
        <input type="password" id="mdp" name="mdp" placeholder="mot de passe"> 
        <input type="password" id="mdp" name="mdpc" placeholder="confirmation de mot de passe"> 
        <button type="submit" ><img src="img/log.svg" alt="inscription"/></button>
    </form>
</div>
<a href="index.php?action=login">Connexion</a>
</div>
<?php


// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
	// on teste les deux mots de passe
	if ($_POST['pass'] != $_POST['pass_confirm']) {
		$erreur = 'Les 2 mots de passe sont différents.';
	}
	else {
		$base = mysql_connect ('ipabdd.iut-lens.univ-artois.fr"', 'angeline.dutoit', 'PqggABls');
		mysql_select_db ('angelinedutoit', $base);

		// on recherche si ce login est déjà utilisé par un autre membre
		$sql = 'SELECT count(*) FROM user WHERE login="'.mysql_escape_string($_POST['login']).'"';
		$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		$data = mysql_fetch_array($req);

		if ($data[0] == 0) {
		$sql = 'INSERT INTO user VALUES("", "'.mysql_escape_string($_POST['login']).'", "'.mysql_escape_string(md5($_POST['mdp'])).'")';
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: iscription.php');
		exit();
		}
		else {
		$erreur = 'Un membre possède déjà ce login.';
		}
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>

