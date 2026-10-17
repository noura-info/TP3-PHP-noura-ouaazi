
<?php
// Auteur : Noura Ouaazi
// Objectif : Manipuler et analyser les tableaux de notes
// Date : 17/10/2026

require_once "config.php";
require_once "includes/fonctions_inc.php";

$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13,
    "Aicha" => 15, "Samir" => 13, "Zakaria" => 13,
    "Rafik" => 10, "Ilham" => 9, "Hamza" => 7,
    "Sami" => 7, "Noura" => 14
];

$modules = ["PHP", "Python", "Bases de données"];
?>
<?php include "includes/entete_inc.php"; ?>
<?php include "includes/menu_inc.php"; ?>

<h2>Exercice 3.1 : Modules</h2>
<?php
foreach ($modules as $module) {
    echo htmlspecialchars($module) . "<br>";
}
echo "Accès par indice : " . $modules[0] . ", "
    . $modules[1] . ", " . $modules[2];
?>

<h2>Exercice 3.2 : Tableau des notes</h2>
<table>
<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>
<?php foreach ($notes as $nom => $note): ?>
<tr class="<?= $note < SEUIL ? 'rouge' : '' ?>">
    <td><?= htmlspecialchars($nom) ?></td>
    <td><?= $note ?></td>
    <td><?= htmlspecialchars(mention($note)) ?></td>
</tr>
<?php endforeach; ?>
</table>

<h2>Exercice 3.3 : Statistiques</h2>
<?php
$somme = 0;
$meilleure = NOTE_MIN;
$faible = NOTE_MAX;
$effectifs = [];

foreach ($notes as $nom => $note) {
    $somme += $note;
    if ($note > $meilleure) $meilleure = $note;
    if ($note < $faible) $faible = $note;

    $m = mention($note);
    if (!isset($effectifs[$m])) $effectifs[$m] = 0;
    $effectifs[$m]++;
}

$moyenne = $somme / count($notes);

echo "Somme : $somme<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Meilleure note : $meilleure<br>";
echo "Plus faible note : $faible<br>";

echo "<h3>Vérification avec les fonctions PHP</h3>";
echo "Somme : " . array_sum($notes) . "<br>";
echo "Nombre : " . count($notes) . "<br>";
echo "Maximum : " . max($notes) . "<br>";
echo "Minimum : " . min($notes) . "<br>";

echo "<h3>Effectifs par mention</h3>";
foreach ($effectifs as $m => $nombre) {
    echo htmlspecialchars($m) . " : $nombre<br>";
}
?>

<h2>Exercice 3.4 : Tris</h2>
<?php
function afficher($tab) {
    echo "<table><tr><th>Nom</th><th>Note</th></tr>";
    foreach ($tab as $nom => $note) {
        echo "<tr><td>" . htmlspecialchars((string)$nom)
            . "</td><td>" . htmlspecialchars((string)$note)
            . "</td></tr>";
    }
    echo "</table><br>";
}

$copie = $notes;
ksort($copie);
echo "<h3>Noms croissants</h3>";
afficher($copie);

$copie = $notes;
arsort($copie);
echo "<h3>Notes décroissantes</h3>";
afficher($copie);

$copie = $notes;
krsort($copie);
echo "<h3>Noms décroissants</h3>";
afficher($copie);

$copie = $notes;
asort($copie);
echo "<h3>Notes croissantes</h3>";
afficher($copie);

echo "<h3>Tri des modules</h3>";
sort($modules);
foreach ($modules as $module) {
    echo htmlspecialchars($module) . "<br>";
}
// sort() convient à un tableau indexé.
?>

<h2>Exercice 3.5 : Opérateurs de tableaux</h2>
<?php
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<pre>";
var_dump($a + $b);
var_dump($a == $b);
var_dump($a === $b);
echo "</pre>";
// + conserve les clés déjà présentes dans le tableau de gauche.
// == compare les clés et valeurs sans imposer le même ordre.
// === exige les mêmes clés, valeurs, types et le même ordre.
?>

<?php include "includes/pied_inc.php"; ?>
