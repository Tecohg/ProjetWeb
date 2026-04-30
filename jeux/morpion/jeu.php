<?php
session_start();
if (empty($_SESSION['login'])) { 
        http_response_code(403);
        exit; 
}

$me   = $_SESSION['login'];
$case = (int)($_POST['case'] ?? -1); 
$file = __DIR__ . '/etatMorpion.csv';      
if (!file_exists($file)) { 
    echo json_encode(['ok' => false, 'error' => 'Pas de partie']);
    exit; 
}

[$j1, $j2, $tableau, $tour] = explode(',', trim(file_get_contents($file)));


if ($tour !== $me) { 
    echo json_encode(['ok' => false, 'error' => 'Pas ton tour']); 
    exit; 
}


if ($case < 0 || $case > 8) { 
    echo json_encode(['ok' => false, 'error' => 'Case invalide']); 
    exit; 
}


if ($tableau[$case] !== '-') { 
    echo json_encode(['ok' => false, 'error' => 'Case prise']); 
    exit; 
}


$symbol = ($me === $j1) ? 'X' : 'O';


$tableau[$case] = $symbol;

$prochain = ($tour === $j1) ? $j2 : $j1;

file_put_contents($file, "$j1,$j2,$tableau,$prochain");

echo json_encode(['ok' => true, 'tableau' => $tableau, 'tour' => $prochain]);