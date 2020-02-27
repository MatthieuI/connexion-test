<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>

<body>

    <?php

    if (isset($_SESSION['pseudo']) && isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['mail'])) {
        echo "<h2>Bonjour " . $_SESSION['pseudo'] . " (" . $_SESSION['nom'] . " " . $_SESSION['prenom'] . ")" . "</h2>";
        echo "<p>Adresse mail : ".$_SESSION['mail']."</p>";
        echo '<form action="modification.php" method="post"><input type="text" name="mail"><input type="submit" value="Modifier mail"></form>';
        echo '<form action="modification.php" method="post"><input type="password" name="passe"><input type="submit" value="Modifier mot de passe"></form><br>';
        echo '<form action="deconnexion.php" method="post"><input type="submit" value="Déconnexion"></form>';
    }
    else {
        echo "<h1>Vous devez être connecté pour accéder à cette page.</h1>";
    }

    ?>


</body>

</html>