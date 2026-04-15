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
$depuis = (int)($_GET['depuis'] ?? 0); //le but de depuis est de ne pas recharger tous les messages a chaque fois, en  afficher que les nouveaux messages

if (file_exists($file)) {
    $lignes = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lignes as $i => $line) { /* $i represente l'index de ligne et $line represente le contenu de cette ligne */
        if ($i < $depuis) continue; //si l'indice est inferieur au derniers messages que l'ont doit afficher alors on skip cette itteration

        [$exp, $dest, $msg, $date] = explode(';', $line, 4); //expediteur destinataire message et date

        if (($exp === $me && $dest === $other) || ($exp === $other && $dest === $me)) { //si expediteur moi && destinaire autre ou inverse alors on retranscrit les deonnées en variables pour les envoyer au js
            $messages[] = ['exp' => $exp, 'msg' => $msg, 'date' => $date, 'index' => $i];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($messages);
?>