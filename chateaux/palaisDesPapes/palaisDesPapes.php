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
    <title>Palais Des Papes</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../chateaux.css">
</head>
<body>
    <!-- menu navigation -->
     <?php $depth = 2; include '../../nav.php'; ?>
    <main>
        <h1>Palais Des Papes</h1>
        <img src="../../imagesChateaux/palaisDesPapes.jpg" alt="PalaisDesPapes">
        <h2>La representation architecturale gothique d'Avignon</h2>
        <h3>
            Au XIIIe siècle, avant l'arrivée des papes en Avignon, le rocher sur lequel allait être construit le palais, 
            tel que nous le connaissons aujourd'hui, était en partie réservé aux moulins à vent, 
            en partie construit d'habitations dominées par le palais du Podestat[N 4], 
            non loin duquel se trouvait celui de l'évêque ainsi que l'église Notre-Dame-des-Doms, 
            seuls rescapés des constructions antérieures à l'arrivée des pontifes[10]. <br> <br>
            Toujours avant la construction du palais vers le XIIe siècle, on vit ironiquement le futur pape anglais Adrien IV, 
            rejoindre les chanoines de l'abbaye de Saint-Ruf à Avignon. <br> <br>

            Le palais, qui est l'imbrication de deux bâtiments, le palais vieux de Benoît XII, 
            véritable forteresse assise sur l'inexpugnable rocher des Doms, et le palais neuf de Clément VI
            , le plus fastueux des pontifes avignonnais,
            est non seulement le plus grand édifice gothique mais aussi celui où s'est exprimé dans toute sa plénitude le style du gothique international. <br><br>

            Il est le fruit, pour sa construction et son ornementation,
             du travail conjoint des meilleurs architectes français de l'époque,
             Pierre Poisson et Jean de Louvres, et des plus grands fresquistes de l'école siennoise, Simone Martini et Matteo Giovanetti.
        </h3>
        
        <h5>Extraits de <a href="https://fr.wikipedia.org/wiki/Palais_des_papes_d%27Avignon">wikipedia</a></h5>
        
</body>
</html>