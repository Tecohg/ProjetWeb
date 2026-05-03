<?php
#a rajouter sur chaques pages:
session_start();
if (empty($_SESSION['login'])) {
    header('Location: identification/login.php'); #logique: si pas de login, alors on renvois a la page de login
    exit;
}

$login = $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chateau</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../chateaux.css">
</head>
<body>
    <!-- menu navigation -->
     <?php $depth = 2; include '../../nav.php'; ?>
    <main>
        <h1>Titre</h1>
        <img src="#" alt="chateau">
        <h2>accroche</h2>
        <h3>Histoire</h3>
        



        <h5>references<a href="lien site">site</a></h5>
        
</body>
</html>