<?php
#variable de session
session_start();
$_SESSIONS["utilisateur"] = "Arnaud";
echo $_SESSIONS["utilisateur"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjetWeb</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>TEST</h1>
    <p class="discussion">test</p>
</body>
</html>