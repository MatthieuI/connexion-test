<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion et inscription</title>
</head>
<body>

    <form action="inscription.php" method="post">

        <h2 style="font-weight: bold;">Inscription</h2>

        <label for="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" required>

        <label for="nom">Nom : </label>
        <input type="text" name="nom" required>

        <label for="prenom">Prenom : </label>
        <input type="text" name="prenom" required><br><br>

        <label for="mail">Adresse mail : </label>
        <input type="text" name="mail" required>

        <label for="passe">Mot de passe : </label>
        <input type="password" name="passe" id="passe1" required>

        <label for="passe2">Encore le mot de passe : </label>
        <input type="password" name="passe2" id="passe2" required>

        <input type="submit" value="Valider" id="valider1">

        <p id="verification"></p>

    </form>

    <form action="connexion.php" method="post">

        <h2 style="font-weight: bold;">Connexion</h2>

        <label for="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" required>

        <label for="passe">Mot de passe : </label>
        <input type="password" name="passe" required>

        <input type="submit" value="Valider" id="valider2">

    </form>

    <script src="script.js"></script>
</body>
</html>