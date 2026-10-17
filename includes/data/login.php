
<?php
session_start();

// Auteur : Noura Ouaazi
// Objectif : Connexion et mémorisation du dernier login
// Date : 17/10/2026

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST["login"] ?? "");

    if ($login === "") {
        $erreur = "Veuillez saisir votre login.";
    } else {
        session_regenerate_id(true);
        $_SESSION["login"] = $login;

        setcookie("dernier_login", $login, [
            "expires" => time() + 86400,
            "path" => "/",
            "httponly" => true,
            "samesite" => "Lax"
        ]);

        header("Location: profil.php");
        exit;
    }
}

$dernierLogin = $_COOKIE["dernier_login"] ?? "";
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Connexion</title></head>
<body>
    <h1>Connexion</h1>

    <?php if (isset($erreur)): ?>
        <p style="color:red">
            <?= htmlspecialchars($erreur, ENT_QUOTES, 'UTF-8') ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Login :
            <input type="text" name="login"
                   value="<?= htmlspecialchars($dernierLogin, ENT_QUOTES, 'UTF-8') ?>"
                   required>
        </label>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
