<?php

require_once ("model/model.php");
require_once ("model/utilisateur.php");


class ControleurConnexion {
    public static function afficheConnexion() {
        $titre = "Connexion";
        include ("vue/debut.php");
        include ("vue/connexion/connexion.html");
    }

    public static function connecterUtilisateur(){
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $b = Utilisateur::checkMDP($login, $mdp);

        if($b){
            $_SESSION["login"] = $_POST["login"];
            header("Location: index.php?controleur=controleurAccueil&action=afficheAccueil");
        } else{
            self::afficheConnexion();
        }
    }

    public static function deconnecterUtilisateur(){
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time()-1);
        header("Location: index.php?controleur=controleurAccueil&action=afficheAccueil");
    }
}