<?php

class ControleurAccueil {

    public static function afficheAccueil() {
        $titre = "Accueil";
        include ("vue/debut.php");
        include ("vue/header-one/header.php");
        echo "<a href='index.php?controleur=controleurConnexion'>Connexion </a>";
        include ("vue/accueil/accueil.html");//TODO
    }
}