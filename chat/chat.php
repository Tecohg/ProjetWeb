<?php
session_start();
if (empty($_SESSION["login"])) {
    header('Location: ../../identification/login.php');
    exit;
}


/* on recupere la liste d'utilisateurs */
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

function compter_messages() {
    global $me;
    $file = __DIR__ . '/messages.csv';
    $stats = [];
    if (!file_exists($file)) return $stats;
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        [$exp, $dest] = explode(';', $line, 3);
        if ($exp === $me) {
            $stats[$dest]['envoyes'] = ($stats[$dest]['envoyes'] ?? 0) + 1;
        } elseif ($dest === $me) {
            $stats[$exp]['recus'] = ($stats[$exp]['recus'] ?? 0) + 1;
        }
    }
    return $stats;
}


$me = $_SESSION['login']; /*C'est moi !*/
$users = getUsers(__DIR__ .'/../identification/users.csv',$me); /*C'est tout les gens*/
$other = $_GET['other'] ?? $users[0] ?? null; /*La personne à qui on parle*/
$contacts = charger_contacts(); /*Le tableau avec tout les contacts*/
$mes_contacts = $contacts[$me] ?? []; /*Mes contacts*/
/*Diff enlève ceux de mes contacts, values enlèves les trous.*/
$stats_messages = compter_messages();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Chat jeu</title>
    <link rel="stylesheet" href="chat.css">
</head>

<body>
    <div class="users">
        <h3>Contacts</h3>
        <hr>

        <div class="liste-users">
            <?php
                foreach ($mes_contacts as $user){
                    $classe = $user === $other ? 'actif' : '';
                    $nom    = htmlspecialchars($user);
                    $envoyes  = $stats_messages[$user]['envoyes'] ?? 0;
                    $recus    = $stats_messages[$user]['recus'] ?? 0;
                    $total    = $envoyes + $recus;
                    echo "<a href='chat.php?other=$nom' class='$classe' data-envoyes='$envoyes' 
                    data-recus='$recus' data-total='$total'>$nom</a>";
                }
            ?>
        </div>

        <hr>
        <h3>Utilisateurs</h3>
        <input type="text" id="recherche" placeholder="Rechercher..." autocomplete="off">
        <hr>

        <div class="liste-users" id="liste-utilisateurs">
            <?php
                foreach ($users as $user) {
                    $classe = $user === $other ? 'actif' : ''; /* utilisateur est il actif ? --> */
                    $nom    = htmlspecialchars($user);
                    echo "<a href='chat.php?other=$user' class='$classe'>$nom</a>";
                }
            ?>
        </div>

        <div class="bas-de-colonne">
            <hr>
            <a href="../index.php">Page d'acceuil</a>
            <a href="../jeux/morpion/jeu.php">Retour au jeu</a>
            <a href="../identification/logout.php">Déconnexion</a>
        </div>

    </div>

    <div class="chat">
        <?php if ($other): ?>
            <h3> Conversation avec <?=htmlspecialchars($other) ?></h3>
            <div class="messages" id="messages"></div>

            <div class="formulaire">
                <input type="text" id="input" placeholder="Votre message..." autocomplete="off">
                <button id="btnEnvoyer">Envoyer</button>
            </div>

        <?php else: ?>
            <p>Aucun autre utilisateur trouvé.</p>
        <?php endif; ?>
    </div>

    <div class="infos-messages" id="infos-messages"></div>
    <script> /* passer les variables php en javascript */
        const me  = "<?= $me ?>";
        const other = "<?= $other ?>";
    </script>
    <!--charger le fichier javascript -->
    <script src="chat.js"></script>
</body>
</html>