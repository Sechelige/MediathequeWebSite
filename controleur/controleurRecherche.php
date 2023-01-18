<?php 

class controleurRecherche {
    public static function afficheRecherche() {
        $titre = "Recherche";
        include ("vue/debut.php");
        include ("vue/header-one/header.php");
        include ("vue/recherche/recherche.html");
        include ("vue/footer/footer.html");
    }
}
