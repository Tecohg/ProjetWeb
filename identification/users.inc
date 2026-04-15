<?php
$file = __DIR__ . '/users.csv';


//on parcours le fichier file contenant les utilisateurs,motdepasse puis on compare les variables a verifier si elles sont egales et si c'est le cas alors on renvois true

/*verifie qu'un login existe ou non */
function exist($login) {
    global $file;
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) { /* file($file) permet de creer une liste contenant toutes les lignes d'un fichier, dans notre cas: */
        /* Ignore new lines enleve \n, et empty lines enleve les lignes vides. */
        [$l, $m] = explode(',', $line); 
        if ($l === $login) return true;
    }
    return false;
}

/*verifie a la connexion que le login et le mdp soient correctes */
function loginOk($login, $mdp) {
    global $file;
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        [$l, $hash] = explode(',', $line, 2);               /*2 limite a deux (pour eviter des problemes avec les $) "login,mdp" -> ["login","mdp"] */
        /* password_verify compare deux valeurs encryptés et retourne 1 si elle sont egales. */
        if ($l === $login) {
            if (password_verify($mdp,$hash)) {
                return true;
            }
            else {
                return false;
            }
        }
    }
    return false;
}

#rajoute un utilisateur
function addUser($login, $mdp) {
    global $file;
    $hash = password_hash($mdp, PASSWORD_BCRYPT);
    file_put_contents($file, "$login,$hash" . PHP_EOL, FILE_APPEND); /* rajoute login,mdp\n (mais pas vraiment /n, plutot EOL)*/
}
?>