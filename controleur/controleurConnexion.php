<?php

class ControleurConnexion {

    public static function afficheConnexion() {
        $titre = "Connexion";
        include ("vue/debut.php");
        include ("vue/header-one/header.php");
        include ("vue/connexion/connexion.html");
        include ("vue/footer/footer.html");
    }

    public static function connecterUtilisateur(){
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $b = Utilisateur::checkMDP($login, $mdp);

        if($b){
            $_SESSION["login"] = $_POST["login"];
            ControleurAcceuil::afficheAcceuil();
        } else{
            self::afficheConnexion();
        }
    }

    public static function deconnecterUtilisateur(){
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time()-1);
        ControleurAcceuil::afficheAcceuil();
    }
}