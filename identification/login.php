<?php
/* PAGE 1 -> access.php ou register */
/* Page pour se connecter avec le formulaire et afficher le message ???? */
$msg = $_GET['msg']?? ''; /* Recupere la variable msg du hheader envoyé par les autres programmes acess, logout, register */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Login</title>
</head>
<body>
    <h2>Bienvenue</h2>

    <p>Si vous avez déjà un compte :</p>
    <form method="post" action="access.php"> <!--formulaire qui envois a access.php les inputs -->
        <input name="login" placeholder="Login">
        <input name="mdp" type="password" placeholder="mot de passe"><br>
        <?php if ($msg) echo "<p style='color:red'>$msg</p>"; ?> <!-- indication: inscription reussis... etc... -->
        <button type="submit">Connexion></button>
    </form>

    <a href="register.php">Creer un compte</a> 
</body>
</html>
