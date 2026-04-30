<?php
session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../identification/login.php');
    exit;
}


function charger_contacts() {
    $fichier = __DIR__ . '/contacts.json';
    if (!file_exists($fichier)) return [];
    return json_decode(file_get_contents($fichier), true) ?? [];
}

function sauvegarder_contacts($contacts) {
    $fichier = __DIR__ . '/contacts.json';
    file_put_contents($fichier, json_encode($contacts, JSON_PRETTY_PRINT));
    /**JSON_PRETTY_PRINT formate le JSON pour qu'il soit lisible*/
}


$me = $_SESSION['login']; /*C'est moi !*/
$dest = $_POST['destinataire'] ?? ''; /*La personne à qui je parle*/
$contacts = charger_contacts(); /*Le tableau avec tout les contacts*/
//$msg = htmlspecialchars($_POST['message'] ?? ''); casse avec les apostrophes
$msg = $_POST['message'] ?? ''; /*Le message que j'envoie*/
$date = date('j-m-Y h:i:s'); /*Sa date (pour servir de clé primaire)*/


if ($dest && $msg) {
    file_put_contents(__DIR__ . '/messages.csv', "$me;$dest;$msg;$date" . PHP_EOL, FILE_APPEND); // " ; " au lieu de " , " car " , " dans la date posais probleme
    foreach ([[$me, $dest], [$dest, $me]] as [$user, $contact]) {
        /*Double boucle, pour quand on envoie et quand l'autre reçoit un message*/

        $contacts[$user] = array_values(array_filter(
            /*Filtrer l'enlève de la liste, qui est reindexé par values*/
            $contacts[$user] ?? [],
            fn($c) => $c !== $contact
        ));
        array_unshift($contacts[$user], $contact);
        /*array_unshift : insère le contact au début*/
    }
    sauvegarder_contacts($contacts);
    /*Sauvegarde la modifications (sinon rip)*/
    echo json_encode(['ok' => true]);
}
else {
    echo json_encode(['ok'=> false]);
}

?>
