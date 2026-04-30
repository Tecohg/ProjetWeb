<?php

session_start();
if (empty($_SESSION["login"])) {
    http_response_code(403);
    exit;
}

$file=__DIR__. '/etatMorpion.csv';
if (!file_exists($file)) {
    echo json_encode(['ok' => false, 'error' => 'Pas de partie en cours']);
    exit;    
}

[$j1,$j2,$tableau,$tour]=explode(',',trim(file_get_contents($file)));

function symboleGagnant($tableau) {
    $combinaisons = [[0,1,2], [3,4,5], [6,7,8], [0,3,6], [1,4,7], [2,5,8], [0,4,8], [2,4,6]];
    
    //on regarde toutes les combinaisons et si a b c sont tous egaux
    //donc de meme symbole, on retourne le symbole du gagnant
    foreach($combinaisons as [$a, $b, $c]) {
        if ($tableau[$a] !== '-' && $tableau[$a] === $tableau[$b] && $tableau[$b] === $tableau[$c]) {
            return $tableau[$a];
        }
    }
    if (strpos($tableau, '-')===false) return 'égalité';
    return null;
}

$gagnant = symboleGagnant($tableau);
echo json_encode([
    'ok' => true,
    'j1' => $j1,
    'j2' => $j2,
    'tableau' => $tableau,
    'tour' => $tour,
    'gagnant' => $gagnant
]);
?>
