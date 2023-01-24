<?php 
require_once ("model/model.php");
require_once ("model/ouvrage.php");
require_once ("controleur/controleurOuvrage.php");

class controleurRecherche {
    public static function afficheRecherche() {
        $titre = "Recherche";
        include ("vue/debut.php");
        include ("vue/header-one/header.php");
        include ("vue/recherche/cherche_bar.html");
        $tab = controleurOuvrage::getAllOuvrage();
        $i = 0;
        $u = "none";
        foreach ($tab as $value) {
            include("vue/recherche/autocomplete.php");
            $i++;
        }
        include("vue/recherche/voirtout.php");
        include("js/script_recherche.html");
        foreach($tab as $value) {
            include("vue/recherche/livre_recherche.php");
        }
        echo "</section>";
        include ("vue/footer/footer.html");
    }
}
