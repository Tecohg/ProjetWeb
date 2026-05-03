<?php
session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../identification/login.php');
    exit;
}

$me = $_SESSION['login'];
$id = $_POST['id'] ?? '';

$filsFile = __DIR__ . '/fils.json';
$fils = file_exists($filsFile) ? json_decode(file_get_contents($filsFile), true) : [];

if (!isset($fils[$id])) {
    header('Location: forum.php');
    exit;
}

// vérifie qu'on est l'auteur
if ($fils[$id]['auteur'] !== $me) {
    http_response_code(403);
    exit;
}

// supprime le fil et ses messages
unset($fils[$id]);
file_put_contents($filsFile, json_encode($fils, JSON_PRETTY_PRINT));

$msgFile = __DIR__ . '/messages_' . $id . '.json';
if (file_exists($msgFile)) {
    unlink($msgFile);
}

header('Location: forum.php');