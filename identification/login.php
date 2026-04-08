<?php
$msg = $_GET['msg']?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  initial-scale="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="access.php"> #formulaire qui envois a access.php les inputs
        <?php if ($msg) echo "<p style='color:red'>$msg</p>"; ?> #indication: inscription reussis... etc...
        <input name="login" placeholder"Login">
        <input name="mdp" type="password" placeholder="mot de passe">
        <button type="submit">Connexion></button>
    </form>
    <a href="register.php">Creer un compte</a>
</body>
</html>
