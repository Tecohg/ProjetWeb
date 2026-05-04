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

            <a class="card" href="/chateaux/castelNuovo/castelNuovo.php">
                <img class="card-img" src="https://i0.wp.com/voyages-en-france.fr/wp-content/uploads/2024/03/DSC_0925-scaled.jpg?w=2560&ssl=1" alt="CastelNuovo">
                <div class="card-body">
                    <div class="card-label">Castel Nuovo</div>
                    <div class="card-desc">Le village fortifié tombé en ruine</div>
                </div>
            </a>

            <a class="card" href="/chateaux/versailles/versailles.php">
                <img class="card-img" src="imagesChateaux/versailles.jpg" alt="Versailles">
                <div class="card-body">
                    <div class="card-label">Chateau de versailles</div>
                    <div class="card-desc">versailles, Le château d'or et de lumière.</div>
                </div>
            </a>

            <a class="card" href="/chateaux/palaisDesPapes/palaisDesPapes.php">
                <img class="card-img" src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/30/c3/02/6f/place-du-palais-des-papes.jpg?w=1400&h=-1&s=1" alt="Palais Des Papes">
                <div class="card-body">
                    <div class="card-label">Palais Des Papes</div>
                    <div class="card-desc">Le symbole Gothique d'Avignon</div>
                </div>
            </a>

            <a class="card" href="/chateaux/vestigesDesLascaris/vestigesDesLascaris.php">
                <img class="card-img" src="imagesChateaux/vestigesDesLascaris.jpg" alt="Château des Lascaris">
                <div class="card-body">
                    <div class="card-label">Vestiges du château des Lascaris</div>
                    <div class="card-desc">Abandonnée après un tremblement de terre...</div>
                </div>
            </a>
            
            <a class="card" href="/page.php">
                <img class="card-img" src="image.truc" alt="nom du chateau">
                <div class="card-body">
                    <div class="card-label">chateau</div>
                    <div class="card-desc">description</div>
                </div>
            </a>
            
<!-- modele  
            <a class="card" href="/page.php">
                <img class="card-img" src="image.truc" alt="nom du chateau">
                <div class="card-body">
                    <div class="card-label">chateau</div>
                    <div class="card-desc">description</div>
                </div>
            </a>
-->

        </div>


    </main>
</body>
</html>