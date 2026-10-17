
<?php
// Auteur : Noura Ouaazi
// Objectif : Afficher les notes enregistrées dans le CSV
// Date : 17/10/2026

require_once "config.php";
require_once "includes/fonctions_inc.php";

$fichier = __DIR__ . "/data/notes.csv";
?>
<?php include "includes/entete_inc.php"; ?>
<?php include "includes/menu_inc.php"; ?>

<h2>Liste des apprenants</h2>

<?php
if (!file_exists($fichier)) {
    echo "<p>Aucun apprenant enregistré pour le moment.</p>";
} else {
    $handle = fopen($fichier, "r");

    if ($handle === false) {
        echo "<p class='erreur'>Impossible d'ouvrir le fichier CSV.</p>";
        exit;
    }

    $sommeMoyennes = 0;
    $nombre = 0;

    echo "<table>";
    echo "<tr><th>Nom</th><th>Info</th><th>Math</th>"
       . "<th>Moyenne</th><th>Mention</th></tr>";

    while (($ligne = fgetcsv($handle, 0, ";")) !== false) {
        if (count($ligne) < 3) {
            continue;
        }

        [$nom, $info, $math] = $ligne;

        if (!is_numeric($info) || !is_numeric($math)) {
            continue;
        }

        $moyenne = ((float)$info + (float)$math) / 2;
        $m = mention($moyenne);

        $sommeMoyennes += $moyenne;
        $nombre++;

        echo "<tr>";
        echo "<td>" . htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($info) . "</td>";
        echo "<td>" . htmlspecialchars($math) . "</td>";
        echo "<td>" . number_format($moyenne, 2) . "</td>";
        echo "<td>" . htmlspecialchars($m, ENT_QUOTES, 'UTF-8') . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    fclose($handle);

    if ($nombre > 0) {
        $moyenneClasse = $sommeMoyennes / $nombre;
        echo "<p>Moyenne générale de la classe : "
            . number_format($moyenneClasse, 2) . "/20</p>";
    } else {
        echo "<p>Aucune note valide dans le fichier.</p>";
    }
}
?>

<?php include "includes/pied_inc.php"; ?>



<h2>Lecture bas niveau avec fgets()</h2>
<?php
$handle = fopen(__DIR__ . "/data/notes.csv", "r");

if ($handle !== false) {
    while (!feof($handle)) {
        $ligne = fgets($handle);

        if ($ligne === false) {
            break;
        }

        $champs = explode(";", trim($ligne));
        echo "<pre>";
        print_r($champs);
        echo "</pre>";
    }

    fclose($handle);
}
?>

