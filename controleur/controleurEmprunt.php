<?php 
require_once ("model/model.php");
require_once ("model/emprunt.php");
require_once ("model/exemplaire.php");
require_once ("controleur/controleurUtilisateur.php");
require_once ("controleur/controleurNav.php");

class controleurEmprunt {

    public static function afficherEmprunt() {
        $numUtilisateur = ControleurUtilisateur::getNumUtilisateur();// a changer avec la session

        //$tab_emprunt = Emprunt::getEmpruntByNumUtilisateur($numUtilisateur);// pas utilise pour l'instant à suprimer

        $tab_emprunt_rendu = Emprunt::getEmpruntRenduHistorique($numUtilisateur);
        $tab_emprunt_non_rendu = Emprunt::getEmpruntEnCours($numUtilisateur);
        $titre = "Mes Emprunts";
        include("vue/debut.php");
        controleurNav::afficheNav();
        include ("vue/navBarInfo.html");
        echo "<div class='inline'>";
        if ($tab_emprunt_rendu == false && $tab_emprunt_non_rendu == false) {
            echo "<h2>Vous n'avez jamais emprunté d'exemplaire !</h2>";// à changer avec un include de la vue
        } else {
            //affichage des emprunts en cours 
            
            echo "<h2>Emprunt en cours...</h2>";
            echo "<div class='emprunt'>";
            if ($tab_emprunt_non_rendu == false) {
                echo "<h2>Vous n'avez pas d'emprunt en cours</h2>"; // à changer avec un include de la vue
            } else {
                foreach ($tab_emprunt_non_rendu as $emprunt) {
                    $exemplaire = Exemplaire::getNomOuvrageByNumExemplaire($emprunt->get("numExemplaire"));
                    include "vue/utilisateur/emprunts/empruntUtilisateur.php";
                }
            }
            echo "</div>";
            
            //affichage des emprunts rendus
            echo "<h2>Emprunt rendu</h2>";// à changer avec un include de la vue
            echo "<div class='rendu'>";
            if ($tab_emprunt_rendu == false) {
                echo "Vous n'avez pas encore d'emprunt rendu";
            } else {
                foreach ($tab_emprunt_rendu as $emprunt) {
                    $exemplaire = Exemplaire::getNomOuvrageByNumExemplaire($emprunt->get("numExemplaire"));
                    include "vue/utilisateur/emprunts/empruntUtilisateur.php";
                }
            }
            echo "</div>";
            echo "</div>";
        }
        echo "</body> </html>";
    }

    public static function nbEmpruntEnCours($n) {
        $nbEmprunt = Emprunt::getNbEmpruntEnCours($n);
        return $nbEmprunt;
    }


    public static function tempsJusquaDate($dateString) {
        $dateActuelle = new DateTime();
        $dateCible = new DateTime($dateString);
        $diffTemps = $dateCible->getTimestamp() - $dateActuelle->getTimestamp();
        $diffJours = ceil($diffTemps / (60 * 60 * 24));
        if (abs($diffJours) <= 31) {
            if ($diffJours < 0) {
                return "Il y " . floor(abs($diffJours)) . " jour(s)";
            } else if ($diffJours > 0) {
                return "Dans " . floor(abs($diffJours)) . " jour(s)";
            }
        } else if (abs($diffJours) < 365) {
            if ($diffJours < 0) {
                return "Il y " . floor(abs($diffJours) / 31) . " mois";
            } else if ($diffJours > 0) {
                return "Dans " . floor(abs($diffJours) / 31) . " mois";
            }
        } else if (abs($diffJours) >= 365) {
            if ($diffJours < 0) {
                return "Il y " . floor(abs($diffJours) / 365) . " année(s)";
            } else if ($diffJours > 0) {
                return "Dans " . floor(abs($diffJours) / 365) . " année(s)";
            }
        } else {
            return "Aujourd'hui";
        }
    }
}