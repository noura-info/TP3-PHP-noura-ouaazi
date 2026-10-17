
<?php
// Auteur : Noura Ouaazi
// Objectif : Conditions, switch et boucles
// Date : 17/10/2026

require_once "config.php";
require_once "includes/fonctions_inc.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Structures de contrôle</title></head>
<body>
<h1>Partie 2 : Structures de contrôle</h1>

<h2>Exercice 2.1 : Mentions</h2>
<?php
foreach ([7, 10, 13, 15, 18] as $note) {
    echo "Note $note : " . mention($note) . "<br>";
}
?>

<h2>Exercice 2.2 : Mois courant</h2>
<?php
$mois = date("m");

switch ($mois) {
    case "01": $nom_mois = "Janvier"; break;
    case "02": $nom_mois = "Février"; break;
    case "03": $nom_mois = "Mars"; break;
    case "04": $nom_mois = "Avril"; break;
    case "05": $nom_mois = "Mai"; break;
    case "06": $nom_mois = "Juin"; break;
    case "07": $nom_mois = "Juillet"; break;
    case "08": $nom_mois = "Août"; break;
    case "09": $nom_mois = "Septembre"; break;
    case "10": $nom_mois = "Octobre"; break;
    case "11": $nom_mois = "Novembre"; break;
    case "12": $nom_mois = "Décembre"; break;
    default: $nom_mois = "Mois inconnu";
}
echo $nom_mois;
// Sans break, l'exécution peut continuer dans les cases suivantes.
?>

<h2>Exercice 2.3.1 : Triangle d'étoiles</h2>
<?php
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
?>

<h2>Exercice 2.3.2 : while</h2>
<?php
$i = 0;
while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }
    $i += 2;
}
?>

<h2>Exercice 2.3.3 : continue</h2>
<?php
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }
    echo "$i ";
}
?>

<h2>Exercice 2.3.4 : break et break 2</h2>
<?php
$i = 1;
while ($i <= 12) {
    switch ($i) {
        case 5:
            echo "<p>At 5</p>";
            break;
        case 10:
            echo "<p>At 10; quitting</p>";
            break 2;
    }
    $i++;
}
?>

<h2>Exercice 2.3.5 : do-while</h2>
<?php
$i = 0;
do {
    echo "$i<br>";
    $i += 2;
} while ($i <= 20);

// do-while exécute le bloc au moins une fois.
?>
</body>
</html>



<h2>Exercice complémentaire : Dates</h2>
<?php
$dateFin = new DateTime("2027-01-31");
$aujourdhui = new DateTime("today");

if ($dateFin >= $aujourdhui) {
    $difference = $aujourdhui->diff($dateFin);
    echo "Jours restants avant la fin du semestre : "
        . $difference->days . "<br>";
} else {
    echo "La date de fin du semestre est passée.<br>";
}

$jour = 31;
$mois = 2;
$annee = 2027;

if (checkdate($mois, $jour, $annee)) {
    echo "Date valide.";
} else {
    echo "Date invalide.";
}
?>

