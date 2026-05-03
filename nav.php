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
                <a href="<?= $root ?>histoireChateaux.php">Histoire des châteaux</a>
            </div>
        </li>
        <li>
            <button>Communauté ▾</button>
            <div class="dropdown">
                <a href="<?= $root ?>chat/chat.php">Chat</a>
                <a href="<?= $root ?>forum/forum.php">Forum</a>
            </div>
        </li>
    </ul>

    <div class="nav-user">
        <span><?= htmlspecialchars($_SESSION['login'] ?? '') ?></span>
        <a href="<?= $root ?>identification/logout.php">Déconnexion</a>
    </div>
</nav>