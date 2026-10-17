
<?php
// Auteur : Noura Ouaazi
// Objectif : Exporter les résultats au format JSON et comparer serialize()
// Date : 17/10/2026

require_once "config.php";
require_once "includes/fonctions_inc.php";

$csv = __DIR__ . "/data/notes.csv";
$jsonFichier = __DIR__ . "/data/notes.json";

$resultats = [];

if (file_exists($csv)) {
    $handle = fopen($csv, "r");

    if ($handle === false) {
        exit("Impossible de lire le CSV.");
    }

    while (($ligne = fgetcsv($handle, 0, ";")) !== false) {
        if (count($ligne) < 3) {
            continue;
        }

        [$nom, $info, $math] = $ligne;

        if (!is_numeric($info) || !is_numeric($math)) {
            continue;
        }

        $moyenne = ((float)$info + (float)$math) / 2;

        $resultats[] = [
            "nom" => $nom,
            "note_info" => (float)$info,
            "note_math" => (float)$math,
            "moyenne" => round($moyenne, 2),
            "mention" => mention($moyenne)
        ];
    }

    fclose($handle);
}

$json = json_encode(
    $resultats,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

if ($json === false ||
    file_put_contents($jsonFichier, $json) === false) {
    exit("Erreur lors de la création du fichier JSON.");
}

$contenu = file_get_contents($jsonFichier);
$donnees = json_decode($contenu, true);
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Export des notes</title></head>
<body>
    <h1>Export JSON</h1>

    <h2>Résultats relus depuis notes.json</h2>
    <pre><?php print_r($donnees); ?></pre>

    <h2>Comparaison JSON et serialize()</h2>
    <?php
    $tableauTest = ["nom" => "Noura", "moyenne" => 15];

    echo "<h3>json_encode()</h3>";
    echo "<pre>" . htmlspecialchars(
        json_encode($tableauTest, JSON_PRETTY_PRINT),
        ENT_QUOTES, 'UTF-8'
    ) . "</pre>";

    echo "<h3>serialize()</h3>";
    echo "<pre>" . htmlspecialchars(
        serialize($tableauTest), ENT_QUOTES, 'UTF-8'
    ) . "</pre>";
    ?>

    <p>JSON est directement exploitable par JavaScript.</p>
    <a href="liste.php">Retour à la liste</a>
</body>
</html>
