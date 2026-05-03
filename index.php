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
    <title>LePetitChatelier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- menu navigation -->
     <?php $depth = 0; include 'nav.php'; ?>
    <main>
        <h1>Bonjour, <?= htmlspecialchars($login) ?> bienvenue sur LePetitChatelier.com !</h1> <!--permet d'éviter qu'un utilisateur rentre des commandes dans son login qui executerais ce qu'il veux-->
    </main>
</body>
</html>