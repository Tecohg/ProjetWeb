<?php
session_start();
if (empty($_SESSON['login'])) {
    header('Location: ../identification/login.php');
    exit;
}

$me = $_SESSION['login'];
$dest= $_POST['destinataire'] ?? '';
$msg = htmlspecialchars($_POST['msg'] ?? '');
$date =date('j-m-Y h:i:s');

if ($dest && $msg) {
    file_put_contents(__DIR__ . '/message.csv', "$me,$dest,$msg,$date" . PHP_EOL, FILE_APPEND);
    echo json_encode(['ok' => true]);
}
else {
    echo json_encode(['ok'=> false]);
}

?>
