<?php
session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../identification/login.php');
    exit;
}
$me = $_SESSION['login'];
$id = $_GET['id'] ?? '';

$filsFile = __DIR__ . '/fils.json';
$fils = file_exists($filsFile) ? json_decode(file_get_contents($filsFile), true) : [];

if (!isset($fils[$id])) {
    header('Location: forum.php');
    exit;
}

$fil = $fils[$id];
$msgFile = __DIR__ . '/messages/messages_' . $id . '.json';
$messages = file_exists($msgFile) ? json_decode(file_get_contents($msgFile), true) : [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($fil['titre']) ?></title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="forum.css">
</head>
<body>
    <?php $depth = 1; include '../nav.php'; ?>

    <main>
        <a href="forum.php" class="retour">← Retour au forum</a>

        <div class="entete">
            <h1><?= htmlspecialchars($fil['titre']) ?></h1>
            <?php if ($fil['description']): ?>
                <p class="description"><?= htmlspecialchars($fil['description']) ?></p>
            <?php endif; ?>
            <p class="meta">Créé par <?= htmlspecialchars($fil['auteur']) ?> le <?= $fil['date'] ?></p>
        </div>

        <div class="messages-forum">
            <?php foreach ($messages as $msg): ?>
                <div class="message-forum <?= $msg['auteur'] === $me ? 'me' : 'other' ?>">
                    <div class="msg-auteur"><?= htmlspecialchars($msg['auteur']) ?></div>
                    <div class="msg-texte"><?= htmlspecialchars($msg['texte']) ?></div>
                    <div class="msg-date"><?= $msg['date'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <form method="POST" action="sendMessage.php" class="formulaire-forum">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
            <textarea name="message" placeholder="Votre message..." required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </main>
</body>
</html>