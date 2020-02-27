<?php
    session_start();

    if(isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['passe']) && isset($_POST['passe2'])) {

        if($_POST['passe'] === $_POST['passe2']) {

            try {

                $bddCo = new PDO("mysql:host=localhost;dbname=test2;charset=utf8", "root", "");

                $requete = $bddCo->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
                $requete->execute(array(
                    "pseudo" => $_POST['pseudo']
                ));

                $resultat = $requete->fetch();

                if($resultat) {

                    header("Location: doublonPseudo.php");
                    exit;
                }

                $requete = $bddCo->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
                $requete->execute(array(
                    "mail" => $_POST['mail']
                ));

                $resultat = $requete->fetch();

                if($resultat) {

                    header("Location: doublonMail.php");
                    exit;
                }

                $requete = $bddCo->prepare('INSERT INTO utilisateurs(pseudo, nom, prenom, mail, passe) VALUES(:pseudo, :nom, :prenom, :mail, :passe)');

                $requete->execute(array(
                    "pseudo" => htmlspecialchars($_POST['pseudo']),
                    "nom" => htmlspecialchars($_POST['nom']),
                    "prenom" => htmlspecialchars($_POST['prenom']),
                    "mail" => htmlspecialchars($_POST['mail']),
                    "passe" => password_hash($_POST['passe'], PASSWORD_DEFAULT)

                ));

                $_SESSION['pseudo'] = $_POST['pseudo'];
                $_SESSION['nom'] = $_POST['nom'];
                $_SESSION['prenom'] = $_POST['prenom'];
                $_SESSION['mail'] = $_POST['mail'];
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }
        else {

            header("Location: index.php");
            exit;
        }
    }
    else {

        header("Location: index.php");
        exit;
    }

    header("Location: bonjour.php");
    exit;
?>