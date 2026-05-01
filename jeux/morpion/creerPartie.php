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
$file = __DIR__ . '/etatMorpion.csv';
file_put_contents($file, "$me,$adversaire,---------,$me");
echo json_encode(['ok' => true]);
?>