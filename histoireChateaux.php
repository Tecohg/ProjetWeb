<?php
#histoireChateaux.php

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
    <title>La galerie du petit chatelier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- menu navigation -->
     <?php $depth = 0; include 'nav.php'; ?>
    <main>
        <h1>Bonjour, <?= htmlspecialchars($login) ?> bienvenue sur LePetitChatelier.com !</h1> <!--permet d'éviter qu'un utilisateur rentre des commandes dans son login qui executerais ce qu'il veux-->
        
        <div class="cards">

<!-- modele  
            <a class="card" href="/page.php">
                <img class="card-img" src="image.truc" alt="nom du chateau">
                <div class="card-body">
                    <div class="card-label">chateau</div>
                    <div class="card-desc">description</div>
                </div>
            </a>
-->

            <a class="card" href="/chateaux/castelNuovo/castelNuovo.php">
                <img class="card-img" src="https://i0.wp.com/voyages-en-france.fr/wp-content/uploads/2024/03/DSC_0925-scaled.jpg?w=2560&ssl=1" alt="CastelNuovo">
                <div class="card-body">
                    <div class="card-label">Castel Nuovo</div>
                    <div class="card-desc">Le village fortifié tombé en ruine</div>
                </div>
            </a>


            <a class="card" href="/chateaux/versailles/versailles.php">
                <img class="card-img" src="https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fcdn.pixabay.com%2Fphoto%2F2014%2F04%2F07%2F07%2F19%2Fversailles-318459_960_720.jpg&sp=1777837029Tb888c0ff0ea17947e344abc9a6b67a26b4a2a7b34a55c1cdc45dda1bf92dda57" alt="Versailles">
                <div class="card-body">
                    <div class="card-label">Chateau de versailles</div>
                    <div class="card-desc">versailles</div>
                </div>
            </a>


        </div>


    </main>
</body>
</html>