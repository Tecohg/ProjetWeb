<?php
session_start();
if (empty($_SESSION["login"])) {
    http_response_code(403);
    exit;
}
require __DIR__ . '/../../identification/users.inc';

$me = $_SESSION['login'];
$adversaire = $_POST['adversaire'] ?? '';

//verifie si les joueurs existent et si ils sont différents
if (!exist($adversaire) || $adversaire === $me) { 
    echo json_encode(['ok' => false, 'error' => 'Adversaire invalide']);
    exit;
}
//initialisation d'1 partie
$file = __DIR__ . '/etatMorpion.json';
$parties= file_exists($file) ? json_decode(file_get_contents($file),true) : [];
$joueurs = [$me,$adversaire];
sort($joueurs);
$cle = $joueurs[0] . '_' . $joueurs[1];

if (!isset($parties[$cle])) {
    $parties[$cle] = ['j1' => $me, 'j2' => $adversaire, 'tableau' => '---------', 'tour' => $me];
   file_put_contents($file, json_encode($parties, JSON_PRETTY_PRINT));
}
echo json_encode(['ok' => true]);

?>