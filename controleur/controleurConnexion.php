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
        echo "<h1>$login</h1>";
        $b = Utilisateur::checkMDP($login, $mdp);

        if($b){
            $_SESSION["login"] = $_POST["login"];
            echo "<pre>session courante : <br>"; print_r($_SESSION); echo "</pre>";
            ControleurAcceuil::afficheAcceuil();
        } else{
            self::afficheConnexion();
        }
    }

    public static function deconnecterUtilisateur(){
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time()-1);
        self::afficheConnexion();
    }
}