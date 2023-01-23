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
        $u = "";
        foreach ($tab as $value) {
            if ($i >= 4) $u = "none";
            include("vue/recherche/autocomplete.php");
            $i++;
        }
        include("vue/recherche/voirtout.php");
        echo "</div></div></section>";
        //include ("vue/footer/footer.html");
    }
}
