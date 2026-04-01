<?php
$file = __DIR__ . '/users.csv';

function exist($login) { #to be or not to be, ... to bi or not to bi... two b or not two b...
    global $file;
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        [$l, $m] = explode(',', $line); # [$l, $m]= ['arnaud','A2c4!_!']
        if ($l === $login) return true; #comparer login du form avec les logins dans csv
    }
    return false;
}

function loginOk($login, $mdp) { #meme chose mais on compare le mot de passe aussi
    global $file; 
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        [$l, $m] = explode(',', $line);
        if ($l === $login && $m === $mdp) return true; 
    }
    return false;
}

function addUser($login, $mdp) { #dans register, on l'appelle apres avoir verifier que le login n'existe pas et que les champs sont  bien remplies
    global $file;
    file_put_contents($file, "$login,$mdp" . PHP_EOL, FILE_APPEND); #PHP_EOL (end of line en php). en gros: on mets dans le fichier $file(user.csv) "$login,$mdp\n", retour a la ligne puis append ce qui effectue un ajout au lieu d'un remplacement.    
}
?>