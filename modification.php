<?php

    session_start();

    if(isset($_POST['mail'])) {

        $bddCo = new PDO("mysql:host=localhost;dbname=test2;charset=utf8", "root", "");

        $requete = $bddCo->prepare('UPDATE utilisateurs SET mail= :nvmail WHERE pseudo= :pseudo');

        $requete->execute(array(
            "nvmail" => htmlspecialchars($_POST['mail']),
            "pseudo" => $_SESSION['pseudo']
        ));

        $_SESSION['mail'] = htmlspecialchars($_POST['mail']);

        header('Location: bonjour.php');
        exit;
    }

    if(isset($_POST['passe'])) {

        $bddCo = new PDO("mysql:host=localhost;dbname=test2;charset=utf8", "root", "");

        $requete = $bddCo->prepare('UPDATE utilisateurs SET passe= :nvpasse WHERE pseudo= :pseudo');

        $requete->execute(array(
            "nvpasse" => password_hash($_POST['passe'], PASSWORD_DEFAULT),
            "pseudo" => $_SESSION['pseudo']
        ));

        header('Location: bonjour.php');
        exit;
    }

?>