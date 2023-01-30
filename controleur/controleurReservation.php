<?php 
require_once 'model/model.php';
require_once 'model/reservation.php';
require_once "controleur/controleurUtilisateur.php";
require_once "controleur/controleurNav.php";

class ControleurReservation {

    public static function afficherReservation() {
        $titre = "Réservation";      
        include("vue/debut.php");
        $utilisateur = ControleurUtilisateur::getNumUtilisateur();
        controleurNav::afficheNav();
        $tab_reservation = Reservation::getReservationByNumUtilisateur($utilisateur);
        include ("vue/navBarInfo.html");
        echo "<div class='inline'>";
        if ($tab_reservation == false) {
            echo "<h2>Vous n'avez pas de réservation</h2>";
        } else {
            echo "<h2>Mes réservations</h2>";
            foreach ($tab_reservation as $reservation) {
                include "vue/utilisateur/reservations/reservation.html";
            }
        }
        echo "</div>";
        echo "</body> </html>";
    }

    public static function annulerReservation() {
        $numReservation = $_GET["numReservation"];
        $numExemplaire = $_GET["numExemplaire"];
        Exemplaire::setEstReserveExemplaire(0, $numExemplaire);
        Reservation::supprimerReservation($numReservation);
        header("Location: index.php?controleur=controleurReservation");
    }

    public static function reserverExemplaire(){
        echo "reserverExemplaire";
        $numExemplaire = $_GET["numExemplaire"];
        $numUtilisateur = controleurUtilisateur::getNumUtilisateur();
        Exemplaire::setEstReserveExemplaire(1, $numExemplaire);
        Reservation::reserverExemplaire($numExemplaire, $numUtilisateur);
        header("Location: index.php?controleur=controleurReservation");
    }

    public static function nbReservation($n){
        $nbReservation = Reservation::getNbReservationByNumUtilisateur($n);
        return $nbReservation;
    }
}