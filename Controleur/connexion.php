<?php
    // Copié de APP-MVC

    // Controleur pour gérer le formulaire de connexion des utilisateurs

    if(isset($_GET['cible']) && $_GET['cible']=="verif") { // L'utilisateur vient de valider le formulaire de connexion
        if(!empty($_POST['identifiant']) && !empty($_POST['mdp'])){ // L'utilisateur a rempli tous les champs du formulaire
            include("Modele/utilisateurs.php");
            

            $reponse = mdp($db,$_POST['identifiant']);
            
            if($reponse->rowcount()==0){  // L'utilisateur n'a pas été trouvé dans la base de données
                $erreur = "Utilisateur inconnu";
                include("Vue/connexion_erreur.php");
            } else { // utilisateur trouvé dans la base de données
                $ligne = $reponse->fetch();
                if(md5($_POST['mdp'])!=$ligne['mdp']){ // Le mot de passe entré ne correspond pas à celui stocké dans la base de données
                    $erreur = "Mot de passe incorrect";
                    include("Vue/connexion_erreur.php");
                } else { // mot de passe correct, on affiche la page d'accueil
                    $_SESSION["userID"] = $ligne['id'];
                    include("Vue/accueil.php");
                }
            }
        } else { // L'utilisateur n'a pas rempli tous les champs du formulaire
            $erreur = "Veuillez remplir tous les champs";
            include("Vue/connexion_erreur.php");
        }
    } else { // La page de connexion par défaut
        include("Vue/non_connecte.php");
    }

//Fin du copié/collé de APP-MVC

//Copié/collé du config.php

    $bdd = new PDO('mysql:host=localhost;dbname=hsh', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*----------------------------------------------------------------------------------------------------------------------------*/

    function escape($text)
        {
        return htmlspecialchars($text, ENT_QUOTES);
        }

/*----------------------------------------------------------------------------------------------------------------------------*/

    function showErrors($messages)
        {
        $messages = (array) $messages;
 
        //Count != 0 donc ça équivaut à un true pour php
        if(count($messages))
            {
            foreach($messages AS $error)
                {
?>

    <span class="error"><?= escape($error); ?></span>

<?php
                }
            }
        }

/*----------------------------------------------------------------------------------------------------------------------------*/

    function isConnected()
        { 
        return isset($_SESSION["userID"]) && $_SESSION["userID"];
        }
?>