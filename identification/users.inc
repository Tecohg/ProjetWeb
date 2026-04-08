<?php
$file = __DIR__ . '/users.csv';

function exist($login) {
    global $file;
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        [$l, $m] = explode(',', $line);
        if ($l === $login) return true;
    }
    return false;
}


function loginOk($login, $mdp) {
    global $file;
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        [$l, $hash] = explode(',', $line, 2);
        if ($l === $login && password_verify($mdp, $hash)) return true;
    }
    return false;
}

function addUser($login, $mdp) {
    global $file;
    $hash = password_hash($mdp, PASSWORD_BCRYPT);
    file_put_contents($file, "$login,$hash" . PHP_EOL, FILE_APPEND);
}
?>