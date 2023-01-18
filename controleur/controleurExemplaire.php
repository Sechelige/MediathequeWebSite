<?php
require_once ("model/model.php");
require_once ("model/exemplaire.php");

class ControleurExemplaire {

    public static function afficheExemplaireOuvrage ($ouv) {
        $tab_exemplaire = Exemplaire::getExemplaireByNumOuvrage($ouv);
        if ($tab_exemplaire != false) {
                include "vue/exemplaire/tableauExemplaireDebut.html";
                foreach ($tab_exemplaire as $exemplaire) {
                    if ($exemplaire->get("estReserveExemplaire") == 0){
                        include "vue/exemplaire/tableauExemplaire.html";
                    }
                    else {
                        include "vue/exemplaire/tableauExemplaireReserve.html";
                    }
            }
        } else {
            echo "Aucun exemplaire trouvé pour cet ouvrage";
        }
        echo "</tbody></table>";
    }
}