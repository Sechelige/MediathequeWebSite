<?php
require_once ("model/model.php");
require_once ("model/ouvrage.php");
require_once ("controleur/controleurOuvrage.php");
require_once ("controleur/controleurNav.php");
class ControleurAccueil {

    public static function afficheAccueil() {
        $titre = "Accueil";
        $slides = controleurOuvrage::getOuvrageRandom();
        include ("vue/debut.php");
        controleurNav::afficheNav();
        include ("vue/accueil/affichageOuvrage/dernierAjout.html");
        include ("vue/accueil/slider/slider.php");
        include ("vue/accueil/accueil.html");//TODO
        include ("vue/accueil/informationAccueil.html");
    }
}