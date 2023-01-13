<?php
require_once ("model/model.php");
require_once ("model/exemplaire.php");

class ControleurExemplaire {

    public static function afficheExemplaireOuvrage ($ouv) {
        $tab_exemplaire = Exemplaire::getExemplaireByNumOuvrage($ouv);
        var_dump($tab_exemplaire->get("estReserveExemplaire"));
        /*if ($tab_exemplaire != false) {
            if ($tab_exemplaire->get("estReserveExemplaire") == 0 && $tab_exemplaire->get("empruntExemplaire") == 0){
                echo "<div class='ex-dispo-titre'>Exemplaires disponibles pour cet ouvrage: <button onclick=''>+</button></div>";
                foreach ($tab_exemplaire as $exemplaire) {
                    include "vue/exemplaire/afficheExemplaire.html";
                }
            }
        } else {
            echo "<div class='ex-dispo-titre'>Exemplaires réservés/empruntés (non disponibles) : </div>";
            echo "Aucun exemplaire trouvé pour cet ouvrage";
        }*/
    }
}