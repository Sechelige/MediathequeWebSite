<?php

<<<<<<< Updated upstream:controleur/controleurAccueil.php
class ControleurAccueil {
=======
require_once ("model/model.php");
require_once ("model/ouvrage.php");
require_once ("controleur/controleurOuvrage.php");

class ControleurAcceuil {
>>>>>>> Stashed changes:controleur/controleurAcceuil.php

    public static function afficheAccueil() {
        $titre = "Accueil";

        $slides = controleurOuvrage::getOuvrageRandom();
        include ("vue/debut.php");
        include ("vue/header-one/header.php");
<<<<<<< Updated upstream:controleur/controleurAccueil.php
        echo "<a href='index.php?controleur=controleurConnexion'>Connexion </a>";
        include ("vue/accueil/accueil.html");//TODO
=======
        include("vue/acceuil/slider/slider.php");
        //echo "<a href='index.php?controleur=controleurConnexion'>Connexion </a>";
        //include ("vue/acceuil/acceuil.html");//TODO
>>>>>>> Stashed changes:controleur/controleurAcceuil.php
    }
}