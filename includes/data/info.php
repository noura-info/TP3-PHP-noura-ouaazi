
<?php
// Auteur : Noura Ouaazi
// Objectif : Traiter le formulaire GET
// Date : 17/10/2026

$nom = trim($_GET["nom"] ?? "");
$prenom = trim($_GET["prenom"] ?? "");
$sexe = $_GET["sexe"] ?? "";

if ($nom === "" || $prenom === "" ||
    !in_array($sexe, ["M", "F"], true)) {
    exit("Veuillez remplir correctement le formulaire.");
}

$civilite = ($sexe === "M") ? "Monsieur" : "Madame";
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Résultat GET</title></head>
<body>
    <h1>
        Bonjour <?= $civilite ?>
        <?= htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8') ?>
        <?= htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') ?>
    </h1>
    <a href="info.html">Retour</a>
</body>
</html>
