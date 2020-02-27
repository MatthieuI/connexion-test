<?php
    session_start();

    if(isset($_POST['pseudo']) && isset($_POST['passe'])) {

        try {

            $bddCo = new PDO("mysql:host=localhost;dbname=test2;charset=utf8", "root", "");

            $requete = $bddCo->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
            $requete->execute(array(
                "pseudo" => $_POST['pseudo']
            ));

            $resultat = $requete->fetch();

            if(!$resultat) {

                header("Location: mauvaisIds.php");
                exit;
            }
            else {
                
                $ok = password_verify($_POST['passe'], $resultat['passe']);
                if($ok) {

                    $_SESSION['pseudo'] = $resultat['pseudo'];
                    $_SESSION['nom'] = $resultat['nom'];
                    $_SESSION['prenom'] = $resultat['prenom'];
                    $_SESSION['mail'] = $resultat['mail'];

                    header("Location: bonjour.php");
                    exit;
                }
                else {

                    header("Location: mauvaisIds.php");
                    exit;
                }
            }
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    else {

        header("Location: index.php");
        exit;
    }

    header("Location: index.php");
    exit;
?>