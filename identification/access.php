<?php
session_start();
require 'users.inc';
$login = $_POST['login'];
$mdp   = $_POST['mdp'];
if (loginOk($login, $mdp)) {
    $_SESSION['login'] = $login;
    header('Location: ../index.php');
    exit;
} else {
   header('location: login.php?msg=login incorrect');
   exit;
}
?>