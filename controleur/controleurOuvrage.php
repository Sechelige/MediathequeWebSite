<?php
require_once ("model/model.php");
require_once ("model/ouvrage.php");

class controleurOuvrage {

    public static function getOuvrageGet() {
        $numOuvrage = $_GET["numOuvrage"];
        $ouvrage = Ouvrage::getOuvrageEtInfoByNumOuvrage($numOuvrage);
        return $ouvrage;
    }
    public static function afficheOuvrage() {
        $tab_ouvrage = self::getOuvrageGet();
        $titre = "Ouvrage";     
        include("vue/debut.php");
        include ("vue/header-one/header.php");
        if ($tab_ouvrage != false) {
            foreach ($tab_ouvrage as $ouvrage) {
                include "vue/ouvrage/afficheOuvrage.html";
            }
        } else {
            echo "Aucun ouvrage trouvé";
        }
        echo "</body> </html>";
    }
}