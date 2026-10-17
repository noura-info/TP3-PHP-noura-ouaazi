
<?php
session_start();

// Auteur : Noura Ouaazi
// Objectif : Afficher le profil de l'utilisateur connecté
// Date : 17/10/2026

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$login = $_SESSION["login"];
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Profil</title></head>
<body>
    <h1>Mon profil</h1>

    <p>
        Bienvenue
        <?= htmlspecialchars($login, ENT_QUOTES, 'UTF-8') ?> !
    </p>

    <a href="deconnexion.php">Se déconnecter</a>
</body>
</html>
