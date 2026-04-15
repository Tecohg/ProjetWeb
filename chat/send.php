<?php
session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../identification/login.php');
    exit;
}

$me = $_SESSION['login'];
$dest= $_POST['destinataire'] ?? '';
//$msg = htmlspecialchars($_POST['message'] ?? ''); casse avec les apostrophes
$msg = $_POST['message'] ?? '';
$date =date('j-m-Y h:i:s');

if ($dest && $msg) {
    file_put_contents(__DIR__ . '/messages.csv', "$me;$dest;$msg;$date" . PHP_EOL, FILE_APPEND); // " ; " au lieu de " , " car " , " dans la date posais probleme
    echo json_encode(['ok' => true]);
}
else {
    echo json_encode(['ok'=> false]);
}

?>
