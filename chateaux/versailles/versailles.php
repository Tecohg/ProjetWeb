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
    <title>Versaille</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../chateaux.css">
</head>
<body>
    <!-- menu navigation -->
     <?php $depth = 2; include '../../nav.php'; ?>
    <main>
        <h1>Versaille, un château emblématique.</h1>
        <img src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fcdn.pixabay.com%2Fphoto%2F2014%2F04%2F07%2F07%2F19%2Fversailles-318459_960_720.jpg&sp=1777837029Tb888c0ff0ea17947e344abc9a6b67a26b4a2a7b34a55c1cdc45dda1bf92dda57" alt="Versaille">
        <h2>Versaille, un des plus grands monuments historiques français.</h2>

        <h3>
            Bien qu'on considère aujourd'hui Versaille comme la résidence emblématique des rois de France, le chateau n'a été créé qu'en 1623
            (plus précisément, on a commencé des constructions en 1623 mais le chateau tel qu'on le considère aujourd'hui ne sera terminé que bien plus tard).
            Le roi n'y restera d'ailleurs de façon permanente qu'à partir de 1682,la révolution ayant eu lien en 1789, 
            Versaille n'a donc été la résidence des rois que pendant à peine plus d'un siècle !<br>
            <br>
            Le château fait plus de 60 000m², pour 2300 pièces ! Aujourd'hui, 1000 sont utilisé pour le musée national des châteaux de Versailles et de Trianon (renseignez vous c'est cool).
            Et son parc, s'il fait aujourd'hui 93 hectar en faisait à son paroxysme 8000 hectars !
        </h3>

        <h5>certains extraits pris sur <a href="https://castelnuovo.fr/index.php/nos-activites/la-restauration-des-ruines/l-histoire-du-site-de-castel-nuovo">castelnuovo.fr</a></h5>
        <h5>Images trouvées sur <a href="https://voyages-en-france.fr/index.php/2024/03/24/les-fortifications-de-chateauneuf-villevieille/">voyages-en-france.fr</a></h5>
    </main>
</body>
</html>