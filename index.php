<?php
#a rajouter sur chaques pages:
session_start();
if (empty($_SESSION['login'])) {
    header('Location: identification/login.php');
    exit;
}

$login = $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjetWeb</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p class="discussion">test</p>
    <h1>Bonjour, <?= htmlspecialchars($login) ?> !</h1>
    <a href=""identification/logout.php">Se deconnecter</a>
</body>
</html>