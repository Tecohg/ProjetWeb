<?php
session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../identification/login.php');
    exit;
}
$me = $_SESSION['login'];
$id = $_POST['id'] ?? '';
$texte = trim($_POST['message'] ?? '');

if (!$id || !$texte) {
    header('Location: forum.php');
    exit;
}

$filsFile = __DIR__ . '/fils.json';
$fils = file_exists($filsFile) ? json_decode(file_get_contents($filsFile), true) : [];

if (!isset($fils[$id])) {
    header('Location: forum.php');
    exit;
}

$msgFile = __DIR__ . '/messages/messages_' . $id . '.json';
$messages = file_exists($msgFile) ? json_decode(file_get_contents($msgFile), true) : [];

$messages[] = [
    'auteur' => $me,
    'texte' => $texte,
    'date' => date('d-m-Y H:i')
];

file_put_contents($msgFile, json_encode($messages, JSON_PRETTY_PRINT));

$fils[$id]['nb_messages'] = count($messages);
file_put_contents($filsFile, json_encode($fils, JSON_PRETTY_PRINT));

header('Location: fil.php?id=' . $id);

?>