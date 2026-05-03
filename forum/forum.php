<?php
session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../identification/login.php');
    exit;
}
$me = $_SESSION['login'];
$file = __DIR__ . '/fils.json';
$fils = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="forum.css">
</head>
<body>
    <?php $depth = 1; include '../nav.php'; ?>

    <main>
        <h1>Forum — Châteaux de France</h1>

        <div class="nouveau-fil">
            <h2>Créer un fil</h2>
            <form method="POST" action="creerFil.php">
                <input type="text" name="titre" placeholder="Titre du fil" required maxlength="100">
                <textarea name="description" placeholder="Description (optionnelle)" maxlength="300"></textarea>
                <button type="submit">Créer</button>
            </form>
        </div>

        <div class="liste-fils">
            <h2>Discussions</h2>
            <?php if (empty($fils)): ?>
                <p>Aucun fil pour l'instant.</p>
            <?php else: ?>
                <?php foreach (array_reverse($fils, true) as $id => $fil): ?>
                    <a href="fil.php?id=<?= htmlspecialchars($id) ?>" class="fil">
                        <div class="fil-titre"><?= htmlspecialchars($fil['titre']) ?></div>
                        <div class="fil-meta">
                            Par <?= htmlspecialchars($fil['auteur']) ?>
                            — <?= $fil['date'] ?>
                            — <?= $fil['nb_messages'] ?> message(s)
                        </div>
                        <?php if ($fil['description']): ?>
                            <div class="fil-desc"><?= htmlspecialchars($fil['description']) ?></div>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>