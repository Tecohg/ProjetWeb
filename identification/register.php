<?php
require 'users.inc';
$msg = '';
if ($_POST) {
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $conf = $_POST['conf'];
    if ($mdp !== $conf) {
        $msg = "Mots de passe differents";
    } elseif (exist($login)) {
        $msg ="login deja pris";
    } elseif (!$login || !$mdp) {
        $msg = "champs manquant";
    } else {
        addUser($login, $mdp);
        session_start();
        /*echo '<meta http-equiv="refresh" content="0;url=login.php?msg=Inscription reussie">';*/
        $_SESSION['login'] = $login;
        header('Location: ../index.php');
        exit;
    }
}
?>

<?php 
if ($msg) echo "<p style='color:red'>$msg</p>"; 
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <h2>Bienvenue</h2>

        <p>Si vous n'avez pas encore de compte :</p>
        <form method="post">
            <input name="login" placeholder="Login*" required>
            <input name="mdp" type="password" placeholder="Mot de passe*" required>
            <input name="conf" type="password" placeholder="Confirmation*" required><br>
            <button type="submit">S'inscrire</button>
        </form>

        <a href="login.php">se connecter</a>
    </body>
</html>