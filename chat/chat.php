<?php
session_start();
if (empty($_SESSION["login"])) {
    header('Location: identification/login.php');
    exit;
}

$user1 = $_SESSION['login'];
$messagesFile =__DIR__ . 'chat/messages.csv';

#on recupere la liste d'utilisateurs
function getUsers($file,$user1) {
    $users= [];
    foreach(file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        [$login]=explode(',',$line,2);
        if ($login !== $user1) {
            $users[]=$login;
        }
    }
    return $users;
}



?>