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
    <title>Château Gaillard</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../chateaux.css">
</head>
<body>
    <!-- menu navigation -->
     <?php $depth = 2; include '../../nav.php'; ?>
    <main>
        <h1>Un château de Richard Cœur de Lion</h1>
        <img src="../../imagesChateaux/Chateau-Gaillard.jpg" alt="Château-Gaillard">
        <h2>Un château surélevé, vestige d'un vieux conflit.</h2>
        <h3>
            Construit à la toute fin du 12e siècle, dans la continuité de la lutte entre les rois 
            de France et d'Angleterre, à l'époque également duc de Normandie qui date des années 1060. 
            Cependant, le roi Richard meurt seulement 1 an après la fin de la construction du château, 
            et il ne faudra que 5 ans de plus pour que l'endroit tombe des mains des rois d'Angleterre, 
            annonçant la perte de la Normandie et la fin de l'empire Plantagenêt.
        </h3>

        <h5>Informations trouvés sur <a href="https://fr.wikipedia.org/wiki/Ch%C3%A2teau-Gaillard_(Les_Andelys)">wikipédia</a></h5>
        <h5>Images trouvées sur <a href="https://fr.wikipedia.org/wiki/Ch%C3%A2teau-Gaillard_(Les_Andelys)">wikipédia</a></h5>
        
</body>
</html>