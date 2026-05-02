<?php
//morpion.php
session_start();
if (empty($_SESSION['login'])) { 
        http_response_code(403);
        exit; 
}

$me   = $_SESSION['login'];
$other = $_POST['other'] ?? '';
$case = (int)($_POST['case'] ?? -1);  

$file = __DIR__ . '/etatMorpion.json';
$parties = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$joueurs = [$me, $other];
sort($joueurs);
$cle = $joueurs[0] . '_' . $joueurs[1];


if (!isset($parties[$cle])) {
    echo json_encode(['ok' => false, 'error' => 'Pas de partie']); exit;
}


$partie = &$parties[$cle]; 

if ($partie['tour'] !== $me) { 
    echo json_encode(['ok' => false, 'error' => 'Pas ton tour']); 
    exit; 
}


if ($case < 0 || $case > 8) { 
    echo json_encode(['ok' => false, 'error' => 'Case invalide']); 
    exit; 
}


if ($partie['tableau'][$case] !== '-') { 
    echo json_encode(['ok' => false, 'error' => 'Case prise']); 
    exit; 
}


$symbol = ($me === $partie['j1']) ? 'X' : 'O';
$partie['tableau'][$case] = $symbol;
$partie['tour'] = ($partie['tour'] === $partie['j1']) ? $partie['j2'] : $partie['j1'];


file_put_contents($file, json_encode($parties, JSON_PRETTY_PRINT));
echo json_encode(['ok' => true, 'tableau' => $partie['tableau'], 'tour' => $partie['tour']]);