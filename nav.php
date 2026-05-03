<?php
// nav.php
// $depth = nombre de dossiers depuis la racine permet de faire un nav reutilisable dans notre cas!!! (pour pas avoir à ecrire un navbar par page specifquement)
$root = str_repeat('../', $depth ?? 0);
?>
<nav>
    <a class="nav-logo" href="<?= $root ?>index.php">LePetitChatelier</a>

    <ul class="nav-links">
        <li>
            <button>Découvrir ▾</button>
            <div class="dropdown">
                <a href="#">Histoire des châteaux</a>
                <a href="#">Carte interactive</a>
                <a href="#">Galerie</a>
            </div>
        </li>
        <li>
            <button>Communauté ▾</button>
            <div class="dropdown">
                <a href="<?= $root ?>chat/chat.php">Chat</a>
                <a href="<?= $root ?>forum/forum.php">Forum</a>
            </div>
        </li>
        <li><a href="<?= $root ?>jeux/morpion/jeu.php">Jeux</a></li>
    </ul>

    <div class="nav-user">
        <span><?= htmlspecialchars($_SESSION['login'] ?? '') ?></span>
        <a href="<?= $root ?>identification/logout.php">Déconnexion</a>
    </div>
</nav>