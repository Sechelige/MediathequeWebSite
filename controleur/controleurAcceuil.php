<?php

class ControleurAcceuil {

    public static function afficheAcceuil() {
        $titre = "Accueil";
        include ("vue/debut.php");
        include ("vue/header-one/header.php");
        echo "<a href='index.php?controleur=controleurConnexion'>Connexion </a>";
        include ("vue/acceuil/acceuil.html");//TODO
    }
}