

<?php
// Auteur : Noura Ouaazi
// Objectif : Afficher l'en-tête des pages
// Date : 17/10/2026

require_once __DIR__ . "/../config.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suivi des notes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 25px; background: #f5f5f5; }
        h1, h2 { color: #234b70; }
        table { border-collapse: collapse; width: 100%; background: white; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background: #dce8f2; }
        .rouge { color: red; }
        .erreur { color: red; }
    </style>
</head>
<body>
<header>
    <h1><?= htmlspecialchars(ETABLISSEMENT, ENT_QUOTES, 'UTF-8') ?></h1>
    <h2>Suivi des notes des apprenants</h2>
</header>
