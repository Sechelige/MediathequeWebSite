<?php 
require_once ("model/model.php");
require_once ("model/ouvrage.php");
require_once ("controleur/controleurOuvrage.php");

class controleurRecherche {
    public static function afficheRecherche() {
        $titre = "Recherche";
        include ("vue/debut.php");
        include ("vue/header-one/header.php");
        $tab = controleurOuvrage::getAllOuvrage();
        
        include ("vue/footer/footer.html");
    }
}
