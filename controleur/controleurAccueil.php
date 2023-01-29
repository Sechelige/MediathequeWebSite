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
        include ("vue/accueil/accueil.html");//TODO

        $tab_derniere_ajout = Ouvrage::getOuvrageRecent();
        $tab_plus_emprunter = Ouvrage::getOuvragePlusEmprunter();

        include ("vue/accueil/affichageOuvrage/dernierAjout.php");
        include ("vue/accueil/affichageOuvrage/plusEmprunter.php");
        //include ("vue/accueil/slider/slider.php");
        //include ("vue/accueil/accueil.html");//TODO
        include ("vue/accueil/informationAccueil.html");

        include ("vue/footer/footer.html");
    }
}