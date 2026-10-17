
<?php
// Auteur : Noura Ouaazi
// Objectif : Variables, constantes, types et chaînes PHP
// Date : 17/10/2026

require_once "config.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Bases PHP</title></head>
<body>
<h1>TP3 PHP - Partie 1</h1>

<h2>Exercice 1.1 : Noms de variables</h2>
<?php
/*
Valides : $x, $_x, $Prix_HT, $état.
Invalides : $2x (commence par un chiffre),
$x-y (le tiret est interdit), $prix ht (espace interdit).
Les lettres accentuées peuvent être utilisées dans les identifiants PHP,
mais il est préférable d'éviter les accents par convention.
*/
$x = 1;
$_x = 2;
$Prix_HT = 60;
$état = "valide";

$a = 10;
$A = 20;

echo "a = $a<br>";
echo "A = $A<br>";
?>

<h2>Exercice 1.2 : Constantes</h2>
<?php
echo ETABLISSEMENT . "<br>";
echo "NOTE_MIN = " . NOTE_MIN . "<br>";
echo "NOTE_MAX = " . NOTE_MAX . "<br>";
echo "SEUIL = " . SEUIL . "<br>";

var_dump(defined("SEUIL"));
echo "<br>";
var_dump(defined("INCONNUE"));

/*
Une constante non définie produit généralement un avertissement
ou une erreur selon le contexte et la version de PHP.
const est déclarée directement ; define() crée une constante
pendant l'exécution du script.
*/
?>

<h2>Exercice 1.3 : Calcul du prix TTC</h2>
<?php
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht * (1 + $tva / 100);

echo "Le prix TTC du produit est de " . $prix_ttc . " €.";
?>

<h2>Exercice 1.4 : Types et conversions</h2>
<?php
$test = 42;
$test = (string) $test;
var_dump($test);
echo "<br>";

$valeurs = [0, 0.0, "0", "", "abc", [], null];
foreach ($valeurs as $v) {
    var_dump((bool) $v);
    echo "<br>";
}

var_dump((int) 3.9);       echo "<br>";
var_dump((int) "12abc");   echo "<br>";
var_dump((float) "1.5e3"); echo "<br>";
var_dump((int) true);     echo "<br>";

$decimal = 255;
$hexadecimal = 0xFF;
$octal = 0377;
$binaire = 0b11111111;

echo "Décimal : $decimal<br>";
echo "Hexadécimal : " . dechex($hexadecimal) . "<br>";
echo "Octal : " . decoct($octal) . "<br>";
echo "Binaire : " . decbin($binaire) . "<br>";
?>

<h2>Exercice 1.5 : Chaînes de caractères</h2>
<?php
$traitees = "égales à";
$ici = 2;

echo 'Ahmed a dit : "J\'ai réussi"<br>';
echo "Voulez-vous supprimer C:\\*.*?<br>";
echo 'Ceci n\'affichera pas \n de nouvelle ligne<br>';
echo 'Les variables ne seront pas $traitees $ici<br>';
echo "Les variables seront $traitees $ici<br>";

$texte = "*Bonjour les développeurs*";
echo trim($texte, "*") . "<br>";

$mot = "PHP";
for ($i = 0; $i < strlen($mot); $i++) {
    echo htmlspecialchars($mot[$i]) . "<br>";
}
?>
</body>
</html>
