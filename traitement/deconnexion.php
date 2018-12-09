<?php
// Destruction de la session
session_destroy();
header('Location: index.php?action=accueil');
?>