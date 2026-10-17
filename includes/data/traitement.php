
<?php
// Auteur : Noura Ouaazi
// Objectif : Valider les notes et les enregistrer dans le CSV
// Date : 17/10/2026

require_once "config.php";
require_once "includes/fonctions_inc.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Veuillez utiliser le formulaire de saisie.");
}

$nom = trim($_POST["nom"] ?? "");
$infoBrut = $_POST["note_info"] ?? null;
$mathBrut = $_POST["note_math"] ?? null;

if ($nom === "" || $infoBrut === null || $mathBrut === null
    || trim((string)$infoBrut) === ""
    || trim((string)$mathBrut) === "") {
    exit("Erreur : tous les champs sont obligatoires.");
}

if (!is_numeric($infoBrut) || !is_numeric($mathBrut)) {
    exit("Erreur : les notes doivent être numériques.");
}

$note_info = (float)$infoBrut;
$note_math = (float)$mathBrut;

if ($note_info < NOTE_MIN || $note_info > NOTE_MAX ||
    $note_math < NOTE_MIN || $note_math > NOTE_MAX) {
    exit("Erreur : les notes doivent être comprises entre 0 et 20.");
}

$moyenne = ($note_info + $note_math) / 2;
$mention = mention($moyenne);

$fichier = __DIR__ . "/data/notes.csv";
$handle = fopen($fichier, "a");

if ($handle === false) {
    exit("Erreur lors de l'ouverture du fichier CSV.");
}

if (fputcsv($handle, [$nom, $note_info, $note_math], ";") === false) {
    fclose($handle);
    exit("Erreur lors de l'écriture du fichier CSV.");
}
fclose($handle);
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Résultat</title></head>
<body>
    <h1>Apprenant enregistré avec succès</h1>
    <p>Nom : <?= htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Informatique : <?= $note_info ?>/20</p>
    <p>Mathématiques : <?= $note_math ?>/20</p>
    <p>Moyenne : <?= number_format($moyenne, 2) ?>/20</p>
    <p>Mention : <?= htmlspecialchars($mention, ENT_QUOTES, 'UTF-8') ?></p>
    <a href="saisie.html">Ajouter un autre apprenant</a><br>
    <a href="liste.php">Voir la liste</a>
</body>
</html>
