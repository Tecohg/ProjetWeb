<?php 
session_start();
if (empty($_SESSION['login'])) {
    http_response_code(403);
    exit;
}

$file= __DIR__ . '/etatMorpion.csv';
if (!file_exists($file)) {
    echo json_encode(['ok' => false, 'error' => 'Pas de partie']);
    exit;
}
[$j1,$j2]=explode(',',trim(file_get_contents($file)));

file_put_contents($file,"$j1,$j2,---------,$j1");
echo json_encode(['ok' => true]);
?>