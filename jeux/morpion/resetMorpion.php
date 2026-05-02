<?php 
//resetMorpion.php
session_start();
if (empty($_SESSION['login'])) {
    http_response_code(403);
    exit;
}

$me    = $_SESSION['login'];
$other = $_POST['other'] ?? '';


$file = __DIR__ . '/etatMorpion.json';
$parties = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$joueurs = [$me, $other];
sort($joueurs);
$cle = $joueurs[0] . '_' . $joueurs[1];


if (!isset($parties[$cle])) {
    echo json_encode(['ok' => false, 'error' => 'Pas de partie']); exit;
}


$parties[$cle]['tableau'] = '---------';
$parties[$cle]['tour'] = $parties[$cle]['j1'];


file_put_contents($file, json_encode($parties, JSON_PRETTY_PRINT));
echo json_encode(['ok' => true]);
?>