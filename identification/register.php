<?php
require 'users.inc';
$msg = '';
if ($_POST) {
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $conf = $_POST['conf'];
    $email= $_POST['email'];
    if ($mdp !== $conf) {
        $msg = "Mots de passe differents";
    } elseif (exist($login)) {
        $msg ="login deja pris";
    } elseif (!$login || !$mdp || !$email) {
        $msg = "champs manquant";
    } else {
        addUser($login, $mdp);
        echo '<meta http-equiv="refresh" content="0;url=login.php?msg=Inscription reussie">';
        exit;
    }
}
?>

<?php 
if ($msg) echo "<p style='color:red'>$msg</p>"; 
?>
<form method="post">
    <input name="login" placeholder="Login*" required>
    <input name="mdp" type="password" placeholder="Mot de passe*" required>
    <input name="conf" type="password" placeholder="Confirmation*" required>
    <input name="email" type="email" placeholder="Email*" required>
    <button type="submit">S'inscrire</button>
</form>
<a href="login.php">se connecter</a>
?>