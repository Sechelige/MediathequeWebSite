<?php

class ControleurConnexion {

    public static function afficheConnexion() {
        $titre = "Connexion";
        include ("vue/debut.php");
        include ("vue/header-one/header.php");
        include ("vue/connexion/connexion.php");
    }
}