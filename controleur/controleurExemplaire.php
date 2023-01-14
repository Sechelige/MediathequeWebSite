<?php
require_once ("model/model.php");
require_once ("model/exemplaire.php");

class ControleurExemplaire {

    public static function afficheExemplaireOuvrage ($ouv) {
        $tab_exemplaire = Exemplaire::getExemplaireByNumOuvrage($ouv);
        if ($tab_exemplaire != false) {
                echo "<div class='ex-dispo-titre'>Exemplaires disponibles pour cet ouvrage: <button onclick=''>+</button></div>";
                foreach ($tab_exemplaire as $exemplaire) {
                    if ($exemplaire->get("estReserveExemplaire") == 0 && $exemplaire->get("empruntExemplaire") == 0){
                        include "vue/exemplaire/afficheExemplaire.html";
                    }
            }
        } else {
            echo "<div class='ex-dispo-titre'>Exemplaires réservés/empruntés (non disponibles) : </div>";
            echo "Aucun exemplaire trouvé pour cet ouvrage";
        }
    }
}