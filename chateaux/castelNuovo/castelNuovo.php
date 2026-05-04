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
    <title>Castel Nuovo</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../chateaux.css">
</head>
<body>
    <!-- menu navigation -->
     <?php $depth = 2; include '../../nav.php'; ?>
    <main>
        <h1>Castel Nuovo, les ruines d'un village fortifié.</h1>
        <img src="https://i0.wp.com/voyages-en-france.fr/wp-content/uploads/2024/03/DSC_0925-scaled.jpg?w=2560&ssl=1" alt="chateauneuf">
        <h2>CHATEAUNEUF-VILLEVIEILLE, situé à 20 km de Nice est un haut lieu historique dans un cadre préservé. </h2>

        <h3>Durant les 7 et 8ème siècle, pour échapper aux invasions des barbares qui ravagèrent la Provence,
             la Côte d'Azur et la région au Nord de Nice, nos anciens allèrent se réfugier sur la montagne et y construisirent une cité qu'ils appelèrent CASTELNUOVO où Châteauneuf,
            afin de la différencier de Villevieille où il ne restait plus que l'église ruinée de Sainte-Marie. <br> <br>
            Ce nouveau village ne tarda pas à devenir la résidence des nobles familles de Nice. <br> 
            Entouré de remparts, percé de portes fortifiées, flanqué de tours, 
            il devient une place forte du Moyen-Age dont la renommée s'est conservée dans les annales du pays. <br> <br>
            Pendant presque dix siècles, le bourg de Châteauneuf prospéra et fut une Cité importante, patrie de Pierre de Châteauneuf compagnon de Saint-Louis, 
            célèbre troubadour au XIIIè siècle et de Mgr Louis Martini (1566-1621), évêque d'Aoste en 1611. Au 18ème siècle, 
            le fief de Châteauneuf était partagé entre plusieurs familles qui devinrent ainsi que les Coseigneurs de Châteauneuf. <br> <br>
            Il y en eut jusqu'à 45. En 1744, les Espagnols s'emparent de Châteauneuf après une vigoureuse résistance ; 
            la guerre dura plusieurs années, causant la dévastation totale du pays.</h3>



        <h5>Certains extraits pris sur <a href="https://castelnuovo.fr/index.php/nos-activites/la-restauration-des-ruines/l-histoire-du-site-de-castel-nuovo">castelnuovo.fr</a></h5>
        <h5>Images trouvées sur <a href="https://voyages-en-france.fr/index.php/2024/03/24/les-fortifications-de-chateauneuf-villevieille/">voyages-en-france.fr</a></h5>
    </main>
</body>
</html>