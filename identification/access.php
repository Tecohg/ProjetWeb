<?php
require 'users.inc';
$login = $_POST['login'];
$mdp   = $_POST['mdp'];
if (loginOk($login, $mdp)) {
    echo "bIenvenu $login";
} else {
    echo '<meta http-equiv="refresh" content="0;url=login.php?msg=Login incorrect">';
}
?>