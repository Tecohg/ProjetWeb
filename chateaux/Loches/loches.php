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
    <title>Château de Loches</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../chateaux.css">
</head>
<body>
    <!-- menu navigation -->
     <?php $depth = 2; include '../../nav.php'; ?>
    <main>
        <h1>Loches, une cité royale.</h1>
        <img src="../../imagesChateaux/Loches.jpg" alt="Château de Loches">
        <h2>Lieu de rencontre de Charles VII et Jeane D'Arc.</h2>
        <h3>Construit par un comte d'Anjou au 11e siècle, le donjon est d'architectures romane et sert 
            tour à tour de forteresse défensive ou résidentiel puis de prison d'état, 
            quand le logis royale est de style gothic flamboyant et fut la résidence favorite 
            de la dynastie des Valois.
            Jeane D'Arc y rencontra le future Charles VII en mai 1429 pour le pousser à se rendre à Reims pour y être sacré roi.
        </h3>
        
        <h5>Extraits venant d'une brochure publicitaire pour la cité de Loches.</h5>
        <h5>Images trouvées sur <a href="https://fr.wikipedia.org/wiki/Ch%C3%A2teau_de_Loches">wikipédia</a></h5>
        
</body>
</html>