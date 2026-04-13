<?php
session_start();
if (empty($_SESSION["login"])) {
    header('Location: identification/login.php');
    exit;
}

$me = $_SESSION['login'];
$users=getUsers(__DIR__ .'/identification/users.csv',$me);
$other = $_GET['other'] ?? $users[0] ?? null;

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <link rel="stylesheet" href="chat.css">
</head>
<body>
    <div class="users">
        <h3>Utilisateurs</h3>
        <?php
            foreach ($users as $user) {
                $classe = $user === $other ? 'actif' : ''; #utilisateur est il actif ?
                $nom    = htmlspecialchars($user);
                echo "<a href='chat.php?avec=$user' class='$classe'>$nom</a>";
            }
        ?>
    <hr>
    <a href="../identification/logout.php">Déconnexion</a>
    </div>
    
    <div class="chat">
        <?php if ($other): ?>
            <h3> conversation avec <?=htmlspecialchars($other) ?></h3>
            <div class="messages" id="messages"></div>
            <div class="formulaire">
                <input type="text" id="input" placeholder="votre message..." autocomplete="off">
                <button id="btnEnvoyer">Envoyer</button>
            </div>
        <?php else: ?>
            <p>Aucun autre utilisateur trouvé.</p>
        <?php endif; ?>
    </div>

    <script> #passer les variables php en javascript
        const me  = "<?= $me ?>";
        const other = "<?= $other ?>";
    </script>
    #charger le fichier javascript
    <script src="chat.js"></script>
</body>
</html>