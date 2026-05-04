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
    <title>Vestiges du château des Lascaris</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../chateaux.css">
</head>
<body>
    <!-- menu navigation -->
     <?php $depth = 2; include '../../nav.php'; ?>
    <main>
        <h1>Les vestiges d'un château</h1>
        <img src="../../imagesChateaux/vestigesDesLascaris.jpg" alt="Lascaris">
        <h2>Château abandonné après un tremblement de terre...</h2>
        <h3>
            En 1261 le Comte Guillaume Pierre de Vintimille se marie à Constantinople avec Eudoxie Lascaris, 
            fille de l’empereur grec d’orient Théodore II. <br>
            Le Pape lui donne le privilège d’écarteler leurs armes : de gueules à chef d’or ; avec celles des Lascaris : d’or à l’aigle bicéphale de sable. <br>
            Ce Comte est souverain de La Brigue, Briga en ces temps.
            Son petit-fils, Guillaume Pierre II, et ce par testament du 7 avril 1358, 
            va alors partager son fief et permet ainsi à son fils Ludovic Lascaris en 1369 de faire naître la souche des LASCARIS-VINTIMILLE DA BRIGA. <br><br>
            Les Lascaris de Tende et les Lascaris de La Brigue vont officiellement se séparer, bien que cousin. <br>
            Quelques années plus tard, La Brigue dépend du Comté de Savoie, plus considéré comme un partenaire et un allié. <br>
            Les Lascaris de Tende eux, resteront vassaux des comtes de Provence…
            Il est alors temps de concrétiser la présence des Lascaris Da Briga, aussi, de revendiquer une certaine autonomie. <br>
            Ludovic Lascaris a besoin d’une grande demeure pour les terres dont il est le Seigneur.
            Le site est plutôt favorable : hauteur et proximité de source. La tour offre un point de vue sur les vallées à l’ouest, au sud et à l’est. <br>
             A l’époque, cette grosse maison fortifiée, se trouvait exactement sur la route Turin-Nice. <br><br>
              À l’intérieur plusieurs appartements seront embellis par Catherine Lascaris da Briga au XVIIème siècle. Aussi, 
              une chapelle castrale sera construite sous la dédicace de Notre Dame de l’Intercession.
            Au XVIIème siècle un tremblement de terre endommage le château. En 1794, l’armée révolutionnaire saccagea et brûla le château, 
            l’abandonnant à l’épreuve du temps et des pillards… <br><br>
            Inscrit à l’inventaire des Monuments historiques depuis 1949, aujourd’hui il ne reste que les vestiges du château. Les premiers travaux d’urgence,
             notamment sur la tour, furent réalisés par la municipalité en 1993. Puis, en 1995, 
            l’association Patrimoine et Traditions Brigasques va s’engager dans un défi ambitieux : sauver le Château Lascaris de l’oubli.
        </h3>
        



        <h5>references du texte:<a href="https://www.menton-riviera-merveilles.fr/offres/vestiges-du-chateau-des-lascaris-la-brigue-fr-3051278/">menton-riviera-merveilles.fr</a></h5>
        <h5>autre informations: <a href="https://fr.wikipedia.org/wiki/Ch%C3%A2teau_des_Seigneurs_de_la_Brigue">wikipedia</a></h5>
        
</body>
</html>