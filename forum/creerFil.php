<?php
session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../identification/login.php');
    exit;
}
$me = $_SESSION['login'];
$titre = trim($_POST['titre'] ?? '');
$description = trim($_POST['description'] ?? '');

if (!$titre) {
    header('Location: forum.php');
    exit;
}

$file = __DIR__ . '/fils.json';
$fils = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$id = uniqid();
$fils[$id] = [
    'titre' => $titre,
    'description' => $description,
    'auteur' => $me,
    'date' => date('d-m-Y H:i'),
    'nb_messages' => 0
];

file_put_contents($file, json_encode($fils, JSON_PRETTY_PRINT));
header('Location: fil.php?id=' . $id);
?>