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
    <title>Cheverny</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../chateaux.css">
</head>
<body>
    <!-- menu navigation -->
     <?php $depth = 2; include '../../nav.php'; ?>
    <main>
        <h1>Château de Cheverny</h1>
        <img src="../../imagesChateaux/ChevernyChateau.jpg" alt="chateau">
        <h2>Un des plus beau châtau de la Loire.</h2>
        <h3>
            Qui n'a jamais entendu parler de Moulinsart, le légendaire château du capitaine Haddock ?<br>
            Voici le château qui a inspiré Hergé à le créer, bien que les souterrains soient 
            surement inspirés par les cryptes romanes de Nivelles et que Moulinsart soit amputé 
            de ses deux pavillons extrêmes.
            Le château est d'inspiration rigoureusement classique.
        </h3>

        <h5>Réferences au wikipédia des châteaux de <a href="https://fr.wikipedia.org/wiki/Ch%C3%A2teau_de_Cheverny">Cheverny</a> et de <a href="https://fr.wikipedia.org/wiki/Ch%C3%A2teau_de_Moulinsart">Moulinsart</a></h5>
        
</body>
</html>