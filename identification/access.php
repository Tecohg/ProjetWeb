<?php
session_start(); #demare une session donnant accès a la variable $_SESSION
# $_SESSION sauvegarde le login de session et deviens accessible sur toutes les pages
require 'users.inc';
$login = $_POST['login'];
$mdp   = $_POST['mdp'];

#si le login entré au formulaire est bon alors on donne le login a $_SESSION
#puis on renvois a la page principale (avec une session active)
if (loginOk($login, $mdp)) {
    $_SESSION['login'] = $login;
    header('Location: ../index.php');
    exit;
} else {
   header('location: login.php?msg=login incorrect');
   exit;
}
?>