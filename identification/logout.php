#on start la session pour avoir l'id de session
#on vide les informations liées a la session
#on supprime la session puis on redirige au login
<?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
?>