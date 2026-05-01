<?php
//jeu.php
session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../../identification/login.php');
    exit;
}
$me = $_SESSION['login'];
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu</title>
    <link rel="stylesheet" href="jeu.css">
</head>
    <body>
        <div id="interface">
            <p id="status">TEST</p>
        </div>

<!-- tableau du morpion en utilisant les datasets, on stoque l'information dans la balise -->
        <div id="tableau">
            <?php for ($i=0; $i<9; $i++): ?>
                <div class="case" data-index="<?= $i ?>"></div>
            <?php endfor; ?>
        </div>    
        <button id="btnReset" style="display:none">Restart</button>
        <!-- On envois $me au js puis on charge le script -->
        <script>
            const me = "<?= $me ?>"
        </script>
        <script src="morpion.js"></script>
    </body>
</html>