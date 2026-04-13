<?php
session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../identification/login.php');
    exit;
}


$me= $_SESSION['login'];
$other = $_GET['other'];
$file = __DIR__ . '/messages.csv';
$messages=[];

if (file_exists($file)) {
    $lignes = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lignes as $i => $line) {
        if ($i < $depuis) continue;
        
        [$exp, $dest, $msg, $date] = explode(',', $line, 4);

        if (($exp === $moi && $dest === $avec) || ($exp === $avec && $dest === $moi)) {
            $messages[] = ['exp' => $exp, 'msg' => $msg, 'date' => $date, 'index' => $i];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($messages);
?>