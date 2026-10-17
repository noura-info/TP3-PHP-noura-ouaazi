
<?php
session_start();

// Auteur : Noura Ouaazi
// Objectif : Déconnecter l'utilisateur
// Date : 17/10/2026

session_unset();
session_destroy();

header("Location: login.php");
exit;
?>
