<?php
//etatMorpion.php
session_start();
if (empty($_SESSION["login"])) {
    http_response_code(403);
    exit;
}

$me = $_SESSION['login'];
$other = $_GET['other'] ?? '';

$file= __DIR__ . '/etatMorpion.json';
$parties = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$joueurs = [$me, $other];
sort($joueurs);
$cle = $joueurs[0] . '_' . $joueurs[1];


if (!isset($parties[$cle])) {
    echo json_encode(['ok' => false, 'error' => 'Pas de partie en cours']);
    exit;
}
$partie=$parties[$cle];
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


echo json_encode([
    'ok' => true,
    'j1' => $partie['j1'],
    'j2' => $partie['j2'],
    'tableau' => $partie['tableau'],
    'tour' => $partie['tour'],
    'gagnant' => symboleGagnant($partie['tableau'])
]);

exit;
?>
