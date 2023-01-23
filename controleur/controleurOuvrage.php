<?php
require_once ("model/model.php");
require_once ("model/ouvrage.php");
require_once ("controleur/controleurExemplaire.php");

class controleurOuvrage {

    public static function getOuvrageGet() {
        $numOuvrage = $_GET["numOuvrage"];
        $ouvrage = Ouvrage::getOuvrageEtInfoByNumOuvrage($numOuvrage);
        return $ouvrage;
    }

    public static function getAllOuvrage() {
        $tab_ouvrage = Ouvrage::getAllOuvrageEtInfo();
        return $tab_ouvrage;
    }

    public static function afficheOuvrage() {
        $tab_ouvrage = self::getOuvrageGet();
        $titre = "Ouvrage";     
        include("vue/debut.php");
        include ("vue/header-one/header.php");
        if ($tab_ouvrage != false) {
            foreach ($tab_ouvrage as $ouvrage) {
                include "vue/ouvrage/afficheOuvrage.html";
                ControleurExemplaire::afficheExemplaireOuvrage($ouvrage->get("numOuvrage"));
            }
        } else {
            $alerte="Erreur ouvrage non trouvé dans la base de données";
            $lienFermerAlerte = "/index.php?controleur=acceuil&action=afficheAcceuil";
            include ("vue/alerte.html");
        }
        echo "</body> </html>";
    }

    
}