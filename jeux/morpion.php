<?php
session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../../identification/login.php');
    exit;
}
$me = $_SESSION['login'];
?>


<!DOCTYPE html>
<html lang="fr"
<head>
    <meta charset="UTF-8">
    <title>Jeu</title>
    <link rel="stylesheet" href="jeux.css">
</head>
    <body>
        <div id=""
    </body>
</html>