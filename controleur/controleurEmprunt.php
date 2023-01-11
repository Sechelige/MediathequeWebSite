<?php 
require_once ("model/emprunt.php");
require_once ("controleurUtilisateur.php");
require_once ("model/exemplaire.php");

class controleurEmprunt {

    public static function afficherEmprunt() {
        $numUtilisateur = ControleurUtilisateur::getNumUtilisateur();
        $tab_emprunt = Emprunt::getEmpruntByNumUtilisateur($numUtilisateur);
        $tab_emprunt_rendu = Emprunt::getEmpruntRenduHistorique($numUtilisateur);
        $tab_emprunt_non_rendu = Emprunt::getEmpruntEnCours($numUtilisateur);
        $titre = "Mes Emprunts";
        include ("vue/navBar.html");
        ControleurUtilisateur::afficherNavBarGauche();
        echo "<div class='inline'>";
        if ($tab_emprunt == false) {
            echo "<h2>Vous n'avez pas d'emprunt en cours</h2>";
        } else {
            echo "<h2>Emprunt en cours...</h2>";
            if ($tab_emprunt_non_rendu == false) {
                echo "<h2>Vous n'avez pas d'emprunt en cours</h2>";
            } else {
                foreach ($tab_emprunt_non_rendu as $emprunt) {
                    $exemplaire = Exemplaire::getNomOuvrageByNumExemplaire($emprunt->getnumExemplaire());
                    include "vue/utilisateur/emprunts/empruntUtilisateur.html";
                }
            }
            echo "<h2>Emprunt rendu</h2>";
            if ($tab_emprunt_rendu == false) {
                echo "Vous n'avez pas encore d'emprunt rendu";
            } else {
                foreach ($tab_emprunt_rendu as $emprunt) {
                    $exemplaire = Exemplaire::getNomOuvrageByNumExemplaire($emprunt->getnumExemplaire());
                    include "vue/utilisateur/emprunts/empruntUtilisateur.html";
                }
            }
            echo "</div>";
    }
        include ("vue/footer.html");
    }
}