<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjetWeb</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="traitement.php">>
        <label for="nom">Votre pseudo* :</label>
        <input type="text" id="pseudo" name="pseudo" placeholder="ex : iliden" required> <br>
        <label for="mdp">Votre mot de passe* :</label>
        <input type="password" id="mdp" name="mdp" placeholder="Mauvais exemple : 1234" required> <br>
        <input type="submit" value="inscription">
    </form>

</body>
</html>